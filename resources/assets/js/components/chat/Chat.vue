<template>
	<div class="chat">
		<chat-messages></chat-messages>
		<form action="" class="chat__form">
			<textarea
				id="body"
				cols="30"
				rows="4"
				class="chat__form-input"
				v-model="body"
				@keydown="handleMessageInput"
				autofocus>
			</textarea>
			<span class="chat__form-helptext">
				Hit enter to send or SHIFT + enter to go next line
			</span>
		</form>
	</div>
</template>

<script>
import Bus from '../../bus';

export default {
	data() {
		return {
			body: null,
			bodyBackedUp: null
		}
	},
	methods: {
		handleMessageInput(e) {
			this.bodyBackedUp = this.body;

			if (e.keyCode === 13 && !e.shiftKey) {
				e.preventDefault();
				this.send()
			}
		},
		fixTime(time) {
			if (time < 10) return '0' + time;
			return time;
		},
		fixMonth(month) {
			if (month + 1 < 10) return '0' + (month + 1);
			return month + 1;
		},
		tempMsg() {
			const date = new Date();

			return {
				id: Date.now(),
				body: this.body,
				created_at:
					date.getUTCFullYear() +
					'-' +
					this.fixMonth(date.getUTCMonth()) +
					'-' +
					date.getUTCDate() +
					' ' +
					this.fixTime(date.getHours()) +
					':' +
					this.fixTime(date.getMinutes()) +
					':' +
					this.fixTime(date.getSeconds()),
				ownMsg: true,
				user: {
					name: Laravel.user.name
				}
			}
		},
		send() {
			if (!this.body || this.body.trim() === '') return;

			let tempMessage = this.tempMsg();
			Bus.$emit('add-message', tempMessage);

			axios.post('/chat/message', {
				messageBody: this.body.trim()
			}).catch(() => {
				this.body = this.bodyBackedUp;
				Bus.$emit('fail-message', tempMessage);
			});

			this.body = null;
		}
	}
}
</script>

<style lang="scss">
$bpc: 1px solid #d3e0e9;

.chat {
	background-color: #fff;
	border: $bpc;
	border-radius: 3px;

	&__form {
		border-top: $bpc;
		padding: 10px;

		&-input {
			width: 100%;
			border: $bpc;
			padding: 5px 10px;
			outline: none;
		}

		&-helptext {
			color: #aaa;
		}
	}
}
</style>
