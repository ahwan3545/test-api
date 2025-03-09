<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_number',
        'language_id',
        'branch_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function details()
    {
        return $this->hasOne(UserDetail::class)->select(['id', 'user_id', 'gender', 'birth_date', 'address', 'country_id', 'city_id']);
    }

    // Relations
    public function configuration()
    {
        return $this->hasOne(Configuration::class, 'user_id')->withDefault([
            'sidebar_color' => null,
            'sidenav_type' => 'bg-white',
            'navbar_fixed' => false,
            'dark_mod' => false,
        ]);
    }

    public function language()
    {
        return $this->belongsTo(Language::class, 'language_id')->select('id', 'name', 'code', 'image', 'dir');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id')->select([
            'id',
            'name',
            'email',
            'phone_number',
            'is_main',
            'logo',
            'address',
            'website',
            'description',
        ]);
    }

    public function scopeTableSelect($query)
    {
        $query->select('id', 'name', 'email', 'phone_number');
    }

    public function scopeTableRelation($query)
    {
        $query->with('roles');
    }
}
