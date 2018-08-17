<?php

namespace App\Http\Controllers\Chat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Chat\StoreMessageRequest;

use App\Models\Chat\Message;

class ChatMessageController extends Controller
{
	public function __construct() {
		$this->middleware('auth');
	}

	public function index() {
		$messages = Message::with('user')->limit(20)->latest()->get();
		return response()->json($messages, 200);
	}

	public function store(StoreMessageRequest $request) {
		// return response(null, 500);
		// user(): currect authenticated user
		// message(): user-message relationship to create() (or insert to db) a message with $request->messageBody
		$request->user()->message()->create([
			'body'	=>	$request->messageBody
		]);
	}
}
