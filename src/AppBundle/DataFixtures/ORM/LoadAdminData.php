<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Admin;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

class LoadAdminData extends AbstractFixture  implements ContainerAwareInterface
{
    use ContainerAwareTrait;

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        /**@var $admin Admin */
        $admin = new Admin();
        $userManager = $this->container->get('fos_user.user_manager');
        $admin = $userManager->createUser();
        $admin->setUsername('John');
        $admin->setEmail('john.doe@example.com');
        $admin->setPlainPassword('jesuisunmotdepasse');

        $userManager->updateUser($admin);

    }
}
