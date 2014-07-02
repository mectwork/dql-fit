<?php

namespace Yosmanyga\Component\Dql\Fit;

use Doctrine\ORM\Query\Expr;

interface OrderFitInterface
{
    /**
     * @param string $alias
     * @return Expr\OrderBy|null
     */
    public function getOrder($alias);
}