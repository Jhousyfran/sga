<template>
  <div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12">
      <form-product></form-product>
    </div>
  </div>
</template>

<script>
import { FormProduct } from "../components/index";

export default {
  components: { FormProduct },
  name: "Register",

  data() {
    return {
      provider: {}
    };
  },

  methods: {}
};
</script>