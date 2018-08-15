<?php

namespace App\Models\Chat;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
	protected $fillable = [
		'body'
	];

	/*
	 * append a value in the JSON of this model
	 * */
	protected $appends = [
		'ownMsg'
	];

	/*
	 * value of $appends is 'true' or 'false'
	 * which this method will return
	 */
	public function getOwnMsgAttribute() {
		return $this->user_id === auth()->user()->id;
	}

	public function user() {
		return $this->belongsTo(User::class);
	}
}
