<?php

namespace AppBundle\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class StudentControllerTest extends WebTestCase
{
    public function test_it_lists_students()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/admin/student/');

        // Ce test est idiot. Améliorez-le !
        $this->assertContains('Jean  Dupont', $client->getResponse()->getContent());
    }
}