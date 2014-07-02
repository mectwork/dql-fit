<?php

namespace Yosmanyga\Component\Dql\Fit;

use Doctrine\ORM\Query\Expr;

class WhereCriteriaFit implements WhereFitInterface
{
    /**
     * @var array
     */
    private $criteria;

    /**
     * @param array $criteria
     */
    function __construct($criteria)
    {
        $this->criteria = $criteria;
    }

    /**
     * @param string $alias
     * @return Expr\Andx|Expr\Comparison|Expr\Composite|null
     */
    public function getWhere($alias)
    {
        $expr = new Expr\Andx();
        foreach ($this->criteria as $key => $value) {
            $expr->add(new Expr\Comparison(sprintf("%s.%s", $alias, $key), Expr\Comparison::EQ, $value));
        }

        return $expr->count() != 0 ? $expr : null;
    }
}