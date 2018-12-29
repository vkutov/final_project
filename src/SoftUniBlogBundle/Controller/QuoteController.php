<?php
namespace SoftUniBlogBundle\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use SoftUniBlogBundle\Entity\Quote;
use SoftUniBlogBundle\Entity\User;
use SoftUniBlogBundle\Form\QuoteType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
class QuoteController extends Controller
{
    public function objectToString(Quote $quote){
        $relatedQuotes='';
        foreach($quote->getRelatedQuotes() as $key=>$value){
            $relatedQuotes.=','.$value->getId();
        }
        $relatedQuotes=substr($relatedQuotes,1);
        return $relatedQuotes;
    }
    public function stringToObject(Quote $quote){
        $relation=$quote->getRelatedQuotes();
        $relation=explode(",",$relation);
        $related=[];
        foreach($relation as $value){
            $sql = $this
                ->getDoctrine()
                ->getRepository(Quote::class)
                ->find($value);
            $related[]=$sql;
        }
        $related['count']=count($relation);
        return $related;
    }
    /**
     * @Route("/quote/add", name="add_quote")
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function createAction(Request $request)
    {
        $quote = new Quote();
        $form = $this->createForm(QuoteType::class, $quote);
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
                $quote->setImage($fileName);
            }
            $currentUser = $this->getUser();
            $quote->setAuthor($currentUser);
            $quote->setRelatedQuotes($this->objectToString($quote));
            $em = $this->getDoctrine()->getManager();
            $em->persist($quote);
            $em->flush();
            return $this->redirectToRoute("blog_index");
        }
        return $this->render('bible/add.html.twig',
            ['form' => $form->createView()]);
    }
    /**
     * @Route("/quote/{id}", name="quote_view")
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function viewQuote($id)
    {
        /** @var Quote $quote*/
        $quote = $this
            ->getDoctrine()
            ->getRepository(Quote::class)
            ->find($id);

        $related=$this->stringToObject($quote);
//        $actors=$quote->getActors();
//        $em = $this->getDoctrine()->getManager();
//        $em->persist($quote);
//        $em->flush();
        return $this->render('bible/quote.html.twig',
            ['quote' => $quote,"related"=>$related]);
    }
    /**
     * @Route("/quote/edit/{id}", name="quote_edit")
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     * @param Request $request
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function editAction(Request $request, $id)
    {
        $quote = $this
            ->getDoctrine()
            ->getRepository(Quote::class)
            ->find($id);
        if ($quote === null) {
            return $this->redirectToRoute("blog_index");
        }
        /** @var User $currentUser */
        $currentUser = $this->getUser();
        if (!$currentUser->isAuthor($quote) && !$currentUser->isAdmin()) {
            return $this->redirectToRoute("blog_index");
        }
        $related=$this->stringToObject($quote);
        $quote->setRelatedQuotes($related);
        $form = $this->createForm(QuoteType::class, $quote);
        $fileName=$quote->getImage();
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
            $quote->setImage($fileName);
            $currentUser = $this->getUser();
            $quote->setAuthor($currentUser);
            $rq=$this->objectToString($quote);
            $quote->setRelatedQuotes($rq);
            $em = $this->getDoctrine()->getManager();
            $em->merge($quote);
            $em->flush();
            return $this->redirectToRoute("blog_index");
        }
        return $this->render('bible/edit.html.twig',
            ['form' => $form->createView(),
                'quote' => $quote,'related'=>$related]);
    }
    /**
     * @Route("/quote/delete/{id}", name="quote_delete")
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     * @param Request $request
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function deleteAction(Request $request, $id)
    {
        $quote = $this
            ->getDoctrine()
            ->getRepository(Quote::class)
            ->find($id);
        if ($quote === null) {
            return $this->redirectToRoute("blog_index");
        }
        /** @var User $currentUser */
        $currentUser = $this->getUser();
        if (!$currentUser->isAuthor($quote) && !$currentUser->isAdmin()) {
            return $this->redirectToRoute("blog_index");
        }
        $related=$this->stringToObject($quote);
        $quote->setRelatedQuotes($related);
        $form = $this->createForm(QuoteType::class, $quote);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $currentUser = $this->getUser();
            $quote->setAuthor($currentUser);
            $em = $this->getDoctrine()->getManager();
            $em->remove($quote);
            $em->flush();
            return $this->redirectToRoute("blog_index");
        }
        return $this->render('bible/delete.html.twig',
            ['form' => $form->createView(),
                'quote' => $quote]);
    }
    /**
     * @Route("/allQuotes", name="allQuotes")
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     */
    public function allQuotes(Request $request)
    {
        $quotes = $this->getDoctrine()
            ->getRepository(Quote::class)
            ->findAll();
        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $quotes, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            3/*limit per page*/
        );
        return $this->render('bible/allQuotes.html.twig',
            ['quotes' => $quotes,'pagination' => $pagination]);
    }
}
