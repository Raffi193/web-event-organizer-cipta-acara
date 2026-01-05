<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Decoration extends Model
{
    // mass assignment
    protected $guarded = [ 'id' ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    // relationships
    public function pricelists() : HasMany
    {
        return $this->hasMany(Pricelist::class);
    }
}
