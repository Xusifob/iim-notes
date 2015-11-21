<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Admin;
use AppBundle\Entity\Exam;
use AppBundle\Entity\Grade;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

class LoadGradeData extends AbstractFixture  implements OrderedFixtureInterface
{
    use ContainerAwareTrait;

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {


        /** @var Exam $exam */
        $exam = $this->getReference('exam');
        $student = $this->getReference('student');

        // Je créé les objets que je veux pour mes tests
        $grade = new Grade();
        $grade
            ->setExam($exam)
            ->setStudent($student)
            ->setGrade('Nom du grade')
        ;

        // Je sauvegarde en DB
        $manager->persist($grade);
        $manager->flush();

    }

    /**
     * @return int
     */
    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 3;
    }


}
