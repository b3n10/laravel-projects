<?php

namespace App\Http\Controllers\Chat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
}
