<template>
  <div>
    <div v-for="item in data" :key="item">{{ item.name }}</div>
  </div>
</template>

<script>
export default {
  name: "valueCheck",
  data() {
    return {
      data: []
    }
  },
  mounted() {
    fetch('http://hokki/api/check/index.php', {
      method: 'GET',
      mode: 'cors',
      headers: {
        'Accept': 'application/json',
        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
      },
    })
        .then(res => res.json())
        .then(data => this.data = data);
  }
}
</script>

<style scoped>

</style>