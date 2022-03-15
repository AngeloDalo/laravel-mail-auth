<!-- visualizzazione dei projects -->
<template>
  <div class="container">
    <div class="row row-cols-1 row-cols-md-4 g-4">
      <div class="col" v-for="(project, index) in cards.projects" :key="index">
        <div class="card">
          <img :src="'/storage/'+project.image" class="card-img-top" :alt="project.name">
          <div class="card-body">
            <h5 class="card-title">{{ project.name }}</h5>
            <p class="card-text">{{ project.description }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Main",
  props: ['cards'],
}
</script>

<style lang="scss" scoped>
</style>