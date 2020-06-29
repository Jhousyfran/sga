<template>
  <div class="row" style="min-height: 400px;">
    <div class="col-12">
      <card :title="table1.title" :subTitle="table1.subTitle">
        <template v-slot:button>
          <router-link to="/produto/novo">
            <button class="btn btn-sm btn-success">Novo Produto</button>
          </router-link>
        </template>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <th v-for="column in columns" :key="column">{{column}}</th>
            </thead>
            <tbody>
              <tr v-for="(product, index) in products" :key="index">
                <td>{{ product.name }}</td>
                <td>{{ product.description }}</td>
                <td>{{ product.amount }}</td>
                <td>
                  <button class="btn btn-info btn-sm" title="Editar" @click="edit(product.id)">
                    <span class="ti-eye"></span>
                  </button>
                  <button class="btn btn-danger btn-sm" title="Excluir" @click="remove(product.id)">
                    <span class="ti-na"></span>
                  </button>
                </td>
              </tr>
              <tr v-if="products.length == 0">
                <td colspan="4" class="text-center">Nenhum produto cadastrado.</td>
              </tr>
            </tbody>
          </table>
        </div>
      </card>
    </div>
  </div>
</template>
<script>
import { mapGetters, mapActions } from "vuex";

export default {
  name: "PageProducts",

  computed: {
    ...mapGetters({
      products: "Product/products"
    })
  },
  data() {
    return {
      columns: ["Nome", "Descrição", "Quantidade", "Ações"],
      table1: {
        title: "Lista de Produtos",
        subTitle: "Todos os produtos cadastrados"
        // columns: [...tableColumns]
        // data: [...tableData]
      }
    };
  },

  methods: {
    ...mapActions({
      getProducts: "Product/getAll",
      removeProduct: "Product/remove"
    }),
    edit(id) {
      this.$router.push({ name: "produto", params: { id: id } });
    },
    async remove(id) {
      let a = confirm("Deseja realmente excluir este produto?");
      if (!a) return 0;
      try {
        let response = await this.removeProduct(id);
        if (!response.data.errors || response.status == 200) {
          await this.getProducts();
          alert("Excluido com sucesso");
          return 0;
        }
      } catch (error) {}
      alert("Erro não foi possível excluir");
      return 0;
    }
  },
  async mounted() {
    if (!this.products.length) {
      await this.getProducts();
    }
  }
};
</script>
<style>
</style>
