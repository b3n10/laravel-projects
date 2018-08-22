<?php

namespace App\Http\Controllers;

class ClientController extends Controller
{
	public function index() {
		return view('client.index');
	}

	public function newClient() {

	}

	public function create() {

	}

	public function show( $id ) {
		return __METHOD__ . ':' . $id;
	}

	public function modify( $id ) {
	}
}
