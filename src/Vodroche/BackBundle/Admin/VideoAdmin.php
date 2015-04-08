<?php

namespace Vodroche\BackBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class VideoAdmin extends Admin
{
    public $supportsPreviewMode = true;
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('title', 'text')
            ->add('speaker', 'text')
            ->add('duration', 'text')
            ->add('title', 'text')
            ->add('summary', 'text')
            //->add('note', array('required'=>false))
            ->add('video', 'text')
            ->add('categorie', 'entity', array( 'class' => 'VodrocheCoreBundle:Categorie', 'property' => 'name', 'multiple' => true))
            ->add('region', 'entity', array( 'class' => 'VodrocheCoreBundle:Region', 'property' => 'name', 'multiple' => true))
            ->add('thumbnail', 'sonata_media_type', array( 'provider' => 'sonata.media.provider.image', 'context' => 'default', 'required' => false))
            ->add('pdf', 'sonata_media_type', array( 'provider' => 'sonata.media.provider.file', 'context' => 'default', 'required' => false))

        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('title')
           
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('title')
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
