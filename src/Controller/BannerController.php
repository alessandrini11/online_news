<?php

namespace App\Controller;

use App\Entity\Banner;
use App\Form\BannerType;
use App\Repository\BannerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/banner")
 */
class BannerController extends AbstractController
{
    /**
     * @Route("/", name="banner_index", methods={"GET"})
     */
    public function index(BannerRepository $bannerRepository): Response
    {
        return $this->render('banner/index.html.twig', [
            'banners' => $bannerRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="banner_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $banner = new Banner();
        $form = $this->createForm(BannerType::class, $banner);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($banner);
            $entityManager->flush();

            return $this->redirectToRoute('banner_index');
        }

        return $this->render('banner/new.html.twig', [
            'banner' => $banner,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="banner_show", methods={"GET"})
     */
    public function show(Banner $banner): Response
    {
        return $this->render('banner/show.html.twig', [
            'banner' => $banner,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="banner_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Banner $banner): Response
    {
        $form = $this->createForm(BannerType::class, $banner);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('banner_index');
        }

        return $this->render('banner/edit.html.twig', [
            'banner' => $banner,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="banner_delete", methods={"POST"})
     */
    public function delete(Request $request, Banner $banner): Response
    {
        if ($this->isCsrfTokenValid('delete'.$banner->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($banner);
            $entityManager->flush();
        }

        return $this->redirectToRoute('banner_index');
    }
}
