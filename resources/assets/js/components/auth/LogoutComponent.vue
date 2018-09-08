<template>

</template>

<script>
    import store from '../../store'
    export default {

        mounted () {
        	store.commit('logoutUser');
			this.$router.push({ name: 'login' });
			this.submitLogout();
        },
        methods: {
            submitLogout() {
                 this.$http.post('/api/dashboard/logout').then(response => {
						localStorage.removeItem('authCheck');
						localStorage.removeItem('token');
                }).catch(error => {
                });
            }
        }
    }
</script>
<template>

</template>

