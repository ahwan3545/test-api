<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_number',
        'verified_at',
        'language_id',
        'branch_id',
        'created_by_id',
        'created_from',
    ];

    public function language()
    {
        return $this->belongsTo(Language::class, 'language_id')->select('id', 'name', 'code', 'dir');
    }

    public function details()
    {
        return $this->hasOne(CustomerDetail::class, 'customer_id')
            ->select([
                'id', 'customer_id', 'gender', 'birth_date', 'address', 'country_id', 'city_id'
            ]);
    }

    public function scopeTableSelect($query)
    {
        $query->select('id', 'name', 'email', 'phone_number');
    }

    public function scopeTableRelation($query)
    {
        $query->with('details');
    }
}
