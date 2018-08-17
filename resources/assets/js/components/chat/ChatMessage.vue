<template>
	<div class="chat__message" v-bind:class="{ 'chat__message-own': msg.ownMsg }">
		<strong class="chat__message-user">{{ msg.user.name }}</strong>
		<span class="chat__message-timestamp">{{ msg.created_at }}</span><span v-bind:class="[ msg.failMsg ? 'chat__message-error-show' : 'chat__message-error' ]"> - failed to send. Please try again!</span>
		<p class="chat__message-body">{{ msg.body }}</p>
	</div>
</template>

<script>
export default {
	// props will accept msg from ChatMessages.vue
	props: ['msg']
}
</script>

<style lang="scss">
.chat {
	&__message {
		padding: 15px;
		border-bottom: 1px solid #eee;

		&-own {
			background-color: #f0f0f0;
		}

		&-user {
			font-weight: 800;
		}

		&-timestamp {
			color: #aaa;
		}

		&-body {
			margin-bottom: 0;
			white-space: pre-wrap;
		}

		&-error {
			display: none;
		}

		&-error-show {
			display: inline;
			color: #dd1144;
		}
	}
}
</style>
