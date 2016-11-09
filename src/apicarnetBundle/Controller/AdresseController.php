<?php
/**
 * Created by PhpStorm.
 * User: Nachit
 * Date: 09/11/2016
 * Time: 18:35
 */

namespace apicarnetBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AdresseController extends FOSRestController
{


    public function getAdressesAction($id)
    {
        $response = new Response($id, 200);
        return $response;

    } // "get_contact_adresses"   [GET] /contacts/{id}/adresses
    protected function getOr404($id)
    {
        if (!($adresse = $this->container->get('doctrine.orm.entity_manager')->getRepository('apicarnetBundle:Adresse')->find($id)  )) {
            throw new NotFoundHttpException(sprintf('Ressource \'%s\' introuvable.',$id));
        }

        return $adresse;
    }
}