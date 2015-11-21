<?php
/*
namespace AppBundle\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class StudentControllerTest extends WebTestCase
{


    public function test_it_lists_students()
    {
        $this->test_it_connexion_admin();

        $client = static::createClient();

        $crawler = $client->request('GET', '/admin/student/');

        // Ce test est idiot. Améliorez-le !
        $this->assertContains('Jean  Dupont', $client->getResponse()->getContent());
    }


    public function test_it_connexion_admin(){

        $client = static::createClient();

        $crawler = $client->request('GET', '/login');

        $form = $crawler->selectButton('submit')->form();

        $form['_username'] = 'John';
        $form['_password'] = 'jesuisunmotdepasse';

        $crawler = $client->submit($form);

    }
}*/