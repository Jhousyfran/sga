<template>
  <div style="min-height:400px;">
    <!--Stats cards-->
    <div class="row">
      <div class="col-md-6 col-xl-6" v-for="stats in statsCards" :key="stats.title">
        <stats-card>
          <div class="icon-big text-center" :class="`icon-${stats.type}`" slot="header">
            <i :class="stats.icon"></i>
          </div>
          <div class="numbers" slot="content">
            <p>{{stats.title}}</p>
            {{stats.value}}
          </div>
          <div class="stats" slot="footer">
            <i :class="stats.footerIcon"></i>
            {{stats.footerText}}
          </div>
        </stats-card>
      </div>
    </div>

    <!--Charts-->
    <div class="row">
      <div class="col-md-12 col-12"></div>
    </div>
  </div>
</template>
<script>
import { StatsCard, ChartCard } from "../components/index";
import Chartist from "chartist";
export default {
  components: {
    StatsCard,
    ChartCard
  },
  /**
   * Chart data used to render stats, charts. Should be replaced with server data
   */
  data() {
    return {
      statsCards: [
        {
          type: "warning",
          icon: "ti-server",
          title: "Estoque de Produtos",
          value: "",
          footerText: "A soma da quantidade de cada produto",
          footerIcon: "ti-server"
        },
        {
          type: "success",
          icon: "ti-package",
          title: "Tipos de Produtos",
          value: "",
          footerText: "Diferentes produtos cadastrados",
          footerIcon: "ti-info"
        }
      ]
    };
  },
  mounted() {
    this.statsCards[0].value = this.gProvider.totalAmountProducts;
    this.statsCards[1].value = this.gProvider.quantityOfproducts;
  }
};
</script>
<style>
</style>
