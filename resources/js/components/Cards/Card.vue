<template>
  <div class="card" style="min-height:5oopx;">
    <div class="card-image" v-if="$slots.image">
      <slot name="image"></slot>
    </div>
    <div class="card-header" v-if="$slots.header || title">
      <slot name="header">
        <div class="row">
          <div class="col-md-8">
            <h4 class="card-title">{{title}}</h4>
            <p class="card-category" v-if="subTitle">{{subTitle}}</p>
          </div>
          <div class="col-md-4 text-right">
            <slot name="button"></slot>
          </div>
        </div>
      </slot>
    </div>
    <div class="card-body" v-if="$slots.default">
      <slot></slot>
    </div>
    <slot name="raw-content"></slot>
    <div class="card-footer" v-if="$slots.footer">
      <hr />
      <slot name="footer"></slot>
    </div>
  </div>
</template>
<script>
export default {
  name: "card",
  props: {
    title: String,
    subTitle: String
  }
};
</script>
<style>
</style>
