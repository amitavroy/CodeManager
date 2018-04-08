<template>
  <div>
    <card>
      <modal :open="modelOpen" v-on:saved="handleModalSave">
        <template slot="title">Success</template>
      </modal>

      <div class="form-group">
        <label for="name">Project name</label>

        <input type="text" name="name"
               id="name" class="form-control"
               placeholder="Enter project name" v-model="name">

        <span class="text-danger help" v-text="errors.get('name')"></span>
      </div>

      <div class="form-group">
        <label for="git-url">Git url</label>
        <input type="text" name="name"
               id="git-url" class="form-control"
               placeholder="Enter project git url" v-model="gitUrl">
        <span class="text-danger help" v-text="errors.get('git_url')"></span>
      </div>

      <button class="btn btn-primary" @click="submit">Save</button>
    </card>
  </div>
</template>

<script>
  import Card from './../components/Card'
  import axios from 'axios'
  import Errors from './../utils/Errors'
  import Modal from './../components/Modal'
  export default {
    components: {
      Card, Modal
    },
    data () {
      return {
        name: '',
        gitUrl: '',
        errors: new Errors(),
        modelOpen: false
      }
    },
    methods: {
      submit () {
        let data = {
          name: this.name,
          git_url: this.gitUrl
        }
        axios.post('/project/add', data).then(response => {
          this.clearData()
        this.modelOpen = true
        }).catch(error => {
          if (error.response.status === 422) {
            this.errors.record(error.response.data.errors)
          }
        })
      },
      clearData () {
        this.name = ''
        this.gitUrl = ''
        this.errors.empty()
      },
      handleModalSave () {
        this.modelOpen = false
      }
    }
  }
</script>
