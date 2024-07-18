<script>
import { usePage } from '@inertiajs/vue3';
export default {
	name: 'TopAddressBar',
	setup() {
		const { auth } = usePage().props;
		return { auth };
	},
}
</script>

<template>

	<div class="bg-white">
		<div class=" flex justify-between items-center py-4 px-36">
			<div class="space-x-4">
				<span class="text-xl font-bold">support@bazaar.com</span>
				<span class="text-xl font-bold">|</span>
				<span class="text-xl font-bold">Virtual University, Lahore, PK</span>
			</div>
			<div class="flex items-center space-x-4">
				<div class="relative inline-block">
					<template v-if="auth.user.role_name == 'super-admin'">
					  <a :href="route('dashboard')" class="text-xl font-bold">Dashboard</a>
					</template>
					<template v-else-if="auth.user.role_name == 'register_user'">
						<p>Register User</p>
					</template>
					<template v-else-if="auth.user.role_name == 'seller'">
					<a :href="route('dashboard')" class="text-xl font-bold">Seller</a>
					</template>
					<template v-else>
					  <a :href="route('register')" class="text-xl font-bold">Register</a>
					  &nbsp;|&nbsp;
					  <a :href="route('login')" class="text-xl font-bold">Login</a>
					</template>
				</div>
			</div>
		</div>
	</div>
</template>