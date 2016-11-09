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
use apicarnetBundle\Entity\Adresse;
class AdresseController extends FOSRestController
{

    public function getAdresseAction($id,$slug)
    {
        $adresse= $this->getOneOr404($id,$slug);
        $data = $this->serializeAdresse($adresse);

        $response = new Response(json_encode($data), 200);
        $response->headers->set('Content-Type', 'application/json');
        $programmerUrl =  $this->generateUrl('api_1_get_contact_adresse', array('id' => $id,'slug'=>$slug, '_format' => 'json'));
        $response->headers->set('Location', $programmerUrl);

        return $response;

    }

    public function getAdressesAction($id)
    {
        $adresses= $this->getOr404($id);
        $data = array('adresses' => array());

        foreach ($adresses as $adresse) {
            $data['adresses'][] = $this->serializeAdresse($adresse);
        }


        $response = new Response(json_encode($data), 200);
        $response->headers->set('Content-Type', 'application/json');
        $programmerUrl =  $this->generateUrl('api_1_get_contact_adresses', array('id' => $id, '_format' => 'json'));
        $response->headers->set('Location', $programmerUrl);

        return $response;

    } // "get_contact_adresses"   [GET] /contacts/{id}/adresses
    protected function getOr404($id)
    {
        if (!($adresses = $this->container->get('doctrine.orm.entity_manager')->getRepository('apicarnetBundle:Adresse')->findBy(array('contact' => $id)) )) {
            throw new NotFoundHttpException(sprintf('Ressource \'%s\' introuvable.',$id));
        }

        return $adresses;
    }
    protected function getOneOr404($id,$slug)
    {
        if (!($adresses = $this->container->get('doctrine.orm.entity_manager')->getRepository('apicarnetBundle:Adresse')->find($slug) )) {
            throw new NotFoundHttpException(sprintf('Ressource \'%s\' introuvable.',$slug));
        }

        return $adresses;
    }

    private function serializeAdresse(Adresse $programmer)
    {
        return array(
            'code_postal' => $programmer->getCodePostal(),
            'rue' => $programmer->getRue(),
            'ville' => $programmer->getVille(),
            'cree_le' => $programmer->getCreeLe(),
            'misajour_le' => $programmer->getMisajourLe(),
        );
    }
}