<?php

namespace AppBundle\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class APITest extends WebTestCase
{

    public function test_api_lists_students()
    {
        $client = static::createClient([], [
            'HTTP_X-TOKEN'       => 'apiToken',
        ]);

        $crawler = $client->request('GET', '/api/students');

        $this->assertContains('Jean', $client->getResponse()->getContent());

    }

    public function test_api_lists_exams()
    {
        $client = static::createClient([], [
            'HTTP_X-TOKEN'       => 'apiToken',
        ]);

        $crawler = $client->request('GET', '/api/exams');

        $this->assertContains('Youhou', $client->getResponse()->getContent());

    }


    //TODO Faire la fonction test_api_lists_grades en s'inspirant de test_api_lists_exams
    public function test_api_lists_grades()
    {
        $client = static::createClient([], [
            'HTTP_X-TOKEN'       => 'apiToken',
        ]);

        $crawler = $client->request('GET', '/api/grades');

        $this->assertContains('Nom du grade', $client->getResponse()->getContent());

    }

}