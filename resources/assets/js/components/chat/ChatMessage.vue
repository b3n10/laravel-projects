<template>
	<div class="chat__message" v-bind:class="{ 'chat__message-own': msg.ownMsg }">
		<strong class="chat__msg-user">{{ msg.user.name }}</strong>
		<span class="chat__msg-timestamp">{{ msg.created_at }}</span>
		<p class="chat__msg-body">{{ msg.body }}</p>
	</div>
</template>

<script>
export default {
	// this will accept msg from ChatMessages.vue
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
	}
}
</style>
