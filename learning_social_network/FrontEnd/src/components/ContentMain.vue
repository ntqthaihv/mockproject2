
<template>
  <div>
      <div id="main_logout">
        <headerLogout></headerLogout>
        <!-- <slideLogout></slideLogout> -->
        <!-- <show></show> -->
        <router-view/>
        <footerLogout></footerLogout>
      </div>
  </div>
</template>

<script>
import header_login from './header_login.vue'
import footer_logout from './footer_logout.vue'
import header_logout from './header_logout.vue'
import slide_logout from './slide_logout.vue'
import show from './show.vue'
export default {
  name:'appmain',
  components: {
    footerLogout:footer_logout,
    headerLogout:header_logout,
    slideLogout:slide_logout,
    show:show
  },
  data() {
    return {

    };
  }
};
</script>

<style>
</style>
