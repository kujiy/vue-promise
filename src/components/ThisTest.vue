<template>
  <div class="hello">
    <h1>thistest</h1>
  </div>
</template>

<script>
export default {
  name: 'ThisTest',
  data: function () {
    return {
      count: 0
    }
  },
  mounted:  function () {
    this.startstart();
  },
  methods: {
    startstart: function () {
      this.funcA();
    },
    funcA: function() {
      console.log("funcA");
      setTimeout(function(){
        // console.log("funcA");
      }, 100);
    }
  }
}
</script>
