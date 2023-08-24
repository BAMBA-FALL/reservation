<?php

namespace App\DataFixtures;

use App\Entity\Carousel;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CarouselFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $carousel = new Carousel();
        $carousel->setRankNumber(1);
        $carousel->setTag("home");
        $carousel->setIsActive(true);
        $carousel->setImageName("île.jpg");
        $carousel->setTitre('île');
        $manager->persist($carousel);

        $carousel = new Carousel();
        $carousel->setRankNumber(2);
        $carousel->setTag("home");
        $carousel->setIsActive(true);
        $carousel->setImageName("car.jpg");
        $carousel->setTitre('car');
        $manager->persist($carousel);

        $carousel = new Carousel();
        $carousel->setRankNumber(3);
        $carousel->setTag("home");
        $carousel->setIsActive(true);
        $carousel->setImageName("pirogue.jpg");
        $carousel->setTitre('pirogue');
        $manager->persist($carousel);

        
        $carousel = new Carousel();
        $carousel->setRankNumber(3);
        $carousel->setTag("home");
        $carousel->setIsActive(true);
        $carousel->setImageName("pont.jpg");
        $carousel->setTitre('pont');
        $manager->persist($carousel);


        $manager->flush();
    }
}
