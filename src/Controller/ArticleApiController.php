<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleApiController extends AbstractController
{
    /**
     * @Route("/api/article", name="article_api",methods={"GET"})
     */
    public function index(ArticleRepository $repo ): Response
    {
        return $this->json($repo->findAll(),200,[],['groups' =>'article:read']);

    }
}
