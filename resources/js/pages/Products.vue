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
                  <button class="btn btn-info btn-sm">Editar</button>
                  <button class="btn btn-danger btn-sm">Excluir</button>
                </td>
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
  }
};
</script>
<style>
</style>
