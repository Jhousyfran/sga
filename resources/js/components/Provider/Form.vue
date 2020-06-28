<template>
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
</template>

<script>
export default {
  name: "FormProvider"
};
</script>