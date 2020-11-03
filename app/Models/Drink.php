<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Drink
 * @package App\Models
 * @mixin Eloquent
 * @property int $id
 * @property string $name
 * @property float $abv
 * @property int $volume
 * @property-read Collection|Bar[] $bar
 */
class Drink extends Model
{
    protected $table = 'drink';

    public function bars()
    {
        return $this->hasManyThrough(Bar::class, Stock::class);
    }
}
