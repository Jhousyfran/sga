<template>
  <div>
    <br />
    <br />
    <div class="container" style="margin: auto auto;">
      <h3 class="text-center">Cadastro</h3>
      <div class="offset-md-2 col-md-8">
        <div class="card">
          <div class="col-md-12">
            <br />
            <div class="cart-body">
              <form-provider :provider="provider"></form-provider>
            </div>
            <br />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { FormProvider } from "../components/index";

export default {
  components: { FormProvider },
  name: "Register",

  data() {
    return {
      provider: {}
    };
  },

  methods: {}
};
</script>