<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Student;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;

class LoadStudentData extends AbstractFixture
{
    public function load(ObjectManager $manager)
    {
        // Je créé les objets que je veux pour mes tests
        $student = new Student();
        $student->setEmail('test@test.com');
        $student->setFirstName('Jean');
        $student->setLastName('Dupont');

        // Je sauvegarde en DB
        $manager->persist($student);
        $manager->flush();
    }
}