<?php

namespace App\Tests;

use App\Entity\Question;
use App\Entity\Answer;
use PHPUnit\Framework\TestCase;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\BrowserKit\Cookie;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\DomCrawler\Crawler;

class QuestionControllerTest extends WebTestCase
{
    private $client = null;

    public function setUp()
    {
        $this->client = static::createClient();
    }

    private function logIn($userName = 'user', $userRole = 'ROLE_USER')
    {
        $session = $this->client->getContainer()->get('session');

        $firewallName = 'main';
        // if you don't define multiple connected firewalls, the context defaults to the firewall name
        // See https://symfony.com/doc/current/reference/configuration/security.html#firewall-context
        $firewallContext = 'main';

        // you may need to use a different token class depending on your application.
        // for example, when using Guard authentication you must instantiate PostAuthenticationGuardToken
        $token = new UsernamePasswordToken($userName, null, $firewallName, [$userRole]);
        $session->set('_security_'.$firewallContext, serialize($token));
        $session->save();

        $cookie = new Cookie($session->getName(), $session->getId());
        $this->client->getCookieJar()->set($cookie);
    }

    public function testSecuredRoleUser()
    {
        $this->logIn('user', 'ROLE_USER');
        $crawler = $this->client->request('GET', '/question/new');

        // Asserts that /question path exists and don't return an error
        $this->assertEquals(403, $this->client->getResponse()->getStatusCode());
        /* 
        Ecrire ici le code pour vérifier que, si l'utilisateur est connecté avec le rôle ROLE_USER, 
        la requête '/question/new' affiche que l'accès est interdit
        c'est à dire affirmer que le code de statut de la réponse est égale à 403 (Response::HTTP_FORBIDDEN)
        */
    }

    public function testSecuredRoleAdmin()
    {
        $this->logIn('admin', 'ROLE_ADMIN');
        $crawler = $this->client->request('GET', '/question/2/new');

        // Asserts that /question/new path exists and don't return an error
        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());
        /* 
        Ecrire ici le code pour vérifier que, si l'utilisateur est connecté avec le rôle ROLE_ADMIN, 
        la requête '/question/new' renvoie une réponse HTTP avec un code de statut égale à 200 (Response::HTTP_OK)
        */
        
        // Asserts that the response content contains 'Create new question' in 'h1' tag
        $this->assertContains('<h1>Create new Question</h1>', $this->client->getResponse()->getContent());
        /* 
        Ecrire ici le code pour vérifier que, si l'utilisateur est connecté avec le rôle ROLE_ADMIN, 
        la requête '/question/new' renvoie 'Create new question' dans la balise 'h1'
        */
    }
}
