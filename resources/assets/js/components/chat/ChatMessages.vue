<template>
	<div class="chat__messages">
		<chat-message></chat-message>
	</div>
</template>

<style lang="scss">
.chat {
	&__messages {
		height: 400px;
		max-height: 400px;
		overflow-y: scroll;
	}
}
</style>
