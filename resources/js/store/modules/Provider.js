export default {
    namespaced: true,

    state: {
        provider: {}
    },

    getters: {
        provider: state => state.provider
    },

    mutations: {
        setLogin() {

        }
    },

    actions: {
        async create({ commit }, payload) {
            try {
                let response = await window.axios.post('/fornecedores', payload);
                return response.data;
                // commit('setLogin')
            } catch (error) {
                return error.response.data;
            }
        }
    }
}