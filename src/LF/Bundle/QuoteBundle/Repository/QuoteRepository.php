<?php

namespace LF\Bundle\QuoteBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * UserRepository
 *
 * @author David & Renaud 
 */
class QuoteRepository extends EntityRepository
{
    
    public function search($stringPart)
    {
        $list = $this->createQueryBuilder('q')
            ->add('where', "q.author LIKE '%$stringPart%' OR q.text LIKE '%$stringPart%'")
            ->getQuery()
            ->getResult();
    
        return $list;
    }
}

