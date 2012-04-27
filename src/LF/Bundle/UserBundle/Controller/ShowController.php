<?php

namespace LF\Bundle\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * ShowController.
 *
 * @author Olivier Dolbeau <contact@odolbeau.fr>
 */
class ShowController extends Controller
{
    public function listAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $users = $em->getRepository('LFUserBundle:User')->findAll();

        return $this->render('LFUserBundle:Show:list.html.twig', array(
            'users' => $users
        ));
    }
}
