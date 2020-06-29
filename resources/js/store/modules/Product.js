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
        },
        setProduct(state, payload) {
            state.product = payload;
        }
    },
    actions: {

        async create({ commit }, payload) {
            try {
                let response = false;
                if (payload.id) {
                    response = await window.axios.put('/produtos/' + payload.id, payload);
                } else {
                    response = await window.axios.post('/produtos', payload);
                }
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
                if (error.response.status == 403) {
                    window.$provider = '';
                    window.location = '/#/login'
                }

            }
        },

        async getProduct({ commit }, id) {
            try {
                let response = await window.axios.get('/produtos/' + id);
                commit('setProduct', response.data);
                return response;
            } catch (error) {
                if (error.response.status == 403) {
                    window.$provider = '';
                    window.location = '/#/login'
                }
                return error.response;
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