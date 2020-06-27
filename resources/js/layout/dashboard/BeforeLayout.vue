<template>
  <div class="wrapper">
    <br />
    <br />
    <div class="container" style="margin: auto auto;">
      <h3 class="text-center">Cadastro</h3>
      <div class="offset-md-2 col-md-8">
        <div class="card">
          <br />
          <div class="cart-body">
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="cpnj">Nome Empresa</label>
                    <input type="text" class="form-control is-invalid" name id />
                    <!-- <div class="invalid-feedback">Please select a valid state.</div> -->
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="cpnj">CNPJ</label>
                    <input type="text" class="form-control is-invalid" name id />
                    <!-- <div class="invalid-feedback">Please select a valid state.</div> -->
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="cpnj">CEP</label>
                    <input type="text" class="form-control is-invalid" name id />
                    <!-- <div class="invalid-feedback">Please select a valid state.</div> -->
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="cpnj">Estado</label>
                    <input type="text" class="form-control is-invalid" name id />
                    <!-- <div class="invalid-feedback">Please select a valid state.</div> -->
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="cpnj">Cidade</label>
                    <input type="text" class="form-control" name id />
                    <!-- <div class="invalid-feedback">Please select a valid state.</div> -->
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="form-group">
                    <label for="cpnj">Bairro</label>
                    <input type="text" class="form-control" name id />
                    <!-- <div class="invalid-feedback">Please select a valid state.</div> -->
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="cpnj">Avenida/Rua</label>
                    <input type="text" class="form-control" name id />
                    <!-- <div class="invalid-feedback">Please select a valid state.</div> -->
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="cpnj">Número</label>
                    <input type="text" class="form-control" name id />
                    <!-- <div class="invalid-feedback">Please select a valid state.</div> -->
                  </div>
                </div>
              </div>
              <div class="col-md-12 text-right">
                <button class="btn btn-success">Cadastrar</button>
              </div>
              <br />
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<style lang="scss">
body {
  background-color: #eee !important;
}
.form-control {
  border: 1px solid #ced4da;
}
</style>
<script>
import TopNavbar from "./TopNavbar.vue";
import ContentFooter from "./ContentFooter.vue";
import DashboardContent from "./Content.vue";
import MobileMenu from "./MobileMenu";
export default {
  components: {
    TopNavbar,
    ContentFooter,
    DashboardContent,
    MobileMenu
  },
  methods: {
    toggleSidebar() {
      if (this.$sidebar.showSidebar) {
        this.$sidebar.displaySidebar(false);
      }
    }
  }
};
</script>
