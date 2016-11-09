<?php
/**
 * Created by PhpStorm.
 * User: Nachit
 * Date: 09/11/2016
 * Time: 14:37
 */

namespace apicarnetBundle\Controller;


use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Response;


class ContactController extends FOSRestController
{
    public function getContactAction($id)
    {

        $contact= $this->container->get('doctrine.orm.entity_manager')->getRepository('apicarnetBundle:Contact')->find($id);
        $response=new Response($contact->getCivilite(),'200');
        return $response;

    }
}