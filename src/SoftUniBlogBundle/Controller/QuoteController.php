<?php

namespace SoftUniBlogBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use SoftUniBlogBundle\Entity\Actor;
use SoftUniBlogBundle\Entity\Article;
use SoftUniBlogBundle\Entity\Comment;
use SoftUniBlogBundle\Entity\Quote;
use SoftUniBlogBundle\Entity\User;
use SoftUniBlogBundle\Form\ArticleType;
use SoftUniBlogBundle\Form\QuoteType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;

class QuoteController extends Controller
{
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
//        var_dump($form->getData()->getImage());die();
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
            $relatedQuotes=$quote->getRelatedQuotes();
//            var_dump($currentUser);die();
            $quote->setAuthor($currentUser);
//            $article->setViewCount(0);
    //            $quote->setRelatedQuotes($relatedQuotes);
//            var_dump($quote->getRelatedQuotes()[0]);
            $related='';
            foreach($quote->getRelatedQuotes() as $key=>$value){
                $related.=','.$value->getId();
            }
            if(strlen($related)>1) {
                $related = substr($related, 1);
                $quote->setRelatedQuotes($related);
            }
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
        $relation = $this
            ->getDoctrine()
            ->getRepository(Quote::class)
            ->relatedQuotes($id);
        $relation=$relation->getRelatedQuotes();
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
        $actors=$quote->getActors();
//        $em = $this->getDoctrine()->getManager();
//        $em->persist($quote);
//        $em->flush();
        return $this->render('bible/quote.html.twig',
            ['quote' => $quote, 'actors' =>$actors,"related"=>$related]);
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
//        var_dump($quote);die();
        if ($quote === null) {
            return $this->redirectToRoute("blog_index");
        }
        /** @var User $currentUser */
        $currentUser = $this->getUser();
        if (!$currentUser->isAuthor($quote) && !$currentUser->isAdmin()) {
            return $this->redirectToRoute("blog_index");
        }
//        $related = $this
//            ->getDoctrine()
//            ->getRepository(Quote::class)
//            ->relatedQuotes($id);

        $relation=$quote->getRelatedQuotes();
//        var_dump($relation);die();
        $relation_arr=explode(",",$relation);
        $related=[];
        foreach($relation_arr as $value){
            $sql = $this
                ->getDoctrine()
                ->getRepository(Quote::class)
                ->find($value);
            $related[]=$sql;
        }
        $related['count']=count($relation_arr);
        $quote->setRelatedQuotes($related);
//        var_dump($quote->getRelatedQuotes());die();
        $form = $this->createForm(QuoteType::class, $quote);
        $fileName=$quote->getImage();
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            /** @var UploadedFile $file */
            $file = $form->getData()->getImage();
            $r=$form->getData()->getRelatedQuotes();
            var_dump($r);die();
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
//            var_dump($relation);die();
            $quote->setRelatedQuotes($relation);
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
    public function allQuotes()
    {
        $quotes = $this->getDoctrine()
            ->getRepository(Quote::class)
            ->findAll();

        return $this->render('bible/allQuotes.html.twig',
            ['quotes' => $quotes]);
    }

}
