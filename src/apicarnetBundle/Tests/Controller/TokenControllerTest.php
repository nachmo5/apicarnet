<?php
/**
 * Created by PhpStorm.
 * User: Nachit
 * Date: 10/11/2016
 * Time: 15:01
 */

namespace apicarnetBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
class TokenControllerTest extends WebTestCase
{
    public function testbadMDP()
    {
        $client   = static::createClient();
        $crawler  = $client->request("POST","/api/v1/tokens", array(),  array(),
            array('CONTENT_TYPE' => 'application/json'),
            '{"motdepasse":"appartoos"}'

        );

        $response = $client->getResponse();
        $finishedData = json_decode($response->getContent(),true);

        $this->assertNotEquals(200, $response->getStatusCode());



    }
    public function testGoodMDP()
    {
        $client   = static::createClient();
        $crawler  = $client->request("POST","/api/v1/tokens", array(),  array(),
            array('CONTENT_TYPE' => 'application/json'),
            '{"motdepasse":"appartoo"}'

        );

        $response = $client->getResponse();
        $finishedData = json_decode($response->getContent(),true);

        $this->assertEquals(200, $response->getStatusCode());



    }
}