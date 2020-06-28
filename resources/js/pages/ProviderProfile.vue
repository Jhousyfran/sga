<template>
  <div class="row">
    <!-- <div class="col-xl-4 col-lg-5 col-md-6">
      <user-card></user-card>
    </div>-->
    <div class="col-xl-12 col-lg-12 col-md-12">
      <form-provider :provider="gProvider" :edit="true"></form-provider>
    </div>
  </div>
</template>
<script>
import { FormProvider } from "../components/index";

export default {
  name: "ProviderProfile",
  components: {
    FormProvider
  }
};
</script>
<style>
</style>
