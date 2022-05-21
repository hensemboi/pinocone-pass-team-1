<template>
    <div v-if="validationErrors">
        <ul class="alert alert-danger">
            <li v-for="value in validationErrors">
                <div v-if="value ==='The password format is invalid.'">
                    The password must have an uppercase letter, a lowercase letter, and a number.
                </div>
                <div v-else>
                    {{ value }}
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        props: ['errors'],
        computed: {
            validationErrors(){
                let errors = Object.values(this.errors);
                errors = errors.flat();
                return errors;
            }
        }
    }
</script>
