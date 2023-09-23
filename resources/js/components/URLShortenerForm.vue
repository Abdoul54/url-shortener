<template>
  <div class="d-flex flex-column align-items-center vh-100">
    <form @submit.prevent="shortenURL" class="mb-3">
      <div class="input-group">
        <input type="text" v-model="originalURL" class="form-control" placeholder="Enter your URL" required />
        <div class="input-group-append">
          <button type="submit" class="btn btn-primary">Shorten</button>
        </div>
      </div>
    </form>

    <div v-if="show">
      <div v-if="shortenedURL" class="alert alert-success" role="alert">
        Your shortened URL: <a :href="shortenedURL"><span>{{ shortenedURL }}</span></a>
      </div>
      <div v-else class="alert alert-danger" role="alert">
        Oops! Something Bad Happened<br>
        <span>{{ error }}</span>
      </div>
    </div>
  </div>
</template>
  


<script>
import axios from "axios";

export default {
  data() {
    return {
      originalURL: "",
      shortenedURL: "",
      show: false,
      error: "",
    };
  },
  methods: {
    shortenURL() {
      axios
        .post("/api/shorten-url", { original_url: this.originalURL })
        .then((response) => {
          this.shortenedURL = response.data.short_url;
          this.show = true;
        })
        .catch((error) => {
          this.show = true;
          this.error = error;
          console.error(error);
        })
    },
  },

};
</script>