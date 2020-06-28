import cookie from 'js-cookie';
let provider_data = false;
let provider_token = '';
if (cookie.get('provider_data') && cookie.get('provider_data') != undefined) provider_data = JSON.parse(cookie.get('provider_data'));
if (cookie.get('provider_token') && cookie.get('provider_token') != undefined) provider_token = cookie.get('provider_token');
window.axios.defaults.headers.common['USER-TOKEN'] = provider_token;
window.$provider = provider_data;

export default {
    namespaced: true,

    state: {
        provider: provider_data ? provider_data : {},
        token: provider_token ? provider_token : {}
    },

    getters: {
        provider: state => state.provider,
        token: state => state.token
    },

    mutations: {
        setLogin(state, payload) {
            cookie.set('provider_data', payload);
            cookie.set('provider_token', payload.token);
            state.provider = payload;
            window.axios.defaults.headers.common['USER-TOKEN'] = payload.token;
        }
    },

    actions: {
        async create({ commit }, payload) {
            try {
                let response = await window.axios.post('/fornecedores', payload);
                return response.data;
            } catch (error) {
                return error.response.data;
            }
        },

        async login({ commit }, payload) {
            try {
                let response = await window.axios.post('/login', payload);
                commit('setLogin', response.data);
                return response.data;
            } catch (error) {
                return error.response.data;
            }
        }
    }
}