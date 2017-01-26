<template>
  <aside class="sidebar col-md-4">
    <search-widget></search-widget>
    <most-rating-widget></most-rating-widget>
    <categories-widget></categories-widget>
    <tags-widget></tags-widget>
  </aside>
</template>

<script>

import searchWidget from '../../elements/search-widget.vue'
import tagsWidget from '../../elements/tags-widget.vue'
import mostRating from '../../elements/post-sidebar-widget.vue'
import categoriesWidget from '../../elements/categories-widget.vue'

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
    'most-rating-widget': mostRating,
    'categories-widget': categoriesWidget

  }
}
</script>
