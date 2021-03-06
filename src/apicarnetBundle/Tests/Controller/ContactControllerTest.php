<?php

/**
 * Created by PhpStorm.
 * User: Nachit
 * Date: 09/11/2016
 * Time: 23:27
 */
namespace apicarnetBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ContactControllerTest extends WebTestCase
{

    public function testGETContact()
    {
        $client   = static::createClient();
        $crawler  = $client->request("GET","/api/v1/contacts/2", array(),  array(), array( 'CONTENT_TYPE' => 'application/json'));

        $response = $client->getResponse();

        $this->assertEquals(200, $response->getStatusCode());
    }
    public function testGETContacts()
    {
        $client   = static::createClient();
        $crawler  = $client->request("GET","/api/v1/contacts", array(),  array(), array( 'CONTENT_TYPE' => 'application/json'));

        $response = $client->getResponse();

        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testPOST()
    {
        $client   = static::createClient();
        $crawler  = $client->request("POST","/api/v1/contacts", array(),  array(),
            array('CONTENT_TYPE' => 'application/json'),
            '{"civilite":"Monsieur","nom":"Ait","prenom":"Jimmy","date_de_naissance":null,"cree_le":null,"misajour_le":null}'

        );

        $response = $client->getResponse();
        $finishedData = json_decode($response->getContent(),true);

        $this->assertArrayHasKey('nom', $finishedData);

        $this->assertEquals(201, $response->getStatusCode());
        $this->assertFalse($response->headers->contains('Location',null));


    }
    public function testPUT()
    {

        $client   = static::createClient();
        $crawler  = $client->request("PUT","/api/v1/contacts/4", array(),  array(),
            array('CONTENT_TYPE' => 'application/json'),
            '{"civilite":"Monsieur","nom":"Nachit","prenom":"Med","date_de_naissance":null,"cree_le":null,"misajour_le":null}'

        );

        $response = $client->getResponse();
        $finishedData = json_decode($response->getContent(),true);





    }
    public function testDELETE()
    {
        $client   = static::createClient();
        $crawler  = $client->request("DELETE","/api/v1/contacts/1", array(),  array(), array( 'CONTENT_TYPE' => 'application/json'));

        $response = $client->getResponse();

        $this->assertEquals(204, $response->getStatusCode());


    }

}