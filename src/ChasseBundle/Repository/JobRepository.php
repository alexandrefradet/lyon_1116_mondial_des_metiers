<?php

namespace ChasseBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * JobRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class JobRepository extends EntityRepository
{
    public function getJobsName($domain)
    {
        /** On met les % pour pouvoir utiliser "like" et ainsi utiliser de la wildcard.
         * Si pas de % le like se comporterait comme un simple where */
        $qb= $this->createQueryBuilder('j')
            -> select('j.name')
            /**   :country le ":" indique que country est un paramter */
            ->where('j.domain = :domain')
            ->setParameter('domain', $domain)
            ->getQuery();
        return $qb->getResult();
    }


    public function getDomains(){
        $qb= $this->createQueryBuilder('j')
            -> select('j.domain')
            ->distinct('true')
            ->getQuery();
        return $qb->getResult();

    }
}
