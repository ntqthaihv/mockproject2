<template>

  <div >
    <slideclass></slideclass>
    <div class="date-learning">
      <div class="date-one">20/6/2017</div>
      <div class="date-one">15/6/2017</div>
      <div class="date-one">10/6/2017</div>
      <div class="date-one">10/6/2017</div>
      <div class="date-one">6/6/2017</div>
    </div>
  </div>
</template>
<script>
import SlideClass from './slide_class.vue'
export default {
  name: 'attendance',
  components:{
    slideclass:SlideClass
  },
  data () {
    return {
      
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style >
.date-learning{
  display:flex;
}
.date-one{
  background-color:white;
  color:back;
  width:150px;
  height:50px;
}
</style>