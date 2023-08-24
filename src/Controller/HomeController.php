<?php

namespace App\Controller;

use App\Repository\CarouselRepository;
use App\Repository\HomeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    #[Route('/home', name: 'app_home2')]
    public function index(CarouselRepository $carouselRepository, HomeRepository $homeRepository): Response
    {
        # One recupère la home qui a la propriété isActive à la valeur true
        $home = $homeRepository->findOneBy(["isActive"=>true]);
        #on appelle dd pour voir les prorpiété de notre home
        // dd($home);
        # One recupère les carousel qui a la propriété isActive à la valeur true et la propriété tag à la valeur home
        $carousels = $carouselRepository->findBy(["isActive"=>true, "tag"=>"home"], ["rankNumber"=>"ASC"]);
        // dd($carousels);
        return $this->render('home/index.html.twig', [
            'home' => $home,
            'carousels'=> $carousels

        ]);
    }
}
