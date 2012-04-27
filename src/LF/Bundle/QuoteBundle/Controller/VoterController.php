<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

namespace LF\Bundle\QuoteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * Description of ShowController
 *
 * @author matthieu
 */
class VoterController extends Controller {

    public function increaseAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $quote = $em->getRepository('LFQuoteBundle:Quote')->findOneByid($id);
        // call service
        $this->get('quote.voter')->increase($quote);
        
        return new Response(json_encode(array('result' => 1, 'id' => $id, 'vote' => $quote->getVote())));  
    }

    public function decreaseAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $quote = $em->getRepository('LFQuoteBundle:Quote')->findOneByid($id);
        //call service
        $this->get('quote.voter')->decrease($quote);
        return new Response(json_encode(array('result' => 1, 'id' => $id, 'vote' => $quote->getVote())));  
    }
}