<template>
    <div>
        <section>
            <base-card>
                <header>
                    <h2>Summary</h2>
                </header>
                <h4>Transaction ID : 1001</h4>
                <h4>User ID : 1001</h4>
                <h4>Ordered Menu : Burgah</h4>
            </base-card>
        </section>
        <section>
            <base-card>
                <header>
                    <h2>Payment</h2>
                </header>
                <h4>Voucher ID : 1001</h4>
                <h4>Payment Type : 1001</h4>
                <h4>Date Time : 20/3/2001</h4>
            </base-card>
        </section>
        <section>
            <base-card>
                <header>
                    <h2>Extra note</h2>
                </header>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                    do eiusmod tempor incididunt ut labore et dolore magna
                    aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                    ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    Duis aute irure dolor in reprehenderit in voluptate velit
                    esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
                    occaecat cupidatat non proident, sunt in culpa qui officia
                    deserunt mollit anim id est laborum.
                </p>
                <base-button>Do something</base-button>
                <base-button>Do something</base-button>
            </base-card>
        </section>
    </div>
</template>

<style scoped>
header {
    background-color: #3a0061;
    color: white;
    width: 100%;
    padding: 1rem;
}
header h2 {
    margin: 0;
}
section {
    padding: 1rem;
}

p {
    padding: 1rem;
}
</style>
