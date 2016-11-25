<template>
  <aside class="sidebar">
    
  </aside>
</template>

<script>



export default {
  name: 'sidebar',
  data: function() {
    return {
      path: window.location.hash
    }
  },
  methods: {
    isActive: function(url) {
      return window.location.hash == url;
    }
  }
}
</script>
