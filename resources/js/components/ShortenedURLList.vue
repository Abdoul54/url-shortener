<template>
  <div>
    <h2>Shortened URLS</h2>
    <table class="table table-striped">
      <thead class="thead-dark">
        <tr>
          <th>Short URL</th>
          <th>Original URL</th>
          <th>Clicked</th>
          <th>Created</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="url in urls" :key="url.id">
          <td>{{ url.short_url }}</td>
          <td><a :href="url.original_url"
              class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover text-black">{{
                url.original_url }}</a></td>
          <td>{{ url.click_count }}</td>
          <td><time>{{ new Date(url.created_at) }}</time></td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      urls: [],
    };
  },
  mounted() {
    this.fetchData();
  },
  methods: {
    fetchData() {
      axios
        .get("http://localhost:8000/api/shortened-urls")
        .then((response) => {
          this.urls = response.data.shortenedURLs;
          const urlsArray = Object.values(this.urls);
          urlsArray.sort((a, b) => b.click_count - a.click_count);
          this.urls = urlsArray;

          console.log(this.urls);

        })
        .catch((error) => {
          console.error("Error fetching data:", error);
        });
    },
  },
};
</script>

<style scoped>
/* Add your component-specific styles here */
</style>
