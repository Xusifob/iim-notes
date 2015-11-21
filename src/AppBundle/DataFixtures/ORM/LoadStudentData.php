<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Student;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

class LoadStudentData extends AbstractFixture implements OrderedFixtureInterface
{

    use ContainerAwareTrait;

    /**
     * @param ObjectManager $manager
     */
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

        $this->addReference('student', $student);

    }

    /**
     * @return int
     */
    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 2;
    }
}