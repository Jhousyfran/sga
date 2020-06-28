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
              <fg-input type="text" label="CNPJ" placeholder="00.000.000/000-00"></fg-input>
              <fg-input type="text" label="Token" placeholder="Token de acesso ao sistema"></fg-input>
              <p-button type="primary" style="width:100%;">Entrar</p-button>
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
export default {
  name: "Login"
};
</script>