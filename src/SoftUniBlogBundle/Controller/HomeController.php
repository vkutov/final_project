<?php

namespace SoftUniBlogBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use SoftUniBlogBundle\Entity\Article;
use SoftUniBlogBundle\Entity\Quote;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends Controller
{
    /**
     * @Route("/", name="blog_index")
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
//    /**
//     * @Route("/", name="blog_index")
//     */
//    public function indexAction(Request $request)
//    {
//        $articles = $this
//            ->getDoctrine()
//            ->getRepository(Article::class)
//            ->findBy([], ['viewCount' => 'desc', 'dateAdded'=> 'desc']);
//        $paginator  = $this->get('knp_paginator');
//        $pagination = $paginator->paginate(
//            $articles, /* query NOT result */
//            $request->query->getInt('page', 1)/*page number*/,
//            2/*limit per page*/
//        );
////var_dump($pagination);die();
//        return $this->render('home/index.html.twig',
//            ['articles' => $articles,'pagination' => $pagination]);
//    }
//}
//

//public function listAction(Request $request)
//{
//    $em    = $this->get('doctrine.orm.entity_manager');
//    $dql   = "SELECT a FROM AcmeMainBundle:Article a";
//    $query = $em->createQuery($dql);
//
//    $paginator  = $this->get('knp_paginator');
//    $pagination = $paginator->paginate(
//        $query, /* query NOT result */
//        $request->query->getInt('page', 1)/*page number*/,
//        10/*limit per page*/
//    );
//
//    // parameters to template
//    return $this->render('AcmeMainBundle:Article:list.html.twig', array('pagination' => $pagination));
//}
}