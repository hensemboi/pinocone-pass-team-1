<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Register</div>
                    <div class="card-body">
                        <form method="POST" @submit.prevent="onSubmit">
                            <validation-errors :errors="validationErrors" v-if="validationErrors"></validation-errors>
                            <div class="row mb-3">
                                <label for="username" class="col-md-4 col-form-label text-md-end">Username</label>

                                <div class="col-md-6">
                                    <input id="username" type="text" class="form-control" v-model="form.username" name="username" required autocomplete="username" autofocus>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="firstName" class="col-md-4 col-form-label text-md-end">First Name</label>

                                <div class="col-md-6">
                                    <input id="firstName" type="text" class="form-control" v-model="form.firstName" name="firstName" required autocomplete="firstName" autofocus>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="lastName" class="col-md-4 col-form-label text-md-end">Last Name</label>

                                <div class="col-md-6">
                                    <input id="lastName" type="text" class="form-control" v-model="form.lastName" name="lastName" required autocomplete="lastName" autofocus/>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="dateOfBirth" class="col-md-4 col-form-label text-md-end">Date of Birth</label>

                                <div class="col-md-6">
                                    <input id="dateOfBirth" type="date" class="form-control" v-model="form.dateOfBirth" name="dateOfBirth" required autocomplete="dateOfBirth" autofocus/>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">Email</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" v-model="form.email" name="email" required autocomplete="email"/>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" v-model="form.password" name="password" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">Confirm Password</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" v-model="form.password_confirmation" name="password_confirmation" required autocomplete="new-password">
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
import ValidationErrors from "../components/ValidationErrors.vue";
export default {
    components: {
        ValidationErrors,
    },
    data() {
        return {
            form: {
                'username' : '',
                'firstName' : '',
                'lastName' : '',
                'dateOfBirth' : '',
                'email' : '',
                'password' : '',
                'password_confirmation' : '',
            },
            validationErrors : '',
        }
    },
    methods: {
        onSubmit(event) {
            event.preventDefault();
            const rootURL = window.location.origin;
            axios.get(rootURL + "/sanctum/csrf-cookie").then(() => {
                axios
                .post(rootURL + "/register", {
                    ...this.form,
                })
                .then((response) => {
                    this.$router.push("/home");
                })
                .catch(error => {
                    if (error.response.status == 422) {
                        this.validationErrors = error.response.data.errors;
                    }
                });
            });
        },
    },
    // beforeRouteEnter(to, from, next) {
    //     if (window.Laravel.isLoggedin) {
    //         return next('dashboard');
    //     }
    //     next();
}
</script>
