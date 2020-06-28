export default {
    namespaced: true,
    state: {
        products: [],
        product: {}
    },
    getters: {
        products: state => state.products,
        product: state => state.product,
    },
    mutations: {
        setProducts(state, payload) {
            state.products = payload;
        }
    },
    actions: {

        async create({ commit }, payload) {
            let last_url = payload.id ? "/" + payload.id : "";
            try {
                let response = await window.axios.post('/produtos' + last_url, payload);
                return response;
            } catch (error) {
                return error.response;
            }
        },

        async getAll({ commit }) {
            try {
                let response = await window.axios.get('/produtos')
                commit('setProducts', response.data);
            } catch (error) {

            }
        },

        async remove({ commit }, id) {
            try {
                let response = await window.axios.delete('/produtos/' + id);
                return response;
            } catch (error) {
                return error.response;
            }
        }
    }
}