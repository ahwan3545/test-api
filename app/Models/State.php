<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class State extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable = [
        'name',
        'country_id',
        'created_by_id',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id')->select('id', 'name');
    }

    public function cities()
    {
        return $this->hasMany(City::class, 'state_id')->select('id', 'name', 'country_id', 'state_id');
    }

    public function scopeTableSelect($query)
    {
        $query->select('id', 'name', 'country_id');
    }

    public function scopeTableRelation($query)
    {
        $query->with(['country']);
    }

}
