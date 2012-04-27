<?php

namespace LF\Bundle\QuoteBundle;

use Doctrine\ORM\EntityManager;
/**
 * @author olaurendeau
 */
class QuoteFinder 
{
    
    protected $em;
    
    public function __construct(EntityManager $em) 
    {
        $this->em = $em;
    }
    
    public function search($stringPart)
    {
        return $this->em->getRepository('LFQuoteBundle:Quote')->search($stringPart);
    }
    
}

?>