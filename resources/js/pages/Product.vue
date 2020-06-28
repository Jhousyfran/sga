<template>
  <div class="row" style="min-height:400px;">
    <div class="col-xl-12 col-lg-12 col-md-12">
      <form-product :product="product" :edit="edit"></form-product>
    </div>
  </div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";
import { FormProduct } from "../components/index";

export default {
  components: { FormProduct },
  name: "Register",

  computed: {
    ...mapGetters({
      product: "Product/product"
    })
  },

  data() {
    return {
      edit: false
    };
  },

  methods: {
    ...mapActions({
      getProduct: "Product/getProduct"
    })
  },

  async created() {
    if (this.$route.params.id) {
      this.edit = true;
      try {
        let response = await this.getProduct(this.$route.params.id);
        if (response.status != 200) {
          this.$router.push({ name: "produtos" });
        }
      } catch (error) {
        this.$router.push({ name: "produtos" });
      }
    }
  }
};
</script>