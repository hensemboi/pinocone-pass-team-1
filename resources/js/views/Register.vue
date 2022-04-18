<template>
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Register</div>

                <div class="card-body">
                    <form method="POST" @submit.prevent="onSubmit">

                        <div class="row mb-3">
                            <label for="username" class="col-md-4 col-form-label text-md-end">Username</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control" v-model="form.username" :state="errors && !errors.username" name="username" required autocomplete="username" autofocus>

                                    <!-- <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span> -->
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="firstName" class="col-md-4 col-form-label text-md-end">First Name</label>

                            <div class="col-md-6">
                                <input id="firstName" type="text" class="form-control" v-model="form.firstName" :state="errors && !errors.firstName" name="firstName" required autocomplete="firstName" autofocus>

                                    <!-- <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span> -->
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="lastName" class="col-md-4 col-form-label text-md-end">Last Name</label>

                            <div class="col-md-6">
                                <input id="lastName" type="text" class="form-control" v-model="form.lastName" :state="errors && !errors.lastName" name="lastName" required autocomplete="lastName" autofocus/>

                                    <!-- <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span> -->
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="dateOfBirth" class="col-md-4 col-form-label text-md-end">Date of Birth</label>

                            <div class="col-md-6">
                                <input id="dateOfBirth" type="date" class="form-control" v-model="form.dateOfBirth" :state="errors && !errors.dateOfBirth" name="dateOfBirth" required autocomplete="dateOfBirth" autofocus/>

                                    <!-- <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span> -->
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" v-model="form.email" :state="errors && !errors.email" name="email" required autocomplete="email"/>
<!-- 
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror -->
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" v-model="form.password" :state="errors && !errors.password" name="password" required autocomplete="new-password">

                                <!-- @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror -->
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" v-model="form.password_confirmation" :state="errors && !errors.password" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default({
    
    setup() {
        
    },
    data(){
        return {
            form:{
                'username' : '',
                'firstName' : '',
                'lastName' : '',
                'dateOfBirth' : '',
                'email' : '',
                'password' : '',
            }
        }
    },
    methods:{
        // onSubmit(){
        //     if (this.password.length > 0) {
        //         axios.get('/sanctum/csrf-cookie').then(response => {
        //             axios.post('api/register', {
        //                 firstName: this.fname,
        //                 lastName: this.lastName,
        //                 email: this.email,
        //                 dob: this.dob,
        //                 password: this.password
        //             })
        //                 .then(response => {
        //                     if (response.data.success) {
        //                         window.location.href = "/login"
        //                     } else {
        //                         this.error = response.data.message
        //                     }
        //                 })
        //                 .catch(function (error) {
        //                     console.error(error);
        //                 });
        //         })
        //     }
        // }
        onSubmit(event) {
            event.preventDefault();
            const { default: axios } = require('axios');
            axios.get("http://localhost:8000/sanctum/csrf-cookie").then(() => {
                axios
                .post("/register", {
                    ...this.form,
                })
                .then(() => {
                    this.$router.push("/home");
                })
                .catch((err) => {
                    this.errors = err.response.data.errors;
                });
            });
        },
            // onsubmit () {
            //     this.form.post('api/register')
            //     .then(( response ) => { 
            //         var attr = document.getElementById("text");
            //         attr.innerHTML = response.data.message;  
            //         this.form.reset();
            //     })
            // },
    }
    // beforeRouteEnter(to, from, next) {
    //     if (window.Laravel.isLoggedin) {
    //         return next('dashboard');
    //     }
    //     next();
})
</script>
