<template>
	<div class="chat__messages" ref="message">
		<chat-message
			v-for="msg in msgs"
			:key="msg.id"
			:msg="msg">
		</chat-message>
	</div>
</template>

<script>
import Bus from '../../bus';

export default {
	data() {
		return {
			msgs: []
		}
	},
	methods: {
		removeMsg(id) {
			this.msgs = this.msgs.filter((msg) => msg.id !== id);
		}
	},
	mounted() {
		axios.get('/chat/message').then((response) => {
			this.msgs = response.data
		});

		Bus.$on('add-message', (data) => {
			// unshift appends at the beginning of msgs array
			this.msgs.unshift(data);
			data.ownMsg && (this.$refs.message.scrollTop = 0);
		}).$on('fail-message', (data) => {
			this.removeMsg(data.id);
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
