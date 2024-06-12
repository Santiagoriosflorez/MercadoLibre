<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,SoftDeletes;
    protected $fillable = [
        'name',
		'last_name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

	protected $casts = [
		'created_at' => 'datetime:Y-m-d',
		'updated_at' => 'datetime:Y-m-d'
	];

	public function setPasswordAttribute($value)
	{
		$this->attributes['password'] = bcrypt($value);
	}

	public function setRememberTokenAttribute()
	{
		$this->attributes['remember_token'] =  Str::random(30);
	}



    public function trolley()
	{
		return $this->hasOne(Trolley::class, 'user_id', 'id');
	}
}
