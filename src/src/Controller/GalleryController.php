<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\ImageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GalleryController extends AbstractController
{
    private ImageRepository $imageRepository;

    public function __construct(ImageRepository $imageRepository)
    {
        $this->imageRepository = $imageRepository;
    }

    /**
     * @Route("/gallery", name="gallery")
     */
    public function index(): Response
    {
        $images = $this->imageRepository->findAll();

        return $this->render('gallery/index.html.twig', [
            'images' => $images,
        ]);
    }

    /**
     * @Route("/gallery/:id", name="gallery_show")
     */
    public function show(): Response
    {
        return $this->render('gallery/show.html.twig', [

        ]);
    }
}
