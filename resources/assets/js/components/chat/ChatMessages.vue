<template>
	<div class="chat__messages">
		<chat-message
			v-for="msg in msgs"
			:key="msg.id"
			:msg="msg">
		</chat-message>
	</div>
</template>

<script>
export default {
	data() {
		return {
			msgs: []
		}
	},
	mounted() {
		axios.get('/chat/message').then((response) => {
			this.msgs = response.data
		});
	}
}
</script>

<style lang="scss">
.chat {
	&__messages {
		height: 400px;
		max-height: 400px;
		overflow-y: scroll;
	}
}
</style>
