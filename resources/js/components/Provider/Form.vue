<template>
  <div class="col-md-12">
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label for="cpnj">Nome Empresa</label>
          <input
            type="text"
            v-model="provider.name"
            class="form-control"
            :class="{'is-invalid': errors.name}"
          />
          <div v-if="errors.name" class="invalid-feedback">
            <span v-for="(error, i ) in errors.name" :key="i">{{ error }}</span>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="cpnj">CNPJ</label>
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
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="cpnj">CEP</label>
          <input
            type="text"
            v-model="provider.address_postal_code"
            class="form-control"
            :class="{'is-invalid': errors.address_postal_code}"
          />
          <div v-if="errors.address_postal_code" class="invalid-feedback">
            <span v-for="(error, i ) in errors.address_postal_code" :key="i">{{ error }}</span>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3">
        <div class="form-group">
          <label for="cpnj">Estado</label>
          <input
            type="text"
            v-model="provider.address_state"
            class="form-control"
            :class="{'is-invalid': errors.address_state}"
          />
          <div v-if="errors.address_state" class="invalid-feedback">
            <span v-for="(error, i ) in errors.address_state" :key="i">{{ error }}</span>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label for="cpnj">Cidade</label>
          <input
            type="text"
            v-model="provider.address_city"
            class="form-control"
            :class="{'is-invalid': errors.address_city}"
          />
          <div v-if="errors.address_city" class="invalid-feedback">
            <span v-for="(error, i ) in errors.address_city" :key="i">{{ error }}</span>
          </div>
        </div>
      </div>
      <div class="col-md-5">
        <div class="form-group">
          <label for="cpnj">Bairro</label>
          <input
            type="text"
            v-model="provider.address_district"
            class="form-control"
            :class="{'is-invalid': errors.address_district}"
          />
          <div v-if="errors.address_district" class="invalid-feedback">
            <span v-for="(error, i ) in errors.address_district" :key="i">{{ error }}</span>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="cpnj">Avenida/Rua</label>
          <input
            type="text"
            v-model="provider.address_street"
            class="form-control"
            :class="{'is-invalid': errors.address_street}"
          />
          <div v-if="errors.address_street" class="invalid-feedback">
            <span v-for="(error, i ) in errors.address_street" :key="i">{{ error }}</span>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="cpnj">Número</label>
          <input
            type="text"
            v-model="provider.address_number"
            class="form-control"
            :class="{'is-invalid': errors.address_number}"
          />
          <div v-if="errors.address_number" class="invalid-feedback">
            <span v-for="(error, i ) in errors.address_number" :key="i">{{ error }}</span>
          </div>
        </div>
      </div>
      <div class="col-md-12" v-if="!edit">
        <div class="form-group">
          <label for="cpnj">Senha</label>
          <input
            type="password"
            v-model="provider.password"
            class="form-control"
            :class="{'is-invalid': errors.password}"
          />
          <div v-if="errors.password" class="invalid-feedback">
            <span v-for="(error, i ) in errors.password" :key="i">{{ error }}</span>
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
  name: "FormProvider",
  props: {
    provider: {
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
      createProvider: "Provider/create"
    }),

    async sendForm() {
      try {
        let response = await this.createProvider(this.provider);
        if (response.data.errors || response.status != 200) {
          console.log(response);
          this.errors = response.data.errors;
          this.notifyErrorForm();
          return 0;
        }
        this.notifySuccessForm();
        if (!this.edit) {
          this.$router.push({ name: "login" });
        }
      } catch (error) {
        this.notifyErrorForm();
      }
    }
  }
};
</script>