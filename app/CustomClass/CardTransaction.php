<?php
declare(strict_types=1);

namespace App\CustomClass;

use App\Rules\ExpirationDate;
use Exception;
use Illuminate\Http\Request;

/**
 * @CardTransaction
 * @package App/CustomClass
 *
 * Handle generation of data for card transaction payment input
 *
 */
class CardTransaction implements Transaction
{
    /** @var Request  */
    private Request $request;

    /** @var int Max money amount that can be transferred in one transaction */
    private const MONEY_AMOUNT = 20000;

    /** @var array hold the data that is taken from request */
    public array $inputs = [];

    /** @var float holds the amount that is summed from input  */
    public float $amount = 0;

    /**
     * Generate required data upon init
     *
     * @param Request $request
     * @throws Exception
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->inputs = $this->inputs();
        $this->amount = $this->amount();
    }

    /**
     * Validation rule that are required for successful transaction
     *
     * @return void
     * @throws Exception
     */
    public function validate(): void
    {
        if (!in_array($this->request->get('source'), CashMachine::VALID_MONEY_SOURCES)) {
            throw new Exception('Invalid Money Source');
        }

        $this->request->validate([
            'cardNumber'    => [
                'required',
                'regex:/^((4)\d{15})$/',
            ],
            'expDate'       => [
                'required',
                new ExpirationDate(),
            ],
            'cardHolder'    => [
                'required',
            ],
            'cvv'           => [
                'required',
                'min:3',
                'max:3',
            ],
            'amount'        => [
                'required',
                'numeric',
                'gt:0',
            ],
        ]);

        if ($this->amount > self::MONEY_AMOUNT) {
            throw new Exception('Maximum allowed amount is ' . self::MONEY_AMOUNT);
        }

    }

    /**
     * Returns the amount from request
     *
     * @return float
     * @throws Exception
     */
    public function amount(): float
    {
        return (float)$this->inputs['amount'];
    }

    /**
     * Build up the inputs and unset the non required once
     *
     * @return array
     */
    public function inputs(): array
    {
        $requestInputs = $this->request->all();
        unset($requestInputs['_token'], $requestInputs['send']);

        return $requestInputs;
    }

}
