<?php

namespace AppBundle\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ExamsControllerTest extends WebTestCase
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
     * Test list exam display
     */
    public function test_it_lists_exams()
    {

        // Login the client
        $client =  $this->login();


        $crawler = $client->request('GET', '/admin/exam/');

        // I look if there is "Jean  Dupont" displating on the page
        $this->assertContains('List All Exams', $client->getResponse()->getContent());
    }

    /**
     * Test add a exam
     */
    public function test_it_add_exams()
    {

        // Login the client
        $client =  $this->login();


        $crawler = $client->request('GET', '/admin/exam/add');

        /**
         * Get the form by the button's Label
         * http://symfony.com/doc/current/components/dom_crawler.html#forms
         */
        $form = $crawler->selectButton('Add')->form();


        // Fill up all fields
        $form['appbundle_exam[name]'] = 'Super Exam';
        $form['appbundle_exam[content]'] = 'Steeve';

        // Submit the form
        $client->submit($form);

        $crawler = $client->followRedirect();

        // I look if there is "Jean  Dupont" displating on the page
        $this->assertContains('List All Exams', $client->getResponse()->getContent());
    }

    /*
     * Test delete a exam
     */    
    /*
    public function test_it_delete_exams()
    {

        // Login the client
        $client =  $this->login();

        $crawler = $client->request('GET', '/admin/exam');

        $form = $crawler->selectButton('Delete')->form();

        $client->submit($form);

        $crawler = $client->followRedirect();

        $this->assertContains('List All Exams', $client->getResponse()->getContent());
    }*/
}