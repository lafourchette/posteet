<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

namespace LF\Bundle\QuoteBundle\Controller;

use Symfony\Component\HttpFoundation\Response;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Description of ShowController
 *
 * @author matthieu
 */
class ShowController extends Controller {

    //put your code here
    public function listAction()
    {
        $request = $this->getRequest();
        if ($request->request->has('stringPart')) {
            $stringPart = $request->request->get('stringPart');
        } else {
            $stringPart = $request->get('stringPart');
        }
        
        $stringPart = $stringPart == 'index' ? null : $stringPart;
        
        $quotes = $this->get('quote_finder')->search($stringPart);
        
        $format = $this->getRequest()->get('_format');
        
        if ($request->isXmlHttpRequest()) {
            return $this->render('LFQuoteBundle:Show:list.html.twig', array(
                    'o_quotes' => $quotes,
                    'stringPart' => $stringPart,
                    'subMenu' => $this->getRequest()->get('subMenu')
            ));
        }
        
        return $this->render('LFQuoteBundle:Show:index.'.$format.'.twig', array(
                'o_quotes' => $quotes,
                'stringPart' => $stringPart,
                'subMenu' => $this->getRequest()->get('subMenu')
        ));
    }

    public function doVotePlus($id)
    {
        // recuéprer obj
        // 
        // call service
        // $this->get('voter')->plus($quote);
        
        // return response
        
        $em = $this->getDoctrine()->getEntityManager();
        $quote = $em->getRepository('LFQuoteBundle:Quote')->findOneByid($id_vote);
        
    }

}

?>
