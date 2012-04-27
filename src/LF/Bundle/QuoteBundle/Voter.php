<?php

namespace LF\Bundle\QuoteBundle;

use Doctrine\ORM\EntityManager;


/**
 * Description of voter
 *
 * @author matthieu
 */
class Voter
{
    protected $quoteRepostiory;
    
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }
    
    
    public function increase($quote)
    {
        $quote->increaseVote();
        
        $this->em->flush();
    }
    
    public function decrease($quote)
    {
        $quote->decreaseVote();
        
        $this->em->flush();
     }
}

?>
