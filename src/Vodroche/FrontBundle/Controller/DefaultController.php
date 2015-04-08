<?php

namespace Vodroche\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Vodroche\CoreBundle\Entity\Comment;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="index")
     * @Template()
     */
    public function indexAction()
    {
    	$em = $this->getDoctrine()->getManager();

        $user = $this->getUser();
        $categories = $em->getRepository('VodrocheCoreBundle:Categorie')->findAll();

    	return array('title'=>'index', 'categories'=>$categories, 'user'=>$user);
    }


    /**
    * @Route("/vote/{videoId}/note/{note}", name="vote")
    */
    public function voteAction($videoId, $note){
        $em = $this->getDoctrine()->getManager();

        $video = $em->getRepository('VodrocheCoreBundle:Video')->find($videoId);
        $noteArray = $video->getNote();

        $nbVote = $noteArray[0];
        $actualNote = $noteArray[1];

        $futureNote = $actualNote + (($note - $actualNote)/($nbVote+1));

        $video->setNote([$nbVote+1, $futureNote]);

        $em->flush();

        return new JsonResponse(array('true'));
    }


    /**
    *   @Route("/categorie/{categoriename}/video/{id}", name="video")
    *   @Template()
    */
    public function videoAction($categoriename, $id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $repoCategorie = $em->getRepository('VodrocheCoreBundle:Categorie');
        $categories = $repoCategorie->findAll();
        $video =$em->getRepository('VodrocheCoreBundle:Video')->find($id);
        $note = $video->getNote()[1];
        $categorie = $repoCategorie->findByName($categoriename)[0];

        $comment = new Comment();
        $comment->setVideo($video);

        $form = $this->createFormBuilder($comment)
            ->add('content', 'textarea')
            ->add('save', 'submit', array('attr'=>array('class'=>'btn')))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {

            $comment->setContent($form->get('content')->getData());

            $em->persist($comment);
            $em->flush();

            return $this->redirect($this->generateUrl('categorie', array('id' => $categorie->getId(), 'comment'=> true)));
        }

        return array('title'=>$video->getTitle(), 'form'=>$form->createView(), 'categorie'=>$categorie, 'video'=>$video, 'user'=>$this->getUser(), 'note' => $note, 'categories' => $categories);
    }

    /**
    * @Route("/categorie/{id}/{comment}", name="categorie", defaults={"comment" = false})
    * @Template()
    */
    public function categorieAction($id, $comment)
    {
    	$em = $this->getDoctrine()->getManager();

        $user=$this->getUser();
        $region=$user->getRegion();
        $categories = $em->getRepository('VodrocheCoreBundle:Categorie')->findAll();
    	$categorie = $em->getRepository('VodrocheCoreBundle:Categorie')->find($id);
    	$videos = $em->getRepository('VodrocheCoreBundle:Video')->findByCategorieAndRegion($categorie, $region);

        if(!$comment)
    	return array('title'=>$categorie->getName(), 'videos' => $videos, 'user'=>$user, 'categories'=>$categories, 'comment'=>false);
        else
        return array('title'=>$categorie->getName(), 'videos' => $videos, 'user'=>$user, 'categories'=>$categories, 'comment'=> true);

    }


   

}
