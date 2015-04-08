<?php

namespace Meublaviz\BackBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class MeubleAdmin extends Admin
{
    public $supportsPreviewMode = true;
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name', 'text')
            ->add('description', 'text')
            ->add('tag', 'entity', array( 'class' => 'MeublavizCoreBundle:Tag', 'property' => 'name', 'multiple' => true))
            ->add('demenagement', 'entity', array( 'class' => 'MeublavizCoreBundle:Demenagement', 'property' => 'name', 'multiple' => false))
            ->add('photo', 'sonata_media_type', array( 'provider' => 'sonata.media.provider.image', 'context' => 'default', 'required' => false))

        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
           
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name')
            ->add('_action', 'actions', array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
                )
            ))
        ;
    }
}