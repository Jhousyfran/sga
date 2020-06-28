<template>
  <div class="wrapper">
    <br />
    <br />
    <div class="container" style="margin: auto auto;">
      <h3 class="text-center">Cadastro</h3>
      <div class="offset-md-2 col-md-8">
        <div class="card">
          <br />
          <div class="cart-body"></div>
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
