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
            // $this->addFlash()
            // dd("Vous devez être connectés pour réserver");
            $this->addFlash("success", "Votre réservation a bien été prise en compte");
            return $this->redirectToRoute("app_home");
        }
       // On crée la réservation
$reservation = new Reservation();
$reservation->setRoom($room);
$reservation->setUser($user);
$form = $this->createForm(ReservationType::class, $reservation);
$form->handleRequest($request);

// si le formulaire est soumis
if ($form->isSubmitted() && $form->isValid()) {
    $dateDebut = $form->get("dateDebut")->getData();
    $dateFin = $form->get("dateFin")->getData();

    // on vérifie si la date de début est dans le futur
    $now = new \DateTime();
    if ($dateDebut < $now) {
        $this->addFlash("erreur", "La date de réservation ne peut pas être dans le passé.");
        return $this->redirectToRoute("app_home"); 
    }

    $diff = $dateDebut->diff($dateFin);
    $nbJour = $diff->format("%a");

    // Set the price and persist the reservation
    $reservation->setPrix($room->getPrix() * $nbJour);
    $entityManagerInterface->persist($reservation);
    $this->addFlash("success", "Votre réservation a bien été prise en compte");
    $entityManagerInterface->flush();
    
    return $this->redirectToRoute("app_home");
}


        return $this->render('front_reservation/index.html.twig', [
            'form' => $form->createView(),
            'room'=>$room,
        ]);
    }
}
