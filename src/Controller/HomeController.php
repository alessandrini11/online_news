<?php

namespace App\Controller;

use App\Repository\BannerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(BannerRepository $repository): Response
    {

        return $this->render('home/index.html.twig',[
            'banners' => $repository->findBy(array(),array(
                'id' => 'DESC'
            ),1)
        ]);
    }

}
