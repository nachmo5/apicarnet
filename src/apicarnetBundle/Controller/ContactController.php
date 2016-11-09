<?php
/**
 * Created by PhpStorm.
 * User: Nachit
 * Date: 09/11/2016
 * Time: 14:37
 */

namespace apicarnetBundle\Controller;


use FOS\RestBundle\Controller\FOSRestController;

class ContactController extends FOSRestController
{
    public function getContactAction($id)
    {
        return $this->container->get('doctrine.orm.entity_manager')->getRepository('Contact')->find($id);
    }
}