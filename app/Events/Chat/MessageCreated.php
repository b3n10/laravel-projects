<?php

namespace App\Events\Chat;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

use App\Models\Chat\Message;

class MessageCreated implements ShouldBroadcast
{
	public $message;

	use Dispatchable, InteractsWithSockets, SerializesModels;

	/**
	 * Create a new event instance.
	 *
	 * @return void
	 */
	public function __construct(Message $message)
	{
		$this->message = $message;
	}

	public function broadcastWith() {
		// load the relation to the current 'user'
		$this->message->load('user');

		return [
			'message'	=> array_merge($this->message->toArray(), [
				'ownMsg'	=>	false // send ownMsg as false to other subscribers on the channel
			])
		];
	}

	/**
	 * Get the channels the event should broadcast on.
	 *
	 * @return \Illuminate\Broadcasting\Channel|array
	 */
	public function broadcastOn()
	{
		// PresenceChannel is from Pusher to 'expose the additional feature of an awareness of who is subscribed to that channel'
		// https://pusher.com/docs/client_api_guide/client_presence_channels
		// broadcast in 'chat' channel (routes/channel.php)
		return new PresenceChannel('chat');
	}
}
