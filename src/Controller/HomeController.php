<?php

namespace App\Controller;

use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="app_home")
     */
    public function index(EntityManagerInterface $entityManagerInterface): Response
    {
        $isBest = $entityManagerInterface->getRepository(Product::class)->findByIsBest(1);
        return $this->render('home/index.html.twig', [
            'isBest' => $isBest,
        ]);
    }
}
