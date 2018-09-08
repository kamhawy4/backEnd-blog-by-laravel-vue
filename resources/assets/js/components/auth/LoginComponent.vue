<template>
    <div class="text-center form-wrapper">

        <form class="form-signin" v-on:submit.prevent="submitLogin">
            <img class="mb-4" src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
            <h1 class="h5"  v-if="errors" style="color:red">Make sure your password and email address</h1>
            <label for="inputEmail" class="sr-only">Email address</label>
            <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus v-model="email">

            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" class="form-control" placeholder="Password" required v-model="password">

            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        </form>

    </div>
</template>

<script>
    import store from '../../store'
    export default {
        data() {
            return {
                email: '',
                password: '',
                loginError: false,
                errors:false,
            }
        },
        methods: {
            submitLogin() {
                this.loginError = false;
                this.$http.post('/api/login', {email: this.email,password: this.password}).then(response => {
                    console.log(response.data.data_token.name);
                    store.commit('loginUser')
                    localStorage.setItem('authCheck', JSON.stringify(true));
                    localStorage.setItem('token', response.data.access_token)
                    localStorage.setItem('username', response.data.data_token.name)
                    localStorage.setItem('id_username', response.data.data_token.id)
                    localStorage.setItem('email_username', response.data.data_token.email)
                    this.errors      = '';
                    this.$router.push({ name: 'dashboard' })
                }).catch(response => {
                    if(response.status == 401){
                        this.errors = true;
                     }
                    this.loginError = true
                });
            }
        }
    }
</script>


<style scoped>
    .form-wrapper {
        min-height: 100%;
        min-height: 100vh;
        display: flex;
        align-items: center;
    }
    .form-signin {
        width: 100%;
        max-width: 330px;
        padding: 15px;
        margin: 0 auto;
    }
    .form-signin .form-control {
        position: relative;
        box-sizing: border-box;
        height: auto;
        padding: 10px;
        font-size: 16px;
    }
    .form-signin .form-control:focus {
        z-index: 2;
    }
    .form-signin input[type="email"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
    }
    .form-signin input[type="password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
    }
</style>