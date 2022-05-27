<?php
namespace App\CustomClass;

/**
 * @package App\CustomClass
 */
interface Transaction
{
    /**
     * Validate Inputs
     */
    public function validate();
    /**
     * Return total amount
     */
    public function amount();
    /**
     * Return Inputs
     */
    public function inputs();
}
