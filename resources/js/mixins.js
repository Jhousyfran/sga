import { mapGetters, mapMutations } from 'vuex'
import NotificaErrorForm from "./pages/Notifications/NotificationErrorForm";
import NotificationSuccessForm from "./pages/Notifications/NotificationSuccessForm";
import cookie from 'js-cookie'


export default {
    computed: {
        ...mapGetters({
            gProvider: 'Provider/provider'
        }),
    },
    methods: {
        notifyErrorForm() {
            this.$notify({
                component: NotificaErrorForm,
                icon: "ti-face-sad",
                horizontalAlign: 'right',
                verticalAlign: 'top',
                type: 'danger'
            });
        },
        notifySuccessForm() {
            this.$notify({
                component: NotificationSuccessForm,
                icon: "ti-face-smile",
                horizontalAlign: 'right',
                verticalAlign: 'top',
                type: 'success'
            });
        },
        logout() {
            cookie.set('provider_data', '');
            cookie.set('provider_token', '');
            window.axios.defaults.headers.common['USER-TOKEN'] = '';
            window.location = "/";
        }
    },
}