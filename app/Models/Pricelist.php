<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pricelist extends Model
{
    // mass assigment
    protected $guarded = ['id'];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    // relationship
    public function photographer() : BelongsTo
    {
        return $this->belongsTo(Photographer::class);
    }
    public function decoration() : BelongsTo
    {
        return $this->belongsTo(Decoration::class);
    }
    public function mc() : BelongsTo
    {
        return $this->belongsTo(MasterOfCeremony::class, 'master_of_ceremony_id');
    }

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }


}
