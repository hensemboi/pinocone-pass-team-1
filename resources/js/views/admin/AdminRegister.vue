<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Admin Register</div>
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
import ValidationErrors from "../../components/ValidationErrors.vue";
export default {
    components: {
        ValidationErrors,
    },
    data() {
        return {
            form: {
                'username' : '',
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
                .post(rootURL + "/aregister", {
                    ...this.form,
                })
                .then((response) => {
                    this.$router.push("/dashboard");
                })
                .catch(error => {
                    console.log(error.response)
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
