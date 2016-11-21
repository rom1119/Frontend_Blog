<template>
 <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 border">
    <div class="jumbotron width">
      <div class="container">
        <h1 v-text="first"></h1>
        
        <p>Contents ...</p>
        <p>
          <a class="btn btn-primary btn-lg">Learn more</a>
        </p>
      </div>
    </div>
</div>
</template> 

<script>
export default {
  name: 'post',
  data () {
    return {
      msg: 'Welcome to Your Vue.js App'
    }
  },
  props: {
    first: {
      require: true,
      type: String
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
h1, h2 {
  font-weight: normal;
}

.border {
  margin-top: 20px;

  box-shadow: 5px 0px 0 0px #12D617;
}

.width {
  width: 90%;
  margin-top: 20px;
  margin-left: auto;
  margin-right: auto;
  height: 100%;
}

ul {
  list-style-type: none;
  padding: 0;
}

li {
  display: inline-block;
  margin: 0 10px;
}

a {
  color: #42b983;
}
</style>
