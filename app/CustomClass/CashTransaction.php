<?php
declare(strict_types=1);

namespace App\CustomClass;

use Exception;
use Illuminate\Http\Request;

/**
 * @CashTransaction
 * @package App/CustomClass
 *
 * Handle generation of data for cash transaction payment input
 */
class CashTransaction implements Transaction
{
    /** @var Request  */
    private Request $request;

    /** @var int Max money amount that can be transferred in one transaction */
    private const MONEY_AMOUNT = 10000;

    /** @var int[] map for valid banknotes that will be validated */
    private const VALID_BANKNOTES = [
        1   => 1,
        5   => 5,
        10  => 10,
        50  => 50,
        100 => 100,
    ];

    /** @var array hold the data that is taken from request */
    public array $inputs = [];

    /** @var float holds the amount that is summed from input  */
    public float $amount = 0.0;

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
            'banknote1'     => [
                'required',
                'integer',
                'gt:-1',
            ],
            'banknote5'     => [
                'required',
                'integer',
                'gt:-1',
            ],
            'banknote10'    => [
                'required',
                'integer',
                'gt:-1',
            ],
            'banknote50'    => [
                'required',
                'integer',
                'gt:-1',
            ],
            'banknote100'   => [
                'required',
                'integer',
                'gt:-1',
            ],
        ]);

        if ($this->amount > self::MONEY_AMOUNT) {
            throw new Exception('Maximum allowed amount is ' . self::MONEY_AMOUNT);
        }

    }

    /**
     * Sums the amount for request
     *
     * @return float
     * @throws Exception
     */
    public function amount(): float
    {
        $totalAmount = 0;

        $amountFields = $this->inputs;
        $validBanknotes = self::VALID_BANKNOTES;

        unset($amountFields['source']);

        foreach($amountFields as $key => $value) {
            $banknote = (int)str_replace('banknote', '', $key);
            if (!in_array($banknote, $validBanknotes)) {

                throw new Exception('Invalid Banknote choice');
            }
            unset($validBanknotes[$banknote]);

            $totalAmount += $banknote * $value;
        }


        return (float)$totalAmount;
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
