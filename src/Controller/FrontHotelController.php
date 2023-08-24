<?php

namespace App\Controller;

use App\Repository\HotelRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FrontHotelController extends AbstractController
{

    /** Fonction qui est appelé par un render controlller dans la base et qui permet de générer un menu déroulant avec les Hotels */
    public function renderHotelDropDOown(HotelRepository $hotelRepository): Response
    {

        $hotels = $hotelRepository->findBy(["isActive"=>true], ["nom"=>"ASC"]);
        return $this->render('front_hotel/_hotel_dropdown.html.twig', [
            'hotels'=> $hotels,
        ]);

    }

    #[Route('/hotel/{slug}', name: 'app_front_hotel')]
    public function index($slug, HotelRepository $hotelRepository): Response
    {
        if($slug == 'hotel'){
            $hotel = $hotelRepository->findOneBy(["slug"=>$slug]);
            return $this->render('front_hotel/index.html.twig', [
            'controller_name' => 'FrontHotelController',
        ]);
        }else{
            $hotel = $hotelRepository->findOneBy(["slug"=>$slug]);
        return $this->render('front_hotel/show.html.twig', [
            'hotel' => $hotel,
        ]);
        }
       
    }
}
