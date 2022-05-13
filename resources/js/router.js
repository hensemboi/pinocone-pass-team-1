import { createRouter, createWebHistory } from "vue-router";
import Homepage from "./views/Homepage.vue";
import Navbar from "./components/navbar/Navbar.vue";
import Footer from "./components/UI/TheFooter.vue";
import Login from "./views/Login.vue";
import Register from "./views/Register.vue";
import Dashboard from "./views/Dashboard.vue";
import ProductsList from "./components/pages/ProductsList.vue";
import ProductsListing from "./views/admin/ProductsListing.vue";
import UserCart from "./components/pages/UserCart.vue";
import UserProfile from "./components/pages/UserProfilePage.vue";
import AdminSideBar from "./components/admin/AdminSideBar.vue";
import AdminTopBar from "./components/admin/AdminTopBar.vue";
import Exchange from "./components/payment/Exchange.vue";
import Checkout from "./components/cart/Checkout.vue";
import Pending from "./views/Pending.vue";
import PIN from "./components/payment/PIN.vue";
import Pinopay from "./components/payment/Pinopay.vue";
import Success from "./components/payment/Success.vue";
import Error from "./components/payment/Error.vue";
import NotFound from "./components/NotFound.vue";
import Store from "./components/store/index.js";
import Menu from "./components/menu/Menu.vue"
import RequestsList from "./components/request_dashboard/RequestsList.vue";
import Tables from "./components/datatables/DataTables.vue"
import MenuCard from "./components/cards/MenuCard.vue"

const router = createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: "/",
            redirect: "/home",
        },
        {
            path: "/home",
            components: {
                default: Homepage,
                footer: Footer,
                navbar: Navbar,
            },
        },
        {
            path: "/login",
            components: {
                default: Login,
            },
        },
        {
            path: "/register",
            components: {
                default: Register,
            },
        },
        {
            path: "/userprofile",
            components: {
                default: UserProfile,
                navbar: Navbar,
                footer: Footer,
            },
        },
        {
            name: "marketplace",
            path: "/marketplace",
            components: {
                default: ProductsList,
                footer: Footer,
                navbar: Navbar,
            },
        },
        {
            path: "/cart",
            components: {
                default: UserCart,
                footer: Footer,
                navbar: Navbar,
            },
        },
        {
            path: "/dashboard",
            components: {
                default: Dashboard,
                topbar: AdminTopBar,
                sidebar: AdminSideBar,
            },
        },
        {
            path: "/menu",
            components: {
                default: RequestsList,
            },
        },
        {
            path: "/usersrequests",
            components: {
                default: RequestsList,
            },
        },
        {
            path: "/productslisting",
            components: {
                default: Menu,
                footer: Footer,
                navbar: Navbar,
            },
        },
        {
            path:"/products",
            components:{
                default: ProductsListing,
                table: Tables,
                menuCard: MenuCard,
                topbar: AdminTopBar,
                sidebar: AdminSideBar,
            },
        },
        {
            path: "/exchange",
            components: {
                default: Exchange,
                footer: Footer,
                navbar: Navbar,
            },
        },
        {
            path: "/checkout",
            components: {
                default: Checkout,
                footer: Footer,
                navbar: Navbar,
            },
        },
        {
            path: "/pin",
            components: {
                default: PIN,
                footer: Footer,
                navbar: Navbar,
            },
        },
        {
            path: "/pending",
            components: {
                default: Pending,
            },
        },
        {
            path: "/pinopay",
            components: {
                default: Pinopay,
                footer: Footer,
                navbar: Navbar,
            },
        },
        {
            path: "/success",
            components: {
                default: Success,
                footer: Footer,
                navbar: Navbar,
            },
        },
        {
            path: "/error",
            components: {
                default: Error,
                footer: Footer,
                navbar: Navbar,
            },
        },
        {
            path: "/:notFound(.*)",
            components: {
                default: NotFound,
            },
        },
    ],
});

router.beforeEach((to, from, next) => {
    if (to.matched.some((record) => record.meta.requiresAuth)) {
        if (Store.getters["auth/getAuthenticated"]) {
            next();
            return;
        }
        next("/");
    } else {
        next();
    }
});

// Sample of admin authentication
//   const routes = [{
//     path: '/',
//     name: 'Login',
//     component: () => {
//       return import('@/views/auth/vLoginLandingPage')
//     }
//   },
//   {
//     path: '/announcements',
//     name: 'Announcements',
//     beforeEnter: checkAdminRights
//     component: () => {
//       return import('@/views/drawer/announcement/vAnnouncementLandingPage')
//     },

//   }
// ]

// function checkAdminRights(to, from, next) {
//     // check if the user is admin
//     if(userIsAdmin) {
//         next({ path: '/adminroute'});
//     } else {
//         next({ path: '/nonadminroute'});
//     }
// }

export default router;
