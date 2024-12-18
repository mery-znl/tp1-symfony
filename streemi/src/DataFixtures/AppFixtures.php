<?php

namespace App\DataFixtures;
use App\Entity\Category;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
// Création de la catégorie Action
$category1 = new Category();
$category1->setName('Action');
$category1->setLabel('Films d\'action');

// Création de la catégorie Aventure
$category2 = new Category();
$category2->setName('Aventure');
$category2->setLabel('Films d\'aventure');

// Persister les catégories
$manager->persist($category1);
$manager->persist($category2);
        $manager->flush();
    }
}
