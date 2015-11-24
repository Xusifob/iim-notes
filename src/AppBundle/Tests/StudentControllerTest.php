<?php

namespace AppBundle\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class StudentsControllerTest extends WebTestCase
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
     * Test list student display
     */
    public function test_it_lists_students()
    {

        // Login the client
        $client =  $this->login();


        $crawler = $client->request('GET', '/admin/student/');

        // I look if there is "Jean  Dupont" displating on the page
        $this->assertContains('Jean  Dupont', $client->getResponse()->getContent());
    }

    /**
     * Test add a student
     */
    public function test_it_add_students()
    {

        // Login the client
        $client =  $this->login();


        $crawler = $client->request('GET', '/admin/student/add');

        /**
         * Get the form by the button's Label
         * http://symfony.com/doc/current/components/dom_crawler.html#forms
         */
        $form = $crawler->selectButton('Add')->form();


        // Fill up all fields
        $form['appbundle_student[email]'] = 'Louis@lefragile@gmail.com';
        $form['appbundle_student[firstName]'] = 'Louis';
        $form['appbundle_student[lastName]'] = 'Le Fragile';

        // Submit the form
        $client->submit($form);

        $crawler = $client->followRedirect();

        // I look if there is "Jean  Dupont" displating on the page
        $this->assertContains('Louis  Le Fragile', $client->getResponse()->getContent());
    }

    /**
     * Test delete a student
     */
    /*public function test_it_delete_students()
    {

        // Login the client
        $client =  $this->login();

        $client->request('GET', '/admin/student/delete/2');
        $this->assertContains('Nom du grade', $client->getResponse()->getContent());
    }*/
    /*
    public function test_it_delete_students()
    {

        // Login the client
        $client =  $this->login();

        $crawler = $client->request('GET', '/admin/student/delete/'.$id);

        $form = $crawler->selectLink('Delete')->form();

        $client->submit($form);

        $crawler = $client->followRedirect();

        $this->assertContains('List All Students', $client->getResponse()->getContent());
    }
    */
}