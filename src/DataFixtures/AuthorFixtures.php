<?php

namespace App\DataFixtures;

use App\Entity\Author;
use App\Entity\Book;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AuthorFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        $authors = [
            ["J.K", "Rowling"],
            ["René", "Goscinny"],
            ["Gustave", "Flaubert"],
            ["Emile", "Zola"]
        ];

        foreach ($authors as $author) {

            $aut = new Author();
            $aut->setFirstName($author[0]);
            $aut->setLastName($author[0]);
            $manager->persist($aut);
            $this->setReference('author-'. strtolower($author[1]), $aut);
        }

        $manager->flush();
    }
}
