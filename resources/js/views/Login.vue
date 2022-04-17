<template>
    <div class="d-flex flex-row justify-content-center align-items-center background">
        <div class="col-md-8 col-sm-10">
            <div class="form-background">
                <div class="login-logo text-center">
                    <img src="/images/logo.png" height="80px" width="80px" alt="logo">
                </div>
                <p class="login-box-msg text-center lead">
                    Recent Logins
                </p>
                <div class="d-flex flex-row justify-content-center align-items-center">
                    <div class="col-2 recent">
                        <img src="/images/t7.jpeg" height="80px" width="80px" alt="logo">
                        <p class="login-box-msg text-center lead">
                            john297
                        </p>
                    </div>
                    <div class="col-2 recent">
                        <img src="/images/t7.jpeg" height="80px" width="80px" alt="logo">
                        <p class="login-box-msg text-center lead">
                            prat863
                        </p>
                    </div>
                </div>
                <div class="d-flex flex-row justify-content-between align-items-center">
                    <span class="border"></span>
                    <p class="login-box-msg text-center lead">
                        OR
                    </p>
                    <span class="border"></span>
                </div>
                <form class="form">
                    <div class="form-row">
                        <div class="form-group col-6 has-feedback">
                            <div class="form-group">
                                <div>
                                    <input required type="username" class="form-control" id="username" placeholder="Username" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-6 has-feedback">
                            <div class="form-group">
                                <div>
                                    <input required type="password" class="form-control" id="password" placeholder="Password" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6"></div>
                        <div class="col-6">
                            <a href="#"> Forgot Password</a>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-6">
                            <button type="submit" class="btn btn-success float-right" >Sign in
                            </button>
                        </div>
                        <div class="col-6">
                            <button type="submit" class="btn btn-dark float-left" >Create New Account
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>