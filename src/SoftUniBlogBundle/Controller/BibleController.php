<?php

namespace SoftUniBlogBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
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

class BibleController extends Controller
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
        if ($form->isSubmitted() && $form->isValid()) {

            /** @var UploadedFile $file */
            $file = $form->getData()->getImage();

            $fileName = md5(uniqid()) . '.' . $file->guessExtension();

            try {
                $file->move($this->getParameter('image_directory'),
                    $fileName);
            } catch (FileException $ex) {

            }

            $article->setImage($fileName);
            $currentUser = $this->getUser();
            $article->setAuthor($currentUser);
            $article->setViewCount(0);

            $em = $this->getDoctrine()->getManager();
            $em->persist($article);
            $em->flush();

            return $this->redirectToRoute("blog_index");
        }

        return $this->render('bible/add.html.twig',
            ['form' => $form->createView()]);
    }


    /**
     * @Route("/article/{id}", name="article_view")
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function viewArticle($id)
    {
        /** @var Article $article */
        $article = $this
            ->getDoctrine()
            ->getRepository(Article::class)
            ->find($id);

        $comments = $this->getDoctrine()
            ->getRepository(Comment::class)
            ->findAllComments($article);

        $article->setViewCount($article->getViewCount() + 1);
        $em = $this->getDoctrine()->getManager();

        $em->persist($article);
        $em->flush();
//var_dump($article,$comments);die();
        return $this->render("article/article.html.twig",
            ['article' => $article, 'comments' => $comments]);
    }

    /**
     * @Route("/article/edit/{id}", name="article_edit")
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     * @param Request $request
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function editAction(Request $request, $id)
    {
        $article = $this
            ->getDoctrine()
            ->getRepository(Article::class)
            ->find($id);

        if ($article === null) {
            return $this->redirectToRoute("blog_index");
        }

        /** @var User $currentUser */
        $currentUser = $this->getUser();

        if (!$currentUser->isAuthor($article) && !$currentUser->isAdmin()) {
            return $this->redirectToRoute("blog_index");
        }

        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            /** @var UploadedFile $file */
            $file = $form->getData()->getImage();

            $fileName = md5(uniqid()) . '.' . $file->guessExtension();

            try {
                $file->move($this->getParameter('image_directory'),
                    $fileName);
            } catch (FileException $ex) {

            }

            $article->setImage($fileName);

            $currentUser = $this->getUser();
            $article->setAuthor($currentUser);
            $em = $this->getDoctrine()->getManager();
            $em->merge($article);
            $em->flush();

            return $this->redirectToRoute("blog_index");
        }

        return $this->render('article/edit.html.twig',
            ['form' => $form->createView(),
                'article' => $article]);
    }

    /**
     * @Route("/article/delete/{id}", name="article_delete")
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     * @param Request $request
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function deleteAction(Request $request, $id)
    {
        $article = $this
            ->getDoctrine()
            ->getRepository(Article::class)
            ->find($id);

        if ($article === null) {
            return $this->redirectToRoute("blog_index");
        }

        /** @var User $currentUser */
        $currentUser = $this->getUser();

        if (!$currentUser->isAuthor($article) && !$currentUser->isAdmin()) {
            return $this->redirectToRoute("blog_index");
        }

        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $currentUser = $this->getUser();
            $article->setAuthor($currentUser);
            $em = $this->getDoctrine()->getManager();
            $em->remove($article);
            $em->flush();

            return $this->redirectToRoute("blog_index");
        }

        return $this->render('article/delete.html.twig',
            ['form' => $form->createView(),
                'article' => $article]);
    }

    /**
     * @Route("/myArticles", name="myArticles")
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     */
    public function myArticles()
    {
        $articles = $this->getDoctrine()
            ->getRepository(Article::class)
            ->findBy(['author' => $this->getUser()]);

        return $this->render("article/myArticles.html.twig",
            ['articles' => $articles]);
    }

    /**
     * @Route("/article/like/{id}", name="article_likes")
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function likes($id)
    {
//        var_dump($id);
        return $this->redirectToRoute('blog_index');
    }


}
