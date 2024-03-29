<?php

namespace App\DataFixtures\ORM;

use AppBundle\Entity\Task;
use AppBundle\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {
        // Comparer les fixtures avec Todo v2
        for ($u = 0; $u < 22; $u++) {
            $user = new User();
            $user->setUsername('usernumero' . $u);
            $user->setEmail($user->getUsername() . '@todolist.fr');
            $user->setPassword('$2y$13$ePq5oyaxgxQDsxbFaIB2/eBAiPHTaZ2eFZ3HqnYcwPDVbhntX1zR.');

            $manager->persist($user);
        }

        for ($t = 0; $t < 463; $t++) {
            $task = new Task();
            $task->setTitle('Titre de la tâche n° ' . $t);
            $task->setContent('Contenu de la tâche n° ' . $t);
            $task->isDone(false);
            $task->setCreatedAt(new \DateTime());

            $manager->persist($task);
        }

        $manager->flush();
    }
}
