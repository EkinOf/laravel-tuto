<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Stock
 * @package App\Models
 * @mixin Eloquent
 * @property int $id
 * @property int $bar_id
 * @property int $drink_id
 * @property int $quantity
 * @property-read Bar $bar
 * @property-read Drink $drink
 */
class Stock extends Model
{
    protected $table = 'stock';

    public function bar()
    {
        return $this->belongsTo(Bar::class);
    }

    public function drink()
    {
        return $this->belongsTo(Drink::class);
    }
}
