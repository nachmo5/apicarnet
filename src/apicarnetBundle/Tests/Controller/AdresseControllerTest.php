<?php
/**
 * Created by PhpStorm.
 * User: Nachit
 * Date: 10/11/2016
 * Time: 02:18
 */

namespace apicarnetBundle\Tests\Controller;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;


class AdresseControllerTest extends WebTestCase
{
    public function testGETAdresse()
    {
        $client   = static::createClient();
        $crawler  = $client->request("GET","/api/v1/contacts/1/adresses", array(),  array(), array( 'CONTENT_TYPE' => 'application/json'));

        $response = $client->getResponse();

        $this->assertEquals(200, $response->getStatusCode());
    }


    public function testPOST()
    {
        $client   = static::createClient();
        $crawler  = $client->request("POST","/api/v1/contacts/adresses", array(),  array(),
            array('CONTENT_TYPE' => 'application/json'),
            '{"code_postal":"coudepiz","rue":"laruez","ville":"lavillez","contact":"2","cree_le":null,"misajour_le":null}'

        );

        $response = $client->getResponse();
        $finishedData = json_decode($response->getContent(),true);


        $this->assertEquals(201, $response->getStatusCode());
        $this->assertFalse($response->headers->contains('Location',null));


    }
    public function testDELETE()
    {
        $client   = static::createClient();
        $crawler  = $client->request("DELETE","/api/v1/contacts/1/adresses/3", array(),  array(), array( 'CONTENT_TYPE' => 'application/json'));

        $response = $client->getResponse();

        $this->assertEquals(204, $response->getStatusCode());


    }


}