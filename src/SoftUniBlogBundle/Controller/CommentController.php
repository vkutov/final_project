<?php

namespace SoftUniBlogBundle\Controller;

use SoftUniBlogBundle\Entity\Article;
use SoftUniBlogBundle\Entity\Comment;
use SoftUniBlogBundle\Entity\User;
use SoftUniBlogBundle\Form\CommentType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class CommentController extends Controller
{
    /**
     * @Route("/article/{id}/comment", name="add_comment")
     * @param Request $request
     * @param Article $article
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function addComment(Request $request, Article $article)
    {
//        var_dump($request);
        $user = $this->getUser();

        /** @var User $author */
        $author = $this
            ->getDoctrine()
            ->getRepository(User::class)
            ->find($user->getId());

        $comment = new Comment();
//        var_dump($comment);
        $form = $this->createForm(CommentType::class, $comment);
//        var_dump($form->getData(),$comment);
        $form->handleRequest($request);
//        var_dump($form->getData(),$comment);die();
        $comment->setAuthor($author);
        $comment->setArticle($article);
        $author->addComment($comment);
        $article->addComment($comment);
        $em = $this->getDoctrine()->getManager();
        $em->persist($comment);
        $em->flush();

        return $this->redirectToRoute('article_view',
            ['id' => $article->getId()]);
    }





}
