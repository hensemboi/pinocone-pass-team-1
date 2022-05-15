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
        <div class="form-control" :class="{ invalid: !firstName.isValid }">
            <label for="firstname">Driver Firstname</label>
            <input
                type="text"
                id="firstname"
                v-model.trim="firstName.value"
                @blur="clearValidity('firstName')"
            />
            <p v-if="!firstName.isValid">Firstname must not be empty</p>
        </div>
        <div class="form-control" :class="{ invalid: !lastName.isValid }">
            <label for="lastname">Driver Lastname</label>
            <input
                type="text"
                id="lastname"
                v-model.trim="lastName.value"
                @blur="clearValidity('lastName')"
            />
            <p v-if="!lastName.isValid">Lastname must not be empty</p>
        </div>
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
            <label for="address">Vendor Address</label>
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
        <div class="form-control" :class="{ invalid: !time.isValid }">
            <label for="time">Delivery time (Minutes)</label>
            <input
                type="number"
                id="time"
                v-model.number="time.value"
                @blur="clearValidity('time')"
            />
        </div>
        <p v-if="!description.isValid">time must be greate than zero</p>
        <div class="form-control" :class="{ invalid: !time.isValid }">
            <h3>Additional Requests</h3>
            <div>
                <input
                    type="checkbox"
                    id="cutlery"
                    value="cutlery"
                    v-model="areas.value"
                    @blur="clearValidity('areas')"
                />
                <label for="frontend">No cutlery</label>
            </div>
            <div>
                <input
                    type="checkbox"
                    id="contactless"
                    value="contactless"
                    v-model="areas.value"
                    @blur="clearValidity('areas')"
                />
                <label for="backend">Contactless delievery</label>
            </div>
            <div>
                <input
                    type="checkbox"
                    id="doorstep"
                    value="doorstep"
                    v-model="areas.value"
                    @blur="clearValidity('areas')"
                />
                <label for="career">Doorstep delivery</label>
            </div>
            <p v-if="!areas.isValid">
                At least one area of experties is selected
            </p>
        </div>
        <p v-if="!formIsValid">Please fix the above errors and submit again</p>
        <base-button>Register</base-button>
    </form>
</template>

<script>
export default {
    emits: ["save-data"],
    data() {
        return {
            firstName: {
                value: "",
                isValid: true,
            },
            address: {
                value: "",
                isValid: true,
            },
            lastName: {
                value: "",
                isValid: true,
            },
            description: {
                value: "",
                isValid: true,
            },
            time: {
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
            if (this.firstName.value === "") {
                this.firstName.isValid = false;
                this.formIsValid = false;
            }
            if (this.lastName.value === "") {
                this.lastName.isValid = false;
                this.formIsValid = false;
            }
            if (this.address.value === "") {
                this.address.isValid = false;
                this.formIsValid = false;
            }
            if (this.description.value === "") {
                this.description.isValid = false;
                this.formIsValid = false;
            }
            if (!this.time.value || this.time.value < 0) {
                this.time.isValid = false;
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
                first: this.firstName.value,
                last: this.lastName.value,
                desc: this.description.value,
                address: this.address.value,
                time: this.time.value,
                areas: this.areas.value,
            };
            console.log(formData);
            this.showDialog = true;
            this.$emit("save-data", formData);
        },
        redirect() {
            setTimeout(() => {
                this.$router.replace("/requestdashboard");
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
