<template>
	<div class="chat">
		<chat-messages></chat-messages>
		<form action="" class="chat__form">
			<textarea
				id="body"
				cols="30"
				rows="4"
				class="chat__form-input">
			</textarea>
			<span class="chat__form-helptext">
				Hit enter to send or SHIFT + enter to go next line
			</span>
		</form>
	</div>
</template>

<script>
export default {
	//
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
