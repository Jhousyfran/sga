<template>
  <div>
    <br />
    <br />
    <div class="container" style="margin: auto auto;">
      <h3 class="text-center">Login</h3>
      <div class="offset-md-3 col-md-6">
        <div class="card">
          <br />
          <div class="cart-text">
            <div class="col-12">
              <div class="form-group">
                <label for>CNPJ</label>
                <the-mask
                  class="form-control"
                  :class="{'is-invalid': errors.cnpj, 'is-invalid':errors.generic}"
                  v-model="provider.cnpj"
                  label="CNPJ"
                  mask="##.###.###/####-##"
                  placeholder="00.000.000/0000-00"
                />
                <div v-if="errors.cnpj" class="invalid-feedback" style="display:block;">
                  <span v-for="(error, i ) in errors.cnpj" :key="i">{{ error }}</span>
                </div>
              </div>
              <div class="form-group">
                <label for="cpnj">Senha</label>
                <input
                  type="password"
                  placeholder="Senha"
                  v-model="provider.password"
                  class="form-control"
                  :class="{'is-invalid': errors.password, 'is-invalid': errors.generic}"
                />
                <div v-if="errors.password" class="invalid-feedback" style="display:block;">
                  <span v-for="(error, i ) in errors.password" :key="i">{{ error }}</span>
                </div>
              </div>
              <div class="col-md-12">
                <div v-if="errors.generic" class="invalid-feedback" style="display:block;">
                  <span v-for="(error, i ) in errors.generic" :key="i">{{ error }}</span>
                </div>
                <br />
              </div>
              <p-button type="primary" style="width:100%;" @click.native="login()">Entrar</p-button>
            </div>
            <br />

            <div class="col-sm-12">
              <router-link to="/cadastro">Não tenho cadastro. Cadastrar-me agora.</router-link>
            </div>
            <br />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";

export default {
  name: "Login",

  data() {
    return {
      provider: {
        cnpj: "",
        password: ""
      },
      errors: {}
    };
  },

  methods: {
    ...mapActions({
      setLogin: "Provider/login",
      getProducts: "Product/getAll"
    }),
    async login() {
      try {
        let response = await this.setLogin(this.provider);
        if (response.errors) {
          this.errors = response.errors;
          this.notifyErrorForm();
          return 0;
        }
        await this.getProducts(window.$provider);
        this.$router.push({ name: "dashboard" });
      } catch (error) {
        console.log(error);
      }
    }
  }
};
</script>