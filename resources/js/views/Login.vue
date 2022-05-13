<template>
    <div class="d-flex flex-row justify-content-center align-items-center background">
        <div class="col-md-8 col-sm-10">
            <div class="form-background">
                <div class="login-logo text-center">
                    <img src="/images/logo.png" height="80px" width="80px" alt="logo.png">
                </div>

                <p class="login-box-msg text-center lead">
                    Login
                </p>

                <form class="form">
                    <div class="form-row">
                        <div class="form-group col-6 has-feedback">
                            <div class="form-group">
                                <div>
                                    <input required type="email" id="email" v-model="email" class="form-control" placeholder="Email" autofocus autocomplete="off"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-6 has-feedback">
                            <div class="form-group">
                                <div>
                                    <input required type="password" id="password" v-model="password" class="form-control" placeholder="Password" autofocus autocomplete="off"/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row my-3">
                        <div class="col-6">
                            <button type="submit" class="btn btn-success float-right" @click="handleSubmit">Sign in</button>
                        </div>
                        <div class="col-6">
                            <a href="/register" class="btn btn-dark float-left">Create New Account</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            email: "",
            password: "",
            error: null
        }
    },
    methods: {
        handleSubmit(e) {
            e.preventDefault()
            if (this.password.length > 0) {
                const rootURL = window.location.origin;
                axios.get(rootURL + "/sanctum/csrf-cookie").then(response => {
                    axios.post(rootURL + "/login", {
                        email: this.email,
                        password: this.password
                    })
                    .then((response) => {
                        this.$router.push("/home");
                    })
                    .catch(function (error) {
                        console.error(error);
                    });
                })
            }
        }
    },
    // beforeRouteEnter(to, from, next) {
    //     if (window.Laravel.isLoggedin) {
    //         return next('dashboard');
    //     }
    //     next();
    // }
}
</script>