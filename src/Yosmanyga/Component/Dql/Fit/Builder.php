<?php

namespace Yosmanyga\Component\Dql\Fit;

use Doctrine\ORM\EntityManagerInterface;

class Builder
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * @param string $class
     * @param mixed  $fit
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function build($class, $fit = null)
    {
        $alias = uniqid("A");

        /** @var \Doctrine\DBAL\Query\QueryBuilder $qb */
        $qb = $this->em->createQueryBuilder();
        $qb->select($alias)->from($class, $alias);

        if ($fit instanceof WhereFitInterface) {
            $where = $fit->getWhere($alias);
            if ($where) {
                $qb->where($where);
            }
        }

        if ($fit instanceof OrderFitInterface) {
            $order = $fit->getOrder($alias);
            if ($order) {
                $qb->orderBy($order);
            }
        }

        if ($fit instanceof LimitFitInterface) {
            $limit = $fit->getLimit();
            if ($limit) {
                $qb->setMaxResults($limit);
            }
        }

        return $qb;
    }
}