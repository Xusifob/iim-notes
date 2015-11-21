<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Admin;
use AppBundle\Entity\Exam;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

class LoadExamData extends AbstractFixture  implements ContainerAwareInterface
{
    use ContainerAwareTrait;

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {

        // Je créé les objets que je veux pour mes tests
        $exam = new Exam();
        $exam->setName('Super Admin');
        $exam->setContent('Youhou je suis un exam');

        // Je sauvegarde en DB
        $manager->persist($exam);
        $manager->flush();

    }
}
