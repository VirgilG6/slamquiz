<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/user")
 */

class UserController extends AbstractController {

/**
 * @Route("/index", name="user_index")
 */

    public function index() {

        $usersList = array();

        $usersList[0] ['first_name'] = 'Michel';
        $usersList[0] ['last_name'] = 'DUPOND';

        $usersList[1] ['first_name'] = 'Sophie';
        $usersList[1] ['last_name'] = 'BOULAZ';

        return $this->render('user/user.html.twig', 
            ['users_list' => $usersList,
         ]);
    }

}