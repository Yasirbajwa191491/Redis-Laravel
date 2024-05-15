<template>
  <div class="search-container">
    <input
      class="search-input"
      v-model="query"
      @input="handleInput"
      placeholder="Enter postcode or address"
      type="text"
    >
    <div v-if="loading" class="loading">Loading...</div>
    <ul class="results-list" v-if="results.length">
      <li v-for="result in results" :key="result.id" class="result-item">
        {{ result.fulladdress }} - {{ result.postcode }}
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  data() {
    return {
      query: '',
      results: [],
      loading: false
    };
  },
  methods: {
    handleInput() {
      if (this.timer) {
        clearTimeout(this.timer);
      }
      this.timer = setTimeout(this.search, 500);
    },
    search() {
      this.loading = true;
      fetch(`/api/search?query=${encodeURIComponent(this.query)}`)
        .then(response => response.json())
        .then(data => {
          this.results = data;
          this.loading = false;
        })
        .catch(() => {
          this.loading = false;
        });
    }
  }
}
</script>

<style scoped>
.search-container {
  display: flex;
  flex-direction: column;
  align-items: center;
  margin-top: 20px;
}

.search-input {
  width: 90%;
  max-width: 400px;
  padding: 10px;
  font-size: 16px;
  border: 2px solid #007BFF;
  border-radius: 5px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  transition: border-color 0.3s ease-in-out;
}

.search-input:focus {
  border-color: #0056b3;
  outline: none;
}

.results-list {
  width: 90%;
  max-width: 400px;
  margin-top: 10px;
  list-style: none;
  padding: 0;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
}

.result-item {
  padding: 10px;
  border-bottom: 1px solid #ccc;
  background-color: #f8f9fa;
}

.result-item:last-child {
  border-bottom: none;
}

.result-item:hover {
  background-color: #e9ecef;
}

.loading {
  margin: 10px 0;
  color: #007BFF;
  font-weight: bold;
}
</style>
