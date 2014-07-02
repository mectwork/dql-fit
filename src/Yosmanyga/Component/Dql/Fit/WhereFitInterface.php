<?php

namespace Yosmanyga\Component\Dql\Fit;

use Doctrine\ORM\Query\Expr;

interface WhereFitInterface
{
    /**
     * @param string $alias
     * @return Expr\Comparison|Expr\Composite|null
     */
    public function getWhere($alias);
}