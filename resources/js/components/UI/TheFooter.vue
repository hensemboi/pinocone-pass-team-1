<template>
    <footer>
        <div class="container">
            <div class="footer-row">
                <div class="col-md-6">
                    <div class="footer-row">
                        <div class="col-md-6">
                            <div>
                                <img
                                    src="/images/logo.png"
                                    class="logo-footer"
                                />
                                <p>
                                    Jalan Tunku Abdul Rahman, 93100 Kuching,
                                    Sarawak
                                </p>
                            </div>
                        </div>

                        <div class="col-md-6 px-4">
                            <h6>About Company</h6>
                            <p>
                                Pinocone Catering Company of Sarawak is one of
                                the few catering companies that offers catering
                                services especially to schools and other
                                companies in the state.
                            </p>
                            <a href="#" class="btn-footer"> More Info </a><br />
                            <a href="#" class="btn-footer"> Contact Us</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="footer-row">
                        <div class="col-md-6 px-4">
                            <h6>Explore</h6>
                            <div class="footer-row">
                                <div class="col-md-6">
                                    <ul>
                                        <li><router-link to="/home">Home</router-link></li>
                                        <li><router-link to="/productslisting">Menu</router-link></li>
                                        <li><router-link to="/marketplace">Marketplace</router-link></li>
                                        <li><router-link to="/cart">Cart</router-link></li>
                                        <li><a href="#">Help</a></li>
                                        <li><a href="#">Contact</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <h6>Follow Us</h6>
                            <div class="social">
                                <router-link to="https://www.facebook.com/"><i class="fa fa-facebook" aria-hidden="true"></i></router-link>
                                <router-link to="https://www.instagram.com/?hl=en"><i class="fa fa-instagram" aria-hidden="true"></i></router-link>
                                <router-link to="https://twitter.com/?lang=en"><i class="fa fa-twitter" aria-hidden="true"></i></router-link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-bar">
            <div class="foot">
                <ul>
                    <li><a href="">©Copyright </a> |</li>
                    <li><a href="">Privacy Policy </a> |</li>
                    <li><a href="">Terms & Conditions</a></li>
                </ul>
            </div>
        </div>
    </footer>
</template>
