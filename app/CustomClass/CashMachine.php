<?php
declare(strict_types=1);

namespace App\CustomClass;

use App\Factory\TransactionFactory;
use Exception;
use Illuminate\Http\Request;
use App\Models\Transaction as TransactionModel;
use App\CustomClass\Transaction as TransactionInterface;

/**
 * @CashMachine CashMachine
 * @package App/CustomClass
 *
 * Build transaction request and validate it
 * Store it databases when transaction is successful
 */
class CashMachine
{
    /** @var string[] valid input sources for cash machine */
    public const VALID_MONEY_SOURCES = [
        'cash',
        'card',
        'bank',
    ];

    /**
     * Fetching correct money source based on request source
     * Validate correct data is populated
     * Store the data in db
     *
     * @param Request $request
     * @return string|null
     * @throws Exception
     */
    public function generateTransaction(Request $request): null|string
    {
        $source = $request->request->get('source');

        $moneySource = TransactionFactory::make($source, $request);

        try {
            $moneySource->validate();
        } catch (Exception $e) {
            return $e->getMessage();
        }

        $this->store($moneySource);

        return null;
    }

    /**
     * Store Transaction to Database
     * Redirect to home page with appropriate Status
     *
     * @param Transaction $transaction
     * @return void
     */
    public function store(TransactionInterface $transaction)
    {
        $transaction =  new TransactionModel(['amount'=> $transaction->amount(), 'inputs'=> json_encode($transaction->inputs)]);
        if (empty($transaction->getAttributeValue('amount')) || empty($transaction->getAttribute('inputs'))) {
            abort(redirect('/')->with('error', 'Your transaction was not successful'));
        }

        $transaction->save();
        abort(redirect('/')->with('success', 'Your transaction was successful'));
    }
}
