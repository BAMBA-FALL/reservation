<?php

namespace App\Controller;

use App\Repository\RoomRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FrontRoomController extends AbstractController
{
    #[Route('/room/{slug}', name: 'app_front_room')]
    public function index($slug, RoomRepository $roomRepository): Response
    {
        return $this->render('front_room/index.html.twig', [
            'room' => $roomRepository->findOneBy(["slug"=>$slug]),
        ]);
    }
}
