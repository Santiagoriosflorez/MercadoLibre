<?php

namespace App\Models;

use App\Models\shopping_cart;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Trolley extends Model
{
    use HasFactory,SoftDeletes;
	protected $fillable=[
        'user_id'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'user_id', 'id');
	}

	public function shopping_cart()
	{
		return $this->hasMany(shopping_cart::class, 'trolley_id','id');
	}
}
