<?php

namespace App\Factory;

use App\CustomClass\BankTransaction;
use App\CustomClass\CardTransaction;
use App\CustomClass\CashTransaction;
use App\CustomClass\Transaction;
use Illuminate\Http\Request;

/**
 * @TransactionFactory
 * @package App\Factory
 *
 * Responsible for building Transaction class based on request
 * Throws exception if class is not found
 */
class TransactionFactory
{
    /** @var string[] avaible transaction classes */
    public const TRANSACTION = [
        'cash' => CashTransaction::class,
        'card' => CardTransaction::class,
        'bank' => BankTransaction::class,
    ];

    /**
     * Build Transaction classes with required data
     *
     * @param string $moneySource
     * @param Request $request
     * @return Transaction
     * @throws \Exception
     */
    public static function make(string $moneySource, Request $request): Transaction
    {
        if (!in_array($moneySource, array_keys(self::TRANSACTION))) {
            throw new \Exception('Invalid transaction method');
        }

        $transactionClass = self::TRANSACTION[$moneySource];

        return new $transactionClass($request);
    }
}
