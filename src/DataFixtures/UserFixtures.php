<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $user = new User();
        $user->setEmail('user@gmail.com');
        $user->setRoles(['ROLE_USER']);
        $user->setPassword($this->passwordEncoder->encodePassword(
            $user,
            '123456'
        ));
        $manager->persist($user);

        $user = new User();
        $user->setEmail('admin@gmail.com');
        $user->setRoles(['ROLE_ADMIN']);
        $user->setPassword($this->passwordEncoder->encodePassword(
            $user,
            '123456'
        ));
        $manager->persist($user);

        $user = new User();
        $user->setEmail('superadmin@gmail.com');
        $user->setRoles(['ROLE_SUPER_ADMIN']);
        $user->setPassword($this->passwordEncoder->encodePassword(
            $user,
            '123456'
        ));
        $manager->persist($user);

        $manager->flush();
    }
}
