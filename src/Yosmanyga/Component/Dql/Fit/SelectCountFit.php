<?php

namespace Yosmanyga\Component\Dql\Fit;

class SelectCountFit implements SelectFitInterface
{

    /**
     * @var string
     */
    private $field;

    /**
     * @param string $field
     */
    public function  __construct($field)
    {
        $this->field = $field;
    }
    
    /**
     * @param string $alias
     * @return Expr\Select|null
     */
    public function getSelect($alias)
    {
        return new Expr\Select(
            sprintf("COUNT(%s.%s)", $alias, $this->field)
        );
    }
}
