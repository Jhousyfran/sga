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
            window.$provider = payload;
            cookie.set('provider_data', payload);
            cookie.set('provider_token', payload.token);
            state.provider = payload;
            window.axios.defaults.headers.common['USER-TOKEN'] = payload.token;
        },
        setProvider(state, payload) {
            window.$provider = payload;
            cookie.set('provider_data', payload);
            state.provider = payload;
        }
    },

    actions: {
        async create({ commit }, payload) {
            try {
                let response = false;
                if (payload.id) {
                    response = await window.axios.put('/fornecedores/' + payload.id, payload);
                    commit('setProvider', response.data);
                } else {
                    response = await window.axios.post('/fornecedores', payload);
                }
                return response;
            } catch (error) {
                if (error.response.status == 403) {
                    window.$provider = '';
                    window.location = '/#/login'
                }
                return error.response;
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