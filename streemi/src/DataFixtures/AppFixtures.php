<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Language;
use App\Entity\User;
use App\Entity\Media;
use App\Entity\Playlist;
use App\Entity\PlaylistMedia;
use App\Entity\Comment;
use App\Entity\WatchHistory;
use App\Entity\Subscription;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Création des catégories
        $category1 = new Category();
        $category1->setName('Action');
        $category1->setLabel('Films d\'action');
        $manager->persist($category1);

        $category2 = new Category();
        $category2->setName('Aventure');
        $category2->setLabel('Films d\'aventure');
        $manager->persist($category2);

        // Création d'un média (avant la boucle des langues)
        $media = new Media();
        $media->setTitle('Inception');
        $media->setReleaseDate(new \DateTime('2010-07-16'));
        $media->addCategory($category1);
        $media->addCategory($category2);
        $manager->persist($media);

        // Création des langues avec une boucle
        $languages = ['Français', 'Anglais', 'Espagnol'];
        foreach ($languages as $name) {
            $language = new Language();
            $language->setName($name);
            $language->setCode(substr($name, 0, 2));
            $manager->persist($language);

            // Relier les langues au média
            $media->addLanguage($language);
        }

        // Création d'un utilisateur
        $user = new User();
        $user->setUsername('john_doe');
        $user->setEmail('john.doe@example.com');
        $user->setPassword('password123');
        $manager->persist($user);

        // Création d'une playlist
        $playlist = new Playlist();
        $playlist->setName('Top Films');
        $manager->persist($playlist);

        // Création de PlaylistMedia pour relier la playlist au média
        $playlistMedia = new PlaylistMedia();
        $playlistMedia->setPlaylist($playlist);
        $playlistMedia->setMedia($media);
        $playlistMedia->setAddedAt(new \DateTime());
        $manager->persist($playlistMedia);

        // Création d'un commentaire pour le média
        $comment = new Comment();
        $comment->setContent('Un film captivant, à voir absolument !');
        $comment->setCreatedAt(new \DateTime());
        $comment->setMedia($media);
        $manager->persist($comment);

        // Création d'un historique de visionnage
        $watchHistory = new WatchHistory();
        $watchHistory->setUser($user);
        $watchHistory->setMedia($media);
        $watchHistory->setWatchedAt(new \DateTime());
        $manager->persist($watchHistory);

        // Création d'un abonnement
        $subscription = new Subscription();
        $subscription->setUser($user);
        $subscription->setPlanName('Premium');
        $subscription->setStartDate(new \DateTime('-1 month'));
        $subscription->setEndDate(new \DateTime('+11 months'));
        $manager->persist($subscription);

        // Flush final
        $manager->flush();
    }
}
