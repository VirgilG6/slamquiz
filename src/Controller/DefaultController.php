<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/")
 */

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="default")
     */
    public function index()
    {
        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }


    /**
     * @Route("/user", name="default_user")
     */
    public function user()
    {
        $firstName = "Michel";
        $lastName = "DUPOND";
        return $this->render('user/user.html.twig', [
            'first_name'=>$firstName,
            'last_name'=>$lastName,
        ]);
    }

}
