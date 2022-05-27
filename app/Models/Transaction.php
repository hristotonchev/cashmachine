<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @Transaction
 * @package App\Models
 *
 * Transaction Model
 */
class Transaction extends Model
{
    use HasFactory;

    /** @var string  */
    protected $table = 'transaction';

    /** @var string $primaryKey */
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'amount',
        'inputs',
    ];
}
