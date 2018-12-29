<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 12/11/2018
 * Time: 11:16 AM
 */
namespace SoftUniBlogBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use SoftUniBlogBundle\Entity\Event;
use SoftUniBlogBundle\Entity\User;
use SoftUniBlogBundle\Form\EventType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;

class EventController extends Controller
{
    public function objectToString(Event $event){
    $relatedEvents='';
    foreach($event->getRelatedEvents() as $key=>$value){

        $relatedEvents.=','.$value->getId();
    }
    $relatedEvents=substr($relatedEvents,1);
    return $relatedEvents;
}
    public function stringToObject(Event $event){
    $relation=$event->getRelatedEvents();
    $relation=explode(",",$relation);
    $related=[];
    foreach($relation as $value){
        $sql = $this
            ->getDoctrine()
            ->getRepository(Event::class)
            ->find($value);
        $related[]=$sql;
    }
    $related['count']=count($relation);
    return $related;
}


    /**
     * @Route("/event/add", name="add_event")
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function createAction(Request $request)
    {
        $event = new Event();
        $form = $this->createForm(EventType::class, $event);
        $form->handleRequest($request);
//        var_dump($form);die();
        if ($form->isSubmitted() && $form->isValid()) {
            $file = $form->getData()->getImage();
            if(!is_null($file)) {
                $fileName = md5(uniqid()) . '.' . $file->guessExtension();
                try {
                    $file->move($this->getParameter('image_directory'),
                        $fileName);
                } catch (FileException $ex) {

                }

                $event->setImage($fileName);
            }
            $currentUser = $this->getUser();
            $event->setAuthor($currentUser);
            $this->objectToString($event);
            $event->setRelatedEvents($this->objectToString($event));
            $em = $this->getDoctrine()->getManager();
            $em->persist($event);
            $em->flush();
            return $this->redirectToRoute("blog_index");
        }

        return $this->render('event/add.html.twig',
            ['form' => $form->createView()]);
    }

    /**
     * @Route("/event/{id}", name="event_view")
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function viewEvent($id)
    {
    /** @var Event $event*/
    $event = $this
        ->getDoctrine()
        ->getRepository(Event::class)
        ->find($id);
    $related=$this->stringToObject($event);
//        $em = $this->getDoctrine()->getManager();
//        $em->persist($quote);
//        $em->flush();
    return $this->render('event/event.html.twig',
        ['event' => $event,"related"=>$related]);
     }
    /**
     * @Route("/event/edit/{id}", name="event_edit")
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     * @param Request $request
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function editAction(Request $request, $id)
    {
        $event = $this
            ->getDoctrine()
            ->getRepository(Event::class)
            ->find($id);
        if ($event === null) {
            return $this->redirectToRoute("blog_index");
        }
        /** @var User $currentUser */

        $related=$this->stringToObject($event);
        $event->setRelatedEvents($related);
        $form = $this->createForm(EventType::class, $event);
        $fileName=$event->getImage();
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
            $event->setImage($fileName);
            $currentUser = $this->getUser();
            $event->setAuthor($currentUser);
            $ra=$this->objectToString($event);
            $event->setRelatedEvents($ra);
            $em = $this->getDoctrine()->getManager();
            $em->merge($event);
            $em->flush();
            return $this->redirectToRoute("blog_index");
    }
    return $this->render('event/edit.html.twig',
        ['form' => $form->createView(),
            'event' => $event,'related'=>$related]);
}
    /**
     * @Route("/event/delete/{id}", name="event_delete")
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     * @param Request $request
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function deleteAction(Request $request, $id)
    {
        $event = $this
            ->getDoctrine()
            ->getRepository(Event::class)
            ->find($id);

        if ($event === null) {
            return $this->redirectToRoute("blog_index");
        }

        /** @var User $currentUser */
        $currentUser = $this->getUser();

        if (!$currentUser->isAuthor($event) && !$currentUser->isAdmin()) {
            return $this->redirectToRoute("blog_index");
        }
        $related=$this->stringToObject($event);
        $event->setRelatedEvents($related);
        $form = $this->createForm(EventType::class, $event);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $currentUser = $this->getUser();
            $event->setAuthor($currentUser);
            $em = $this->getDoctrine()->getManager();
            $em->remove($event);
            $em->flush();
            return $this->redirectToRoute("blog_index");
        }

        return $this->render('event/delete.html.twig',
            ['form' => $form->createView(),
                'event' => $event]);
    }
    /**
     * @Route("/allEvents", name="allEvents")
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     */
    public function allEvents(Request $request)
{
    $events = $this->getDoctrine()
        ->getRepository(Event::class)
        ->findAll();
    $paginator  = $this->get('knp_paginator');
    $pagination = $paginator->paginate(
        $events, /* query NOT result */
        $request->query->getInt('page', 1)/*page number*/,
        3/*limit per page*/
    );
    return $this->render('event/allEvents.html.twig',
        ['events' => $events,'pagination' => $pagination]);
}
}
