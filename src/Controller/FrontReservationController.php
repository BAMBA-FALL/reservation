<?php

namespace App\Controller;

use App\Entity\Reservation;
use App\Form\ReservationType;
use App\Repository\RoomRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FrontReservationController extends AbstractController
{
    #[Route('/reservation/{id}', name: 'app_front_reservation')]
    public function index($id, Request $request, RoomRepository $roomRepository, EntityManagerInterface $entityManagerInterface): Response
    {
        // On récupére la room et le user
        $room = $roomRepository->find($id);
        $user = $this->getUser();
        if(is_null($user)){
            //$this->addFlash()
            dd("Vous devez être connectés pour réserver");
        }
        // On crée la réservation
        $reservation = new Reservation();
        $reservation->setRoom($room);
        $reservation->setUser($user);
        $form = $this->createForm(ReservationType::class, $reservation);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $entityManagerInterface->persist($reservation);
            $entityManagerInterface->flush();
            $this->addFlash("success", "Votre réservation a bien été prise en compte");
            $this->redirectToRoute("app_home");
        }

        return $this->render('front_reservation/index.html.twig', [
            'form' => $form->createView(),
            'room'=>$room,
        ]);
    }
}
