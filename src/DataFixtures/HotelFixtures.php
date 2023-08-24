<?php

namespace App\DataFixtures;

use App\Entity\Hotel;
use DateTimeImmutable;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class HotelFixtures extends Fixture
{

// ====================================================== //
// ====================== PROPRIETE ===================== //
// ====================================================== //
public const HOTEL_ALMADIE = "hotel almadie";
public const HOTEL_MBOUR = "hotel mbour";
public const HOTEL_RAVIN= "hotel ravin";
// ====================================================== //
// ====================== METHODES ====================== //
// ====================================================== //

    public function load(ObjectManager $manager): void
    {
        $hotel = new Hotel();
        $hotel->setNom('Hotel almadies');
        $hotel->setSlug('hote-almadies');
        $hotel->setDescription("Les saveurs du Sénégal et du monde entier fusionnent dans les restaurants de l'hôtel. 
        Le restaurant principal propose une cuisine gastronomique inspirée des produits locaux et 
        des recettes traditionnelles, tandis que le restaurant de plage vous invite à savourer des fruits
        de mer frais tout en admirant le coucher de soleil spectaculaire sur l'océan. Les bars de l'hôtel s
        ont des havres de convivialité, offrant des cocktails créatifs et des vins sélectionnés avec soin");
        $hotel->setImageName('hoetel-almadie');
        $hotel->setUpdatedAt( new DateTimeImmutable('now'));
        $hotel->setIsActive(true);
        $manager->persist($hotel);
        // on crée une reference pour l'hotel Hotel almadie que l'on pourra utiliser dans d'autres fixturs
        // et la catégorie est associee à la  contante HOTEL_ALMADIE
        $this->addReference(self::HOTEL_ALMADIE, $hotel);


        $hotel = new Hotel();
        $hotel->setNom('Hotel mbour');
        $hotel->setSlug('hote-mbour');
        $hotel->setDescription("Les saveurs du Sénégal et du monde entier fusionnent dans les restaurants de l'hôtel. 
        Le restaurant principal propose une cuisine gastronomique inspirée des produits locaux et 
        des recettes traditionnelles, tandis que le restaurant de plage vous invite à savourer des fruits
        de mer frais tout en admirant le coucher de soleil spectaculaire sur l'océan. Les bars de l'hôtel s
        ont des havres de convivialité, offrant des cocktails créatifs et des vins sélectionnés avec soin");
        $hotel->setImageName('hoetel-mbour');
        $hotel->setUpdatedAt( new DateTimeImmutable('now'));
        $hotel->setIsActive(true);
        $manager->persist($hotel);
        // on crée une reference pour l'hotel Hotel almadie que l'on pourra utiliser dans d'autres fixturs
        // et la catégorie est associee à la  contante HOTEL_ALMADIE
        $this->addReference(self::HOTEL_MBOUR, $hotel);


        $hotel = new Hotel();
        $hotel->setNom('Hotel ravin');
        $hotel->setSlug('hote-ravin');
        $hotel->setDescription("Les saveurs du Sénégal et du monde entier fusionnent dans les restaurants de l'hôtel. 
        Le restaurant principal propose une cuisine gastronomique inspirée des produits locaux et 
        des recettes traditionnelles, tandis que le restaurant de plage vous invite à savourer des fruits
        de mer frais tout en admirant le coucher de soleil spectaculaire sur l'océan. Les bars de l'hôtel s
        ont des havres de convivialité, offrant des cocktails créatifs et des vins sélectionnés avec soin");
        $hotel->setImageName('hoetel-ravin');
        $hotel->setUpdatedAt( new DateTimeImmutable('now'));
        $hotel->setIsActive(true);
        $manager->persist($hotel);
        // on crée une reference pour l'hotel Hotel almadie que l'on pourra utiliser dans d'autres fixturs
        // et la catégorie est associee à la  contante HOTEL_ALMADIE
        $this->addReference(self::HOTEL_RAVIN, $hotel);


        $manager->flush();
    }
}
