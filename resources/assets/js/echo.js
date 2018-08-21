import Bus from './bus';

Echo.join('chat')
	.here(users => {
		Bus.$emit('users.here', users)
	})
	.joining(user => {
		Bus.$emit('users.joined', user)
	})
	.leaving(user => {
		Bus.$emit('users.left', user)
	})
	// Chat.MessageCreated is the folder namespace of the event
	.listen('Chat.MessageCreated', e => {
		Bus.$emit('add-message', e.message)
	});
