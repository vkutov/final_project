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
//    public function objectToString(Category $category){
//        $relatedCategories='';
////        $quote_arr=explode(',',$quote->getRelatedQuotes());
////        var_dump($quote->getRelatedQuotes());die();
//        foreach($quote->getRelatedQuotes() as $key=>$value){
////            var_dump($value->getId());die();
//            $relatedQuotes.=','.$value->getId();
//        }
//        $relatedQuotes=substr($relatedQuotes,1);
////        if(strlen($relatedQuotes)>1) {
////            $related = substr($relatedActors, 1);
////            $quote->setRelatedQuotes($relatedQuotes);
////        }
//        return $relatedQuotes;
//
//    }
//    public function stringToObject(Quote $quote){
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
//        return $related;
//    }
    /**
     * QuoteController constructor.
     */
//    public function __construct(QuoteServices $quote)
//    {
//    }
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
                $category->setImage($fileName);
            }
            $currentUser = $this->getUser();
//            $relatedQuotes=$quote->getRelatedQuotes();
//            var_dump($relatedQuotes);die();
            $category->setAuthor($currentUser);
//            $related='';
//            foreach($quote->getRelatedQuotes() as $key=>$value){
//                $related.=','.$value->getId();
//            }
//            if(strlen($related)>1) {
//                $related = substr($related, 1);
//                $quote->setRelatedQuotes($related);
//            }
//            $rq=$quote->getRelatedQuotes();
//            $quote->setRelatedQuotes($rq);
//            var_dump($quote);die();
//            var_dump($this->objectToString($quote));die();
//            $category->setRelatedQuotes($this->objectToString($category));
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
//        $related=$this->stringToObject($category);
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
//        $related=$this->stringToObject($category);
//        $category->setRelatedCategories($related);
//        var_dump($quote->getRelatedQuotes());die();
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
//        var_dump($quote->getRelatedQuotes());die();
//        $related=$this->stringToObject($quote);
//        $category->setRelatedQuotes($related);
//        var_dump($quote->getRelatedQuotes());die();
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
        return $this->render('bible/delete.html.twig',
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