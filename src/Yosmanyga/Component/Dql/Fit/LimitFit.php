namespace Yosmanyga\Component\Dql\Fit;

use Yosmanyga\Component\Dql\Fit\LimitFitInterface;

class LimitFit implements LimitFitInterface
{
    /*
     * @var int
     */
    private $amount;

    /**
     * Constructor.
     *
     * @param int $amount
     */
    public function __construct($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @return int
     */
    public function getLimit()
    {
        return $this->amount;
    }
}
