namespace Yosmanyga\Component\Dql\Fit;

use Yosmanyga\Component\Dql\Fit\LimitFitInterface;

class LimitFit implements LimitFitInterface
{
    private $amount;

    public function __construct($amount)
    {
        $this->amount = $amount;
    }

    public function getLimit()
    {
        return $this->amount;
    }
}
