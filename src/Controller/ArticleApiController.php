<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ArticleApiController
 * @package App\Controller
 * @Route("/admin/articleapi")
 */
class ArticleApiController extends AbstractController
{
    /**
     * @Route("/" ,name="article_api")
     */
    public function index(ArticleRepository $repo ): Response
    {
       return $this->render('article_api/index.html.twig');
    }
}
