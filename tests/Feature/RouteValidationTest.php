<?php

namespace Tests\Feature;

use Tests\TestCase;

/**
 * @RouteValidationTest
 * @package Test\Feature
 *
 * Basic routing test to validate all routes respond correctly
 */
class RouteValidationTest extends TestCase
{
    /**
     * Test index route
     *
     * @return void
     */
    public function test_index_route(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * Test cash source route
     *
     * @return void
     */
    public function test_cash_source_route(): void
    {
        $response = $this->get('cash');

        $response->assertStatus(200);
    }

    /**
     * Test credit card route
     *
     * @return void
     */
    public function test_credit_card_route(): void
    {
        $response = $this->get('credit_card');

        $response->assertStatus(200);
    }

    /**
     * Test bank transfer route
     *
     * @return void
     */
    public function test_bank_transfer_route(): void
    {
        $response = $this->get('bank_transfer');

        $response->assertStatus(200);
    }

    /**
     * Test store route
     *
     * @return void
     */
    public function test_store_route(): void
    {
        $response = $this->get('store');

        $response->assertStatus(405);
    }

}
