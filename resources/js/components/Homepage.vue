<template>
    <div id="Hero-Image-1">
        <img src="/images/hero-1.jpeg" alt="hero-1.jpeg" style="width: 100%" />
        <div id="Hero-Text">
            <h1>We are here to help</h1>
            <p>We can offer you very good deals on a frequent basis.</p>
            <button class="btn-body">Check our full menu listing</button>
        </div>
    </div>

    <div>
        <div id="About-Us">
            <div class="row">
                <div class="col-lg-7">
                    <img
                        class="about-us"
                        src="/images/about-us.jpeg"
                        alt="about-us.jpeg"
                    />
                </div>

                <div class="col-lg-5">
                    <div id="About-Text">
                        <h1>About Us</h1>
                        <p>
                            Pinocone Catering Company of Sarawak is one of the
                            few catering companies that offers catering services
                            especially to schools and other companies in the
                            state.
                        </p>
                        <button class="btn-body">Learn more</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="Hero-Image-2">
        <img src="/images/hero-2.jpeg" alt="hero-2.jpeg" style="width: 100%" />
        <div id="Hero-Text-2">
            <h1>JOIN US AND GET DISCOUNTS UP TO 50%</h1>
            <button class="btn-body">SIGN UP NOW</button>
        </div>
    </div>

    <div id="Order-Steps">
        <h1 id="Order-Heading">Order in 4 Simple Steps</h1>
        <div class="responsive">
            <div class="gallery">
                <img
                    src="/images/step1.png"
                    alt="step1.png"
                    width="600"
                    height="400"
                />
            </div>
        </div>

        <div class="responsive">
            <div class="gallery">
                <img
                    src="/images/step2.png"
                    alt="step2.png"
                    width="600"
                    height="400"
                />
            </div>
        </div>

        <div class="responsive">
            <div class="gallery">
                <img
                    src="/images/step3.png"
                    alt="step3.png"
                    width="600"
                    height="400"
                />
            </div>
        </div>

        <div class="responsive">
            <div class="gallery">
                <img
                    src="/images/step4.png"
                    alt="step4.png"
                    width="600"
                    height="400"
                />
            </div>
        </div>
    </div>

    <h1 id="Recommended-Menus">Recommendation Menus</h1>
    <div class="row">
        <recommended-menu menu="1"></recommended-menu>
        <recommended-menu menu="2"></recommended-menu>
        <recommended-menu menu="3"></recommended-menu>
    </div>

    <div class="row">
        <recommended-menu menu="4"></recommended-menu>
        <recommended-menu menu="5"></recommended-menu>
        <recommended-menu menu="6"></recommended-menu>
    </div>
</template>

<script>
import RecommendedMenu from "./RecommendedMenu.vue";
export default {
    components: {
        "recommended-menu": RecommendedMenu,
    },
    data() {
        return {
            randomData: null,
        };
    },
};
</script>
