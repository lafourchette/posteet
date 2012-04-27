<?php

namespace LF\Bundle\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use LF\Bundle\UserBundle\Entity\User;
use LF\Bundle\UserBundle\Form\UserType;

/**
 * EditionController
 *
 * @author Olivier Dolbeau <contact@odolbeau.fr>
 */
class EditionController extends Controller
{

    public function newAction($country)
    {
        $user = new User();
        $user->setCountry($country);

        $form = $this->createForm('user', $user);

        if ('POST' === $this->getRequest()->getMethod()) {
            $form->bindRequest($this->getRequest());
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($user);
                $em->flush();

                $this->getRequest()->getSession()->setFlash('alert-success', sprintf('Votre utilisateur %s %s a bien été sauvegardé.', $user->getFirstName(), $user->getLastName()));

                return $this->redirect($this->generateUrl('LFUserBundle_Show_list'));
            }
        }

        return $this->render('LFUserBundle:Edition:new.html.twig', array(
            'country' => $country,
            'form' => $form->createView()
        ));
    }
}
