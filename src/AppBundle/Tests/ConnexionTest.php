<?php

namespace AppBundle\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class StudentControllerTest extends WebTestCase
{

    /**
     *
     * Login the user
     *
     * @return \Symfony\Bundle\FrameworkBundle\Client
     */
    public function login(){

        $client = static::createClient();

        $crawler = $client->request('GET', '/login');

        /**
         * Get the form by the button's Label
         * http://symfony.com/doc/current/components/dom_crawler.html#forms */
        $form = $crawler->selectButton('Login')->form();

        $form['_username'] = 'John';
        $form['_password'] = 'jesuisunmotdepasse';

        $client->submit($form);

        return $client;

    }


    /**
     * Test connexion admin
     */
    public function test_it_connexion_admin(){

        $client = $this->login();

        $crawler = $client->request('GET', '/admin/student/');


        // I look if I can go on this page
        $this->assertContains('Students', $client->getResponse()->getContent());

    }


    /**
     * Test if i'm still redirected when I am not connected
     */
    public function test_it_redirect_if_not_connected_admin(){

        $client = static::createClient();

        $client->request('GET', '/admin/student/');


        // If there is a redirection, I follow it
        $crawler = $client->followRedirect();

        // I look if I can go on this page
        $this->assertContains('Login', $client->getResponse()->getContent());

    }

}