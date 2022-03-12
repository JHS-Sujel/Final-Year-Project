<template>
  <nav aria-label="Page navigation example" v-if="showPagination">
    <ul class="pagination">
      <li
        class="page-item"
        v-for="(link, key) in links"
        :key="key"
        v-bind:class="isActive(link)"
      >
        <a
          class="page-link"
          @click.prevent="changePage(link.label)"
          v-if="link.url"
          >{{ link.label }}</a
        >
        <a class="page-link" href="#" v-else @click.prevent="handleNoLink">{{
          link.label
        }}</a>
      </li>
    </ul>
  </nav>
</template>

<script>
export default {
  props: {
    links: Array,
  },
  computed: {
    showPagination() {
      return 1;
    },
  },
  methods: {
    changePage: function (page) {
      this.$emit('changePage', page);
    },
    isActive(link) {
      return link.active === true ? "active" : "normal";
    },
    handleNoLink() {
      return false;
    },
  },
};
</script>
