<template>
    <div class="ps-5">
          <div class="container-fluid">
              <div class="row">
                  <div class="col text-center m-2">
                      <h1 class="mt-5 mb-3">
                        All projects
                      </h1>
                  </div>
              </div>
          </div>
          <Main :cards="cards"></Main>
    </div>
</template>

<script>
import Axios from "axios";
import Main from '../components/Main.vue';
export default {
    name:"Project",
    components: {
        Main
    },
    data() {
      return {
        cards: {
          projects: null,
        }
      }
    },
    created() {
      this.getProjects('http://127.0.0.1:8000/api/v1/projects');
    },
    methods: {
      getProjects(url) {
          Axios.get(url).then(
            (result) => {
                this.cards.projects = result.data.results;
            });
          },
    }   
}
</script>

<style>
</style>