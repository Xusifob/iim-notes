<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Admin;
use AppBundle\Entity\Exam;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

/**
 * Class LoadExamData
 * @package AppBundle\DataFixtures\ORM
 *
 * @Implements OrderedFixtureInterface : is used to allow order in creating data (create student before grades)
 */
class LoadExamData extends AbstractFixture  implements OrderedFixtureInterface
{
    use ContainerAwareTrait;

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {

        // Je créé les objets que je veux pour mes tests
        $exam = new Exam();
        $exam
            ->setName('Super Admin')
            ->setContent('Youhou je suis un exam')
        ;

        // Je sauvegarde en DB
        $manager->persist($exam);
        $manager->flush();

        $this->addReference('exam', $exam);

    }

    /**
     * @return int
     */
    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 1;
    }

}
