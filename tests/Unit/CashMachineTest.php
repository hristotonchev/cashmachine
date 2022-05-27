<?php

namespace Tests\Unit;

use App\CustomClass\CashMachine;
use Exception;
use Illuminate\Http\Request;
use PHPUnit\Framework\TestCase;

/**
 * @\Tests\Unit\CashMachineTest
 * @package Tests\Unit
 *
 * Unit tests for @CashMachine class
 */
class CashMachineTest extends TestCase
{
    /**
     * Invalid source is provided
     * Returns error message
     *
     * @throws Exception
     */
    public function testGenerateTransaction(): void
    {
        $request = Request::create('cash', 'post', ['source' => 'test']);

        $cashMachine = new CashMachine();
        $this->expectErrorMessage('Invalid transaction method');
        $cashMachine->generateTransaction($request);
    }
}
