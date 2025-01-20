<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StatusType extends Model
{
    use HasFactory, softDeletes;

    protected $fillable = [
        'name',
        'color',
        'icon',
        'created_by_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by_id')->select('id', 'name');
    }

}
