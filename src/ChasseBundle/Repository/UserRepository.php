<?php


namespace ChasseBundle\Repository;

use Doctrine\ORM\EntityRepository;

class UserRepository extends EntityRepository
{
    //nb of male/female users > ok tested on workbench : SELECT username, gender, COUNT(gender) FROM mondialbdd.user group by gender
    public function countGender()
    {
        $qb = $this->createQueryBuilder('u')
            ->select('count(u.gender)')
            ->groupBy('u.gender')
            ->getQuery();

        return $qb->getSingleScalarResult();
    }

    //list of email who subscribed newsletter > ok tested on workbench : SELECT email, newsletter FROM mondialbdd.user WHERE newsletter = true
    public function getSubscribers()
    {
        $qb = $this->createQueryBuilder('u')
            ->select('u.email')
            ->where('u.newsletter'=='true')
            ->getQuery();

        return $qb->getResult();
    }


    //classment of the most registered status among users (student, employee, etc.) > ok tested on workbench, SELECT status, COUNT(status) FROM mondialbdd.user group by status
    public function getMostRegStatus()
    {
        $qb = $this->createQueryBuilder('u')
            ->select('u.status')
            ->groupBy('u.status')
            ->getQuery();

        return $qb->getResult();
    }

    //classment by age category
}