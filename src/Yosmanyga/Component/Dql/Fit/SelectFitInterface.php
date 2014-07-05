<?php

namespace Yosmanyga\Component\Dql\Fit;

use Doctrine\ORM\Query\Expr;

interface SelectFitInterface
{
    /**
     * @param string $alias
     * @return Expr\Select|null
     */
    public function getSelect($alias);
}