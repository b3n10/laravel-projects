<?php

namespace App\Models\Chat;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Message extends Model
{
	protected $fillable = [
		'body'
	];

	/*
	 * append value to requested query and return to response
	 * but not add to db
	 */
	protected $appends = [
		'ownMsg',
		'testMe'
	];

	/*
	 * value of $appends is 'true' or 'false'
	 * which this method will return
	 */
	public function getOwnMsgAttribute() {
		return $this->user_id === auth()->user()->id;
	}

	public function getTestMeAttribute() {
		return 'this is test';
	}

	public function user() {
		return $this->belongsTo(User::class);
	}
}
