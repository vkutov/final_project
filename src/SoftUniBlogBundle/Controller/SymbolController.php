<?php
namespace SoftUniBlogBundle\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
//use SoftUniBlogBundle\Entity\Actor;
//use SoftUniBlogBundle\Entity\Article;
//use SoftUniBlogBundle\Entity\Comment;
use SoftUniBlogBundle\Entity\Symbol;
use SoftUniBlogBundle\Service\QuoteServices;
use SoftUniBlogBundle\Entity\User;
use SoftUniBlogBundle\Form\ArticleType;
use SoftUniBlogBundle\Form\SymbolType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
class SymbolController extends Controller
{
    public function objectToString(Symbol $symbol){
        $relatedSymbols='';
        foreach($symbol->getRelatedSymbols() as $key=>$value){
            $relatedSymbols.=','.$value->getId();
        }
        $relatedSymbols=substr($relatedSymbols,1);
        return $relatedSymbols;
    }
    public function stringToObject(Symbol $symbol){
        $relation=$symbol->getRelatedSymbols();
        $relation=explode(",",$relation);
        $related=[];
        foreach($relation as $value){
            $sql = $this
                ->getDoctrine()
                ->getRepository(Symbol::class)
                ->find($value);
            $related[]=$sql;
        }
        $related['count']=count($relation);
        return $related;
    }
    /**
     * @Route("/symbol/add", name="add_symbol")
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function createAction(Request $request)
    {
        $symbol = new Symbol();
        $form = $this->createForm(SymbolType::class, $symbol);
        $form->handleRequest($request);
//        var_dump($form->getData()->getImage());die();
        if ($form->isSubmitted() && $form->isValid()) {
            $file = $form->getData()->getImage();
//            var_dump($form->getData()->getActors());die("create");
            if(!is_null($file)) {
                $fileName = md5(uniqid()) . '.' . $file->guessExtension();
                try {
                    $file->move($this->getParameter('image_directory'),
                        $fileName);
                } catch (FileException $ex) {
                }
                $symbol->setImage($fileName);
            }
            $currentUser = $this->getUser();
            $symbol->setAuthor($currentUser);
            $symbol->setRelatedSymbols($this->objectToString($symbol));
            $em = $this->getDoctrine()->getManager();
            $em->persist($symbol);
            $em->flush();
            return $this->redirectToRoute("blog_index");
        }
        return $this->render('symbol/add.html.twig',
            ['form' => $form->createView()]);
    }
    /**
     * @Route("/symbol/{id}", name="symbol_view")
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function viewSymbol($id)
    {
        /** @var Symbol $symbol*/
        $symbol = $this
            ->getDoctrine()
            ->getRepository(Symbol::class)
            ->find($id);
        $related=$this->stringToObject($symbol);
        $actors=$symbol->getActors();
//        $em = $this->getDoctrine()->getManager();
//        $em->persist($quote);
//        $em->flush();
        return $this->render('symbol/symbol.html.twig',
            ['symbol' => $symbol, 'actors' =>$actors,"related"=>$related]);
    }
    /**
     * @Route("/symbol/edit/{id}", name="symbol_edit")
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     * @param Request $request
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function editAction(Request $request, $id)
    {
        $symbol = $this
            ->getDoctrine()
            ->getRepository(Symbol::class)
            ->find($id);
        if ($symbol === null) {
            return $this->redirectToRoute("blog_index");
        }
        /** @var User $currentUser */
        $currentUser = $this->getUser();
        if (!$currentUser->isAuthor($symbol) && !$currentUser->isAdmin()) {
            return $this->redirectToRoute("blog_index");
        }
        $related=$this->stringToObject($symbol);
        $symbol->setRelatedSymbols($related);
//        var_dump($quote->getRelatedQuotes());die();
        $form = $this->createForm(SymbolType::class, $symbol);
        $fileName=$symbol->getImage();
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
            $symbol->setImage($fileName);
            $currentUser = $this->getUser();
            $symbol->setAuthor($currentUser);
            $rs=$this->objectToString($symbol);
//            var_dump($form->getData()->getActors());die();
            $symbol->setRelatedSymbols($rs);
            $em = $this->getDoctrine()->getManager();
            $em->merge($symbol);
            $em->flush();
            return $this->redirectToRoute("blog_index");
        }
        return $this->render('symbol/edit.html.twig',
            ['form' => $form->createView(),
                'symbol' => $symbol,'related'=>$related]);
    }
    /**
     * @Route("/symbol/delete/{id}", name="symbol_delete")
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     * @param Request $request
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function deleteAction(Request $request, $id)
    {
        $symbol = $this
            ->getDoctrine()
            ->getRepository(Symbol::class)
            ->find($id);
        if ($symbol === null) {
            return $this->redirectToRoute("blog_index");
        }
        /** @var User $currentUser */
        $currentUser = $this->getUser();
        if (!$currentUser->isAuthor($symbol) && !$currentUser->isAdmin()) {
            return $this->redirectToRoute("blog_index");
        }
//        var_dump($quote->getRelatedQuotes());die();
        $related=$this->stringToObject($symbol);
        $symbol->setRelatedSymbols($related);
//        var_dump($quote->getRelatedQuotes());die();
        $form = $this->createForm(SymbolType::class, $symbol);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $currentUser = $this->getUser();
            $symbol->setAuthor($currentUser);
            $em = $this->getDoctrine()->getManager();
            $em->remove($symbol);
            $em->flush();
            return $this->redirectToRoute("blog_index");
        }
        return $this->render('symbol/delete.html.twig',
            ['form' => $form->createView(),
                'symbol' => $symbol]);
    }
    /**
     * @Route("/allSymbols", name="allSymbols")
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     */

    public function allSymbols(Request $request)
    {
        $symbols = $this->getDoctrine()
            ->getRepository(Symbol::class)
            ->findAll();
        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $symbols, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            3/*limit per page*/
        );
        return $this->render('symbol/allSymbols.html.twig',
            ['symbols' => $symbols,'pagination' => $pagination]);
    }
}
