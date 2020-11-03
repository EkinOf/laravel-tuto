<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Bar
 * @package App\Models
 * @mixin Eloquent
 * @property int $id
 * @property string $name
 * @property string $location
 * @property-read Collection|Drink[] $drinks
 * @property-read Collection|Stock[] $stocks
 */
class Bar extends Model
{
    protected $table = 'bar';

    public function drinks()
    {
        return $this->hasManyThrough(Drink::class, Stock::class);
    }

    public function stocks()
    {
        return $this->hasMany(Stock::class);
    }
}
