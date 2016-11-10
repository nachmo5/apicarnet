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


}