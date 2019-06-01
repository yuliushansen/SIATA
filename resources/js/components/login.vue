<template>
    <div>
        <div class="rounded mx-auto shadow p-3" style="margin-top:12rem; width: 32rem;">
            <form class="form-signin" autocomplete="off" @submit.prevent="login" method="post">
                <img class="mb-4" :src="'public/images/user.png'" style="margin-left: 7rem;" alt="" width="72" height="72">
                <h1 class="h3 text-danger text-center mb-3 font-weight-normal">(Employee Only)</h1>
                <h1 class="h3 text-center mb-3 font-weight-normal">Please sign in</h1>
                <label for="username" class="sr-only">username</label>
                <input type="username" id="username" class="form-control" v-model="username" placeholder="Usename" required autofocus>
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" id="password" class="form-control" v-model="password" placeholder="Password" required>
                <button id="signIn" class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                username:'',
                password:'',
                error: false, //auth edit
                state: false,
            }
            
        },
        methods:{
            //auth edit
            login(){
                var app = this
                this.$auth.login({
                params: {
                    username: app.username,
                    password: app.password
                }, 
                success: function () {
                    alert("Login Berhasil !!")
                    
                    
                },
                error: function () {
                    alert("Username dan Password tidak terdaftar")
                    this.state = true
                },
                rememberMe: true,
                redirect: '/dashboard',                    
                fetchUser: true,
                    
                
                });
                

            },
            //auth edit
        },
        mounted() {
        }
    }
</script>