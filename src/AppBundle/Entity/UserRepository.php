<?php

namespace AppBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;
use Doctrine\ORM\Query;

/**
 * UserRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UserRepository extends EntityRepository
{

    public function findByApiKey($key)
    {
        $qb = $this->_em->createQueryBuilder();
        $qb->select('u')
            ->from('AppBundle:User', 'u')
            ->where('u.apiKey = :key')
            ->setParameter('key', $key);
        $query = $qb->getQuery();

        return $this->getSingleResult($query);
    }

    private function getSingleResult(Query $query)
    {
        try {
            $result = $query->getSingleResult();
        } catch (NonUniqueResultException $e) {
            $result = null;
        } catch (NoResultException $e) {
            $result = null;
        }

        return $result;
    }

}
