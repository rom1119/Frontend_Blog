<template>
  <aside class="sidebar">
    <search-widget></search-widget>
    <tags-widget></tags-widget>
  </aside>
</template>

<script>

import searchWidget from '../../elements/search-widget.vue'
import tagsWidget from '../../elements/tags-widget.vue'

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
  },
  components: {
    'search-widget': searchWidget,
    'tags-widget': tagsWidget,

  }
}
</script>
