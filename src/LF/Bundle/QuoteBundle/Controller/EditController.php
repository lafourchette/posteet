<?php

namespace LF\Bundle\QuoteBundle\Controller;

use LF\Bundle\QuoteBundle\Entity\Quote;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class EditController extends Controller
{
    
	public function newAction($mode = 'quote', $id = null)
    {
        $quote = new Quote();
        $link_image = "";
        if (null != $id) {
        	$quote = $this->getDoctrine()
        		->getRepository('LFQuoteBundle:Quote')
        		->findOneById($id);
        	if ($quote->getImage() != '') {
        		$mode = 'image';
        		$link_image = $this->get('kernel')
        		    ->getRootDir().'/../web/uploads/quotes/images' . $quote->getImage();
        	} elseif ($quote->getLink() != '') {
        		$mode = 'link';
        	}
        }
        $form = $this->createForm('quote', $quote, array(
        	'mode' => $mode,
        	'validation_groups' => array('Default', $mode)
        ));

        if ('POST' === $this->getRequest()->getMethod()) {
            $form->bindRequest($this->getRequest());
            if ($form->isValid()) {
            	if("image" === $mode) {
	            	$image = $form['image']->getData();
	            	$extension = $image->guessExtension();
	            	$dir = $this->get('kernel')
        		        ->getRootDir().'/../web/uploads/quotes/images';
	            	$fileName = date('ymdHis') . "-" . $quote->getAuthor() . "." . $extension;
	            	$image->move($dir, $fileName);
	            	$quote->setImage($fileName);
            	}
                $em = $this->getDoctrine()->getEntityManager();
                if (null != $id) {
                	
                } else {
                	$em->persist($quote);
                }
                $em->flush();

                $this->getRequest()->getSession()->setFlash('alert-success', 'Votre citation a bien été sauvegardée.');

                return $this->redirect($this->generateUrl('LFQuoteBundle_Show_list'));
            }
        }

        return $this->render('LFQuoteBundle:Edit:new.html.twig', array(
            'form' => $form->createView(),
            'mode' => $mode,
            'subMenu' => $this->getRequest()->get('subMenu') . $mode,
            'quote' => $quote,
            'link_image' => $link_image
        ));
    }
}
