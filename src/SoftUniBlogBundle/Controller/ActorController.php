<?php

namespace SoftUniBlogBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use SoftUniBlogBundle\Entity\Actor;
use SoftUniBlogBundle\Entity\Article;
use SoftUniBlogBundle\Entity\Comment;
//use SoftUniBlogBundle\Service\QuoteServices;
use SoftUniBlogBundle\Entity\User;
use SoftUniBlogBundle\Form\ArticleType;
use SoftUniBlogBundle\Form\ActorType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;

class ActorController extends Controller
{

    public function objectToString(Actor $actor){
        $relatedActors='';
        foreach($actor->getRelatedActors() as $key=>$value){

            $relatedActors.=','.$value->getId();
        }
        $relatedActors=substr($relatedActors,1);
//        if(strlen($relatedActors)>1) {
//
//            $actor->setRelatedActors($relatedActors);
//            var_dump($actor->getRelatedActors());die();
//        }
        return $relatedActors;
    }
    public function stringToObject(Actor $actor){
        $relation=$actor->getRelatedActors();
        $relation=explode(",",$relation);
        $related=[];
        foreach($relation as $value){
            $sql = $this
                ->getDoctrine()
                ->getRepository(Actor::class)
                ->find($value);
            $related[]=$sql;
        }
        $related['count']=count($relation);
        return $related;
    }


    /**
     * @Route("/actor/add", name="add_actor")
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function createAction(Request $request)
    {
        $actor = new Actor();
        $form = $this->createForm(ActorType::class, $actor);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $file = $form->getData()->getImage();
            if(!is_null($file)) {
                $fileName = md5(uniqid()) . '.' . $file->guessExtension();
                try {
                    $file->move($this->getParameter('image_directory'),
                        $fileName);
                } catch (FileException $ex) {

                }

                $actor->setImage($fileName);
            }
            $currentUser = $this->getUser();
            $actor->setAuthor($currentUser);
//            $actor->setQuotes($currentUser);
            $this->objectToString($actor);
//            var_dump($actor->getRelatedActors());die();
            $actor->setRelatedActors($this->objectToString($actor));
            $em = $this->getDoctrine()->getManager();
            $em->persist($actor);
            $em->flush();
            return $this->redirectToRoute("blog_index");
        }

        return $this->render('bible/add.html.twig',
            ['form' => $form->createView()]);
    }

    /**
     * @Route("/actor/{id}", name="actor_view")
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function viewActor($id)
    {
        /** @var Actor $actor*/
        $actor = $this
            ->getDoctrine()
            ->getRepository(Actor::class)
            ->find($id);
//        $relation = $this
//            ->getDoctrine()
//            ->getRepository(Quote::class)
//            ->relatedQuotes($id);
//        $relation=$quote->getRelatedQuotes();
//        $relation=explode(",",$relation);
//        $related=[];
//        foreach($relation as $value){
//            $sql = $this
//                ->getDoctrine()
//                ->getRepository(Quote::class)
//                ->find($value);
//            $related[]=$sql;
//        }
//        $related['count']=count($relation);
        $related=$this->stringToObject($actor);
        $quotes=$actor->getQuotes();
//        $em = $this->getDoctrine()->getManager();
//        $em->persist($quote);
//        $em->flush();
        return $this->render('actor/actor.html.twig',
            ['actor' => $actor, 'quotes' =>$quotes,"related"=>$related]);
    }
    /**
     * @Route("/actor/edit/{id}", name="actor_edit")
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     * @param Request $request
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function editAction(Request $request, $id)
    {
        $actor = $this
            ->getDoctrine()
            ->getRepository(Actor::class)
            ->find($id);
//        var_dump($quote);die();
        if ($actor === null) {
            return $this->redirectToRoute("blog_index");
        }
        /** @var User $currentUser */
//        $currentUser = $this->getUser();
//        if (!$currentUser->isAuthor($quote) && !$currentUser->isAdmin()) {
//            return $this->redirectToRoute("blog_index");
//        }
//        $related = $this
//            ->getDoctrine()
//            ->getRepository(Quote::class)
//            ->relatedQuotes($id);
//
//        $relation=$quote->getRelatedQuotes();
//        $relation_arr=explode(",",$relation);
//        $related=[];
//        foreach($relation_arr as $value){
//            $sql = $this
//                ->getDoctrine()
//                ->getRepository(Quote::class)
//                ->find($value);
//            $related[]=$sql;
//        }
//        $related['count']=count($relation_arr);
//        $actor=$this->objectToString($actor);
//        $actor->setRelatedQuotes($actor);
        $related=$this->stringToObject($actor);
        $actor->setRelatedActors($related);
//        $related=$this->stringToObject($actor);
//        $actor->setRelatedActors($related);
//        var_dump($quote->getRelatedQuotes());die();
        $form = $this->createForm(ActorType::class, $actor);
        $fileName=$actor->getImage();
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            /** @var UploadedFile $file */
            $file = $form->getData()->getImage();
            if(!is_null($file)){
                $fileName = md5(uniqid()) . '.' . $file->guessExtension();

                try {
                    $file->move($this->getParameter('image_directory'),
                        $fileName);
                }
                catch (FileException $ex) {
                }
            }
            $actor->setImage($fileName);
            $currentUser = $this->getUser();
            $actor->setAuthor($currentUser);
//            var_dump($relation);die();
//            $rq=$this->objectToString($quote);
            $ra=$this->objectToString($actor);
            $actor->setRelatedActors($ra);
            $em = $this->getDoctrine()->getManager();
            $em->merge($actor);
            $em->flush();
            return $this->redirectToRoute("blog_index");
        }
        return $this->render('bible/edit.html.twig',
            ['form' => $form->createView(),
                'actor' => $actor,'related'=>$related]);
    }
    /**
     * @Route("/actor/delete/{id}", name="actor_delete")
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     * @param Request $request
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function deleteAction(Request $request, $id)
    {
        $actor = $this
            ->getDoctrine()
            ->getRepository(Actor::class)
            ->find($id);

        if ($actor === null) {
            return $this->redirectToRoute("blog_index");
        }

        /** @var User $currentUser */
        $currentUser = $this->getUser();

        if (!$currentUser->isAuthor($actor) && !$currentUser->isAdmin()) {
            return $this->redirectToRoute("blog_index");
        }
        $related=$this->stringToObject($actor);
        $actor->setRelatedActors($related);
        $form = $this->createForm(ActorType::class, $actor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $currentUser = $this->getUser();
            $actor->setAuthor($currentUser);
            $em = $this->getDoctrine()->getManager();
            $em->remove($actor);
            $em->flush();
//            die("here");
            return $this->redirectToRoute("blog_index");
        }

        return $this->render('actor/delete.html.twig',
            ['form' => $form->createView(),
                'actor' => $actor]);
    }
    /**
     * @Route("/allActors", name="allActors")
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     */
    public function allActors(Request $request)
    {
        $actors = $this->getDoctrine()
            ->getRepository(Actor::class)
            ->findAll();
        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $actors, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            3/*limit per page*/
        );
        return $this->render('actor/allActors.html.twig',
            ['actors' => $actors,'pagination' => $pagination]);
    }
}
