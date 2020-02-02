<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AdminArticleController extends AbstractController
{
    /**
     * @Route("/admin/article", name="admin_article")
     */
    public function index()
    {
        $articles = $this->getDoctrine()->getRepository(Article::class)->findAll();
        return $this->render('admin_article/index.html.twig', [
        'articles' => $articles,
    ]);
    }

    /**
     * @Route("/admin/article/creer", name="article_creer")
     */
    public function creer(Request $request)
    {
        $article = new Article();
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);

        if( $form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($article);
            $em->flush();

            return $this->redirectToRoute('admin_article');
        }
        return $this->render('admin_article/creer.html.twig', [
            'article' => $article,
            'form' => $form->createView()
        ]);

    }

    /**
     * @Route("/article/{id}/{slug}", name="test")
     */
    public function voir(Article $article)
    {
        return $this->render('test/index.html.twig', [
            'article' => $article
        ]);
    }
}
