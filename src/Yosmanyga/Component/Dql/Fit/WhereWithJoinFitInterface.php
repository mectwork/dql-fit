<?php

namespace Yosmanyga\Component\Dql\Fit;

use Doctrine\ORM\Query\Expr;

interface WhereWithJoinFitInterface extends WhereFitInterface
{
    /**
     * @param string $alias
     * @return Expr\Join|null
     */
    public function getJoin($alias);
}