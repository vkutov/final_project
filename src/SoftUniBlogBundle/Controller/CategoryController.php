<?php
namespace SoftUniBlogBundle\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use SoftUniBlogBundle\Entity\Actor;
use SoftUniBlogBundle\Entity\Article;
use SoftUniBlogBundle\Entity\Comment;
use SoftUniBlogBundle\Entity\Category;
//use SoftUniBlogBundle\Service\QuoteServices;
use SoftUniBlogBundle\Entity\User;
use SoftUniBlogBundle\Form\ArticleType;
use SoftUniBlogBundle\Form\CategoryType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
class CategoryController extends Controller
{

    /**
     * @Route("/category/add", name="add_category")
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function createAction(Request $request)
    {
        $category = new Category();
        $form = $this->createForm(CategoryType::class, $category);
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
                $category->setImage($fileName);
            }
            $currentUser = $this->getUser();
//            $relatedQuotes=$quote->getRelatedQuotes();
//            var_dump($relatedQuotes);die();
            $category->setAuthor($currentUser);
            $em = $this->getDoctrine()->getManager();
            $em->persist($category);
            $em->flush();
            return $this->redirectToRoute("blog_index");
        }
        return $this->render('category/add.html.twig',
            ['form' => $form->createView()]);
    }
    /**
     * @Route("/category/{id}", name="category_view")
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function viewCategory($id)
    {
        /** @var Category $category*/
        $category = $this
            ->getDoctrine()
            ->getRepository(Category::class)
            ->find($id);
        $actors=$category->getActors();
//        $em = $this->getDoctrine()->getManager();
//        $em->persist($quote);
//        $em->flush();
        return $this->render('category/category.html.twig',
            ['category' => $category, 'actors' =>$actors]);
    }
    /**
     * @Route("/category/edit/{id}", name="category_edit")
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     * @param Request $request
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function editAction(Request $request, $id)
    {
        $category = $this
            ->getDoctrine()
            ->getRepository(Category::class)
            ->find($id);
        if ($category === null) {
            return $this->redirectToRoute("blog_index");
        }
        /** @var User $currentUser */
        $currentUser = $this->getUser();
        if (!$currentUser->isAuthor($category) && !$currentUser->isAdmin()) {
            return $this->redirectToRoute("blog_index");
        }

        $form = $this->createForm(CategoryType::class, $category);
        $fileName=$category->getImage();
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
            $category->setImage($fileName);
            $currentUser = $this->getUser();
            $category->setAuthor($currentUser);
//            $rq=$this->objectToString($quote);
//            $quote->setRelatedQuotes($rq);
            $em = $this->getDoctrine()->getManager();
            $em->merge($category);
            $em->flush();
            return $this->redirectToRoute("blog_index");
        }
        return $this->render('bible/edit.html.twig',
            ['form' => $form->createView(),
                'category' => $category]);
    }
    /**
     * @Route("/category/delete/{id}", name="category_delete")
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     * @param Request $request
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function deleteAction(Request $request, $id)
    {

        $category = $this
            ->getDoctrine()
            ->getRepository(Category::class)
            ->find($id);

        if ($category === null) {
            return $this->redirectToRoute("blog_index");
        }

        /** @var User $currentUser */
        $currentUser = $this->getUser();
        if (!$currentUser->isAuthor($category) && !$currentUser->isAdmin()) {
            return $this->redirectToRoute("blog_index");
        }
        $form = $this->createForm(CategoryType::class, $category);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $currentUser = $this->getUser();
            $category->setAuthor($currentUser);
            $em = $this->getDoctrine()->getManager();
            $em->remove($category);
            $em->flush();
            return $this->redirectToRoute("blog_index");
        }
        return $this->render('category/delete.html.twig',
            ['form' => $form->createView(),
                'category' => $category]);
    }
    /**
     * @Route("/allCategories", name="allCategories")
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     */
    public function allCategories()
    {
        $categories = $this->getDoctrine()
            ->getRepository(Category::class)
            ->findAll();
        return $this->render('category/allCategories.html.twig',
            ['categories' => $categories]);
    }
}