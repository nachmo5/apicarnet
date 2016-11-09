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
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


class ContactController extends FOSRestController
{
    public function getContactAction($id)
    {

        $contact= $this->getOr404($id);


        $data = array(
            'civilite' => $contact->getCivilite(),
            'nom' => $contact->getNom(),
            'prenom' => $contact->getPrenom(),
            'date_de_naissance' => $contact->getDateDeNaissance(),
            'cree_le' => $contact->getCreeLe(),
            'misajour_le' => $contact->getMisajourLe(),
        );


        $response = new Response(json_encode($data), 200);
        $response->headers->set('Content-Type', 'application/json');
        $programmerUrl =  $this->generateUrl('api_1_get_contact', array('id' => $contact->getId(), '_format' => 'json'));
        $response->headers->set('Location', $programmerUrl);

        return $response;

    } // "get_contact"   [GET] /contacts/{id}

    protected function getOr404($id)
    {
        if (!($contact = $this->container->get('doctrine.orm.entity_manager')->getRepository('apicarnetBundle:Contact')->find($id)  )) {
            throw new NotFoundHttpException(sprintf('Ressource \'%s\' introuvable.',$id));
        }

        return $contact;
    }
}