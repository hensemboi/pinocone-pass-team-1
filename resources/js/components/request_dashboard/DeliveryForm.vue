<template>
    <base-dialog
        title="Order Created Successfully!"
        @close="redirect"
        v-if="showDialog"
    >
        <section>
            <p>Press the close button to return to the request dashboard.</p>
        </section>
    </base-dialog>
    <form @submit.prevent="submitForm">
        <div class="form-control">
            <iframe
                width="900"
                height="450"
                style="border: 0"
                loading="lazy"
                allowfullscreen
                referrerpolicy="no-referrer-when-downgrade"
                src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCczmO_4fX6K20-i2qRXyJy-u-rjU_oReY&q=Space+Needle,Seattle+WA"
            >
            </iframe>
        </div>
        <div class="form-control" :class="{ invalid: !address.isValid }">
            <label for="address">Address</label>
            <input
                type="text"
                id="address"
                v-model.trim="address.value"
                @blur="clearValidity('address')"
            />
        </div>
        <p v-if="!address.isValid">Address must not be empty</p>
        <div class="form-control" :class="{ invalid: !description.isValid }">
            <label for="description">Description</label>
            <textarea
                type="text"
                id="description"
                rows="5"
                v-model.trim="description.value"
                @blur="clearValidity('description')"
            />
        </div>
        <p v-if="!description.isValid">Description must not be empty</p>

        <div class="form-control" :class="{ invalid: !dateTime.isValid }">
            <label for="dateTime">Delivery date and time</label>
            <input
                type="datetime-local"
                id="dateTime"
                v-model="dateTime.value"
                @blur="clearValidity('dateTime')"
            />
        </div>
        <p v-if="!dateTime.isValid">Date or time must not be empty</p>

        <div class="form-control" :class="{ invalid: !areas.isValid }">
            <h3>Additional Requests</h3>
            <div>
                <input
                    type="checkbox"
                    id="cutlery"
                    value="cutlery"
                    v-model="areas.value"
                    @blur="clearValidity('areas')"
                />
                <label for="cutlery">No cutlery</label>
            </div>
            <div>
                <input
                    type="checkbox"
                    id="contactless"
                    value="contactless"
                    v-model="areas.value"
                    @blur="clearValidity('areas')"
                />
                <label for="contactless">Contactless delievery</label>
            </div>
            <div>
                <input
                    type="checkbox"
                    id="doorstep"
                    value="doorstep"
                    v-model="areas.value"
                    @blur="clearValidity('areas')"
                />
                <label for="doorstep">Doorstep delivery</label>
            </div>
        </div>
        <p v-if="!areas.isValid">At least one area of experties is selected</p>
        <p v-if="!formIsValid">Please fix the above errors and submit again</p>
        <base-button>Register</base-button>
    </form>
</template>

<script>
export default {
    emits: ["save-data"],
    data() {
        return {
            address: {
                value: "",
                isValid: true,
            },
            description: {
                value: "",
                isValid: true,
            },
            dateTime: {
                value: null,
                isValid: true,
            },
            areas: {
                value: [],
                isValid: true,
            },
            formIsValid: true,
            showDialog: false,
        };
    },
    methods: {
        validateForm() {
            this.formIsValid = true;
            if (this.address.value === "") {
                this.address.isValid = false;
                this.formIsValid = false;
            }
            if (this.description.value === "") {
                this.description.isValid = false;
                this.formIsValid = false;
            }
            if (this.dateTime.value == null) {
                this.dateTime.isValid = false;
                this.formIsValid = false;
            }
            if (this.areas.value.length === 0) {
                this.areas.isValid = false;
                this.formIsValid = false;
            }
        },
        clearValidity(input) {
            this[input].isValid = true;
        },
        submitForm() {
            this.validateForm();
            if (!this.formIsValid) {
                return;
            }
            const formData = {
                desc: this.description.value,
                address: this.address.value,
                dateTime: this.dateTime.value,
                areas: this.areas.value,
            };
            this.showDialog = true;
            this.$emit("save-data", formData);
        },
        redirect() {
            setTimeout(() => {
                this.$router.replace("/orderdashboard");
            }, 300);
        },
    },
};
</script>

<style scoped>
.form-control {
    margin: 0.5rem 0;
}

label {
    font-weight: bold;
    display: block;
    margin-bottom: 0.5rem;
}

input[type="checkbox"] + label {
    font-weight: normal;
    display: inline;
    margin: 0 0 0 0.5rem;
}

input,
textarea {
    display: block;
    width: 100%;
    border: 1px solid #ccc;
    font: inherit;
}

input:focus,
textarea:focus {
    background-color: #f0e6fd;
    outline: none;
    border-color: #3d008d;
}

input[type="checkbox"] {
    display: inline;
    width: auto;
    border: none;
}

input[type="checkbox"]:focus {
    outline: #3d008d solid 1px;
}

h3 {
    margin: 0.5rem 0;
    font-size: 1rem;
}

.invalid label {
    color: red;
}

.invalid input,
.invalid textarea {
    border: 1px solid red;
}
</style>
