<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'url', 'image', 'created_by_id'];

    public function getImageAttribute($value)
    {
        return $value ? asset($value) : null;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by_id')->select('id', 'name');
    }

    // Define the polymorphic relationship
    public function attachments()
    {
        return $this->morphMany(Attachment::class, 'attachable');
    }

    public function scopeTableSelect($query)
    {
        $query->select('id', 'name', 'image', 'url', 'created_by_id');
    }

    public function scopeTableRelation($query)
    {
        $query->with(['user']);
    }
}
