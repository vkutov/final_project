<?php

namespace SoftUniBlogBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use SoftUniBlogBundle\Entity\Actor;
use SoftUniBlogBundle\Entity\User;
use SoftUniBlogBundle\Form\ActorType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;

class ActorController extends Controller
{
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
//        var_dump($form->getData());die();
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
//        $quotes=$actor->getQuotes();
//        $em = $this->getDoctrine()->getManager();
//        $em->persist($quote);
//        $em->flush();
        return $this->render('actor/actor.html.twig',
            ['actor' => $actor]);
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
            $em = $this->getDoctrine()->getManager();
            $em->merge($actor);
            $em->flush();
            return $this->redirectToRoute("blog_index");
        }
        return $this->render('actor/edit.html.twig',
            ['form' => $form->createView(),
                'actor' => $actor]);
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
