<?php

namespace AppBundle\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class GradeControllerTest extends WebTestCase
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
     * Test list grade display
     */
    public function test_it_lists_grades()
    {

        // Login the client
        $client =  $this->login();


        $crawler = $client->request('GET', '/admin/grade/');

        // I look if there is "Jean  Dupont" displating on the page
        $this->assertContains('Nom du grade', $client->getResponse()->getContent());
    }

    /**
     * Test add a Grade
     */
    public function test_it_add_grades()
    {

        // Login the client
        $client =  $this->login();


        $crawler = $client->request('GET', '/admin/grade/add');

        /**
         * Get the form by the button's Label
         * http://symfony.com/doc/current/components/dom_crawler.html#forms
         */
        $form = $crawler->selectButton('Add')->form();


        // Fill up all fields
        $form['appbundle_grade[grade]'] = 18;
        $form['appbundle_grade[student]']->select(1);
        $form['appbundle_grade[exam]']->select(1);

        // Submit the form
        $client->submit($form);

        $crawler = $client->followRedirect();

        // I look if there is "Jean  Dupont" displating on the page
        $this->assertContains('Nom du grade', $client->getResponse()->getContent());
    }
    /**
     * Test delete a grade
     */
    /*public function test_it_delete_grades()
    {

        // Login the client
        $client =  $this->login();

        $client->request('GET', '/admin/grade/add/delete/2');
        $this->assertContains('Nom du grade', $client->getResponse()->getContent());
    }*/
    /*
    public function test_it_delete_grades()
    {

        // Login the client
        $client =  $this->login();

        $crawler = $client->request('GET', '/admin/grade/delete/'.$id);

        $form = $crawler->selectLink('Delete')->form();

        $client->submit($form);

        $crawler = $client->followRedirect();

        $this->assertContains('List All Grades', $client->getResponse()->getContent());
    }
    */
}