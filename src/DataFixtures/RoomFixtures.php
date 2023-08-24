<?php

namespace App\DataFixtures;

use App\Entity\Room;
use App\DataFixtures\HotelFixtures;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class RoomFixtures extends Fixture
{
  // ====================================================== //
// ===================== PROPRITETE ===================== //
// ====================================================== //
public const YAS_ALMADIE = "yas-almadie";
public const MBOUR_SALY = "mbour-saly";
public const RAVIN_DAKAR= "ravin-dakar";
// ====================================================== //
// ====================== METHODES ====================== //
// ====================================================== //
    public function load(ObjectManager $manager): void
    {
        $room = new Room();
        $room->setTitre('Yas almadie');
        $room->setSlug('yas-almadie');
        $room->setDescription("L'Hôtel Yas Sénégal, une adresse prestigieuse au cœur de Dakar, incarne 
        le raffinement contemporain et l'hospitalité chaleureuse. Dès votre arrivée, vous serez séduit par 
        l'architecture moderne et épurée de l'hôtel, 
        mêlant harmonieusement le design minimaliste et les touches sénégalaises authentiques.");
        $room->setPrix(35);
        $room->setIsActive(true);
        $room->setHotel($this->getReference(HotelFixtures::HOTEL_ALMADIE));
        $manager->persist($room);
        $this->addReference(self::YAS_ALMADIE, $room);

        $room = new Room();
        $room->setTitre('Mbour saly');
        $room->setSlug('mbour_saly');
        $room->setDescription("L'Hôtel Yas Sénégal, une adresse prestigieuse au cœur de Dakar, incarne 
        le raffinement contemporain et l'hospitalité chaleureuse. Dès votre arrivée, vous serez séduit par 
        l'architecture moderne et épurée de l'hôtel, 
        mêlant harmonieusement le design minimaliste et les touches sénégalaises authentiques.");
        $room->setPrix(30);
        $room->setIsActive(true);
        $room->setHotel($this->getReference(HotelFixtures::HOTEL_MBOUR));
        $manager->persist($room);
        $this->addReference(self::MBOUR_SALY, $room);

        $room = new Room();
        $room->setTitre('Ravin dakar');
        $room->setSlug('ravin_dakar');
        $room->setDescription("L'Hôtel Yas Sénégal, une adresse prestigieuse au cœur de Dakar, incarne 
        le raffinement contemporain et l'hospitalité chaleureuse. Dès votre arrivée, vous serez séduit par 
        l'architecture moderne et épurée de l'hôtel, 
        mêlant harmonieusement le design minimaliste et les touches sénégalaises authentiques.");
        $room->setPrix(25);
        $room->setIsActive(true);
        $room->setHotel($this->getReference(HotelFixtures::HOTEL_RAVIN));
        $manager->persist($room);
        $this->addReference(self::RAVIN_DAKAR, $room);

        $manager->flush();
    }
}
