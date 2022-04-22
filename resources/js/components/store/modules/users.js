export default {
    namespaced: true,
    state() {
        return {
            userName: "JohnDoe",
            firstName: "John",
            lastName: "Doe",
            userEmail: "example@gmail.com",
            phoneNumber: "0131023456",
            address: "No address",
            postcode: "12345",
            state: "Kuching",
            country: "Malaysia",
        };
    },
    mutations: {
        setUserName(state, payload) {},
        setUserEmail(state, payload) {},
        setPhoneNumber(state, payload) {},
        setAddress(state, payload) {},
        setPostCode(state, payload) {},
        setState(state, payload) {},
        setUserFirstName(state, payload) {},
        setUserLastName(state, payload) {},
    },
    actions: {
        setUserName(context, payload) {},
        setUserEmail(context, payload) {},
        setPhoneNumber(context, payload) {},
        setAddress(context, payload) {},
        setPostCode(context, payload) {},
        setState(context, payload) {},
        setUserFirstName(context, payload) {},
        setUserLastName(context, payload) {},
    },
    getters: {
        getUserName(state) {
            return state.userName;
        },
        getUserEmail(state) {
            return state.userEmail;
        },
        getUserPhoneNumber(state) {
            return state.phoneNumber;
        },
        getUserAddress(state) {
            return state.address;
        },
        getUserPostcode(state) {
            return state.postcode;
        },
        getUserState(state) {
            return state.state;
        },
        getUserFirstName(state) {
            return state.firstName;
        },
        getUserLastName(state) {
            return state.lastName;
        },
        getUserCountry(state) {
            return state.country;
        },
    },
};
