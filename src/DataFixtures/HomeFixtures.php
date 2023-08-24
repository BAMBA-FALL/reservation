<?php

namespace App\DataFixtures;

use App\Entity\Carousel;
use App\Entity\Home;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class HomeFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $home = new Home();
        $home->setTitre('');
        $home->setTexte('Votre site Tukki vous permettra de découvrir le sénégal dans toute sa diversité');
        $home->setIsActive(true);
        $manager->persist($home);

        $home = new Home();
        $home->setTitre('Bienvenue');
        $home->setTexte('Votre site Tukki, pour découvrir le sénégal');
        $home->setIsActive(false);
        $manager->persist($home);

        $manager->flush();
    }
}
