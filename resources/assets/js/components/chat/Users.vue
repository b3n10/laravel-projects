<template>
	<div class="users">
		<div class="users__header">1 user online</div>
		<div class="users__user">
			<a href="#">{{ username }}</a>
		</div>
	</div>
</template>

<script>
export default {
	data() {
		return {
			username: Laravel.user.name
		}
	}
}
</script>

<style lang="scss">
$bpc: 1px solid #d3e0e9;

.users {
	background-color: #fff;
	border: $bpc;
	border-radius: 3px;

	&__header {
		padding: 15px;
		font-weight: 800;
		margin: 0;
	}

	&__user {
		padding: 0 15px;

		&:last-child {
			padding-bottom: 15px;
		}
	}
}
</style>
