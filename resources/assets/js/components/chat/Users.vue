<template>
	<div class="users">
		<div class="users__header">{{ users.length }} {{ users.length === 1 ? 'user' : 'users' }} online</div>
		<div class="users__user" v-for="user in users">
			<a href="#">{{ user.name }}</a>
		</div>
	</div>
</template>

<script>
import Bus from '../../bus';

export default {
	data() {
		return {
			users: []
		}
	},
	mounted() {
		Bus.$on('users.here', users => {
			this.users = users;
		})
			.$on('users.joined', user => {
				this.users.push(user);
			})
			.$on('users.left', user => {
				this.users = this.users.filter(u => u.name !== user.name);
			});
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
