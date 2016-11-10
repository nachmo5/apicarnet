<?php
/**
 * Created by PhpStorm.
 * User: Nachit
 * Date: 09/11/2016
 * Time: 18:35
 */

namespace apicarnetBundle\Controller;

use apicarnetBundle\Entity\Contact;
use apicarnetBundle\Form\AdresseType;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use apicarnetBundle\Entity\Adresse;

class AdresseController extends FOSRestController
{

    public function putAdresseAction($id,$slug){

        if ($adresse = $this->container->get('doctrine.orm.entity_manager')->getRepository('apicarnetBundle:Adresse')->find($slug)) {

            $em = $this->getDoctrine()->getManager();

        }


        return new Response(null, 204);
    }

    public function deleteAdresseAction($id,$slug)
    {
        if ($adresse = $this->container->get('doctrine.orm.entity_manager')->getRepository('apicarnetBundle:Adresse')->find($slug)) {

            $em = $this->getDoctrine()->getManager();
            $em->remove($adresse);
            $em->flush();
        }


        return new Response(null, 204);

    }

    public function postAdresseAction(Request $request)
    {


        $body=$request->getContent();
        $data=json_decode($body,true);
        $adresse=new Adresse();

        $adresse->setRue($data['rue']);
        $adresse->setVille($data['ville']);
        $adresse->setCodePostal($data['code_postal']);
        $adresse->setCreeLe($data['cree_le']);
        $adresse->setMisajourLe($data['misajour_le']);

        if(!$contact = $this->container->get('doctrine.orm.entity_manager')->getRepository('apicarnetBundle:Contact')->find($data['contact']) )
        {
            throw new NotFoundHttpException(sprintf('Ressource introuvable.'));
        }
        $adresse->setContact($contact);

        $em=$this->getDoctrine()->getManager();
        $em->persist($adresse);
        $em->flush();


        $response=new Response('Adresse Cree',201);
        $response->headers->set('Content-Type', 'application/json');
        $programmerUrl =  $this->generateUrl('api_1_get_contact_adresse', array('id' => $contact->getId(),'slug'=>$adresse->getId(), '_format' => 'json'));
        $response->headers->set('Location', $programmerUrl);

        return $response;
    }

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