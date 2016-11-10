<?php
/**
 * Created by PhpStorm.
 * User: Nachit
 * Date: 10/11/2016
 * Time: 14:50
 */

namespace apicarnetBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Exception\BadCredentialsException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class TokenController extends FOSRestController
{
    public function postTokenAction(Request $request)
    {
        $body=$request->getContent();
        $data=json_decode($body,true);
        if($data['motdepasse']=="appartoo"){
            $token = $this->get('lexik_jwt_authentication.encoder')
                ->encode([
                    'motdepasse' => "appartoo",
                    'exp' => time() + 3600 // 1 hour expiration
                ]);
        }
        else
            return new JsonResponse(null,401);

        return new JsonResponse(['token' => $token]);

    }
}