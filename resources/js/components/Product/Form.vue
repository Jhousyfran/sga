<template>
  <div class="col-md-12">
    <div class="row">
      <div class="col-md-8">
        <div class="form-group">
          <label for="cpnj">Nome</label>
          <input
            type="text"
            v-model="product.name"
            class="form-control"
            :class="{'is-invalid': errors.name}"
          />
          <div v-if="errors.name" class="invalid-feedback">
            <span v-for="(error, i ) in errors.name" :key="i">{{ error }}</span>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label for="cpnj">Quantidade</label>
          <the-mask
            class="form-control"
            :class="{'is-invalid': errors.amount}"
            v-model="product.amount"
            mask="######"
          />
          <div v-if="errors.amount" class="invalid-feedback" style="display:block;">
            <span v-for="(error, i ) in errors.amount" :key="i">{{ error }}</span>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label for="cpnj">Descrição</label>
          <input
            type="text"
            v-model="product.description"
            class="form-control"
            :class="{'is-invalid': errors.description}"
          />
          <div v-if="errors.description" class="invalid-feedback">
            <span v-for="(error, i ) in errors.description" :key="i">{{ error }}</span>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-12 text-right" v-if="!edit">
      <a href="javascript:history.back()" class="btn btn-warning">Voltar</a>
      <button class="btn btn-success" @click="sendForm()">Cadastrar</button>
    </div>
    <div class="col-md-12 text-right" v-else>
      <a href="javascript:history.back()" class="btn btn-warning">Voltar</a>
      <button class="btn btn-success" @click="sendForm()">Atualizar</button>
    </div>
    <br />
  </div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";

export default {
  name: "Formproduct",
  props: {
    product: {
      type: Object,
      default: function() {
        return {};
      }
    },
    edit: {
      type: Boolean,
      default: false
    }
  },

  data() {
    return {
      errors: {}
    };
  },

  methods: {
    ...mapActions({
      createproduct: "Product/create",
      getProducts: "Product/getAll"
    }),

    async sendForm() {
      try {
        let response = await this.createproduct(this.product);
        console.log(response);

        if (response.data.errors || response.status != 200) {
          this.errors = response.data.errors;
          this.notifyErrorForm();
          return 0;
        }
        this.notifySuccessForm();
        await this.getProducts();
        this.$router.push({ name: "produtos" });
      } catch (error) {
        this.notifyErrorForm();
      }
    }
  }
};
</script>