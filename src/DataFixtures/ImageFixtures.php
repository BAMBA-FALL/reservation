<?php

namespace App\DataFixtures;

use App\Entity\Image;
use App\DataFixtures\RoomFixtures;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;


class ImageFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $image = new Image();
        $image->setImageName('yas_almadie');
        $image->setRoom($this->getReference(RoomFixtures::YAS_ALMADIE));
        $image->setRankOrder(1);
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('mbour_saly');
        $image->setRoom($this->getReference(RoomFixtures::MBOUR_SALY));
        $image->setRankOrder(2);
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('ravin_dakar');
        $image->setRoom($this->getReference(RoomFixtures::RAVIN_DAKAR));
        $image->setRankOrder(3);
        $manager->persist($image);



        $manager->flush();
    }

    public function getDependencies():array{
        return[
            RoomFixtures::class
        ];
    }
   
}
