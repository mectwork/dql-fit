<?php

namespace Yosmanyga\Component\Dql\Fit;

use Doctrine\ORM\Query\Expr;

class AndFit implements SelectFitInterface, WhereFitInterface, OrderFitInterface, LimitFitInterface
{
    /**
     * @var array
     */
    private $fits;

    /**
     * @param array $fits
     */
    function __construct($fits)
    {
        $this->fits = $fits;
    }

    /**
     * @param string $alias
     * @return Expr\Select|null
     */
    public function getSelect($alias)
    {
        $expr = new Expr\Select();
        foreach ($this->fits as $fit) {
            if ($fit instanceof SelectFitInterface) {
                $expr->add($fit->getSelect($alias));
            }
        }

        return $expr->count() != 0 ? $expr : null;
    }

    /**
     * @param string $alias
     * @return Expr\Andx|Expr\Comparison|Expr\Composite|null
     */
    public function getWhere($alias)
    {
        $expr = new Expr\Andx();
        foreach ($this->fits as $fit) {
            if ($fit instanceof WhereFitInterface) {
                $expr->add($fit->getWhere($alias));
            }
        }

        return $expr->count() != 0 ? $expr : null;
    }

    /**
     * @param string $alias
     * @return mixed|null
     */
    public function getOrder($alias)
    {
        foreach ($this->fits as $fit) {
            if ($fit instanceof OrderFitInterface) {
                return $fit->getOrder($alias);
            }
        }

        return null;
    }

    /**
     * @return int|null
     */
    public function getLimit()
    {
        foreach ($this->fits as $fit) {
            if ($fit instanceof LimitFitInterface) {
                return $fit->getLimit();
            }
        }

        return null;
    }
}