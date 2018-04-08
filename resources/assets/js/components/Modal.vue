<template>
  <div class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header" v-if="$slots.title">
          <h5 class="modal-title"><slot name="title"></slot></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" v-if="$slots.body">
          <slot name="body"></slot>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" @click="handleSaveButtonClick" v-if="$slots.confirmbtn">
            <slot name="confirmbtn"></slot>
          </button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import $ from 'jquery'
  export default {
    props: ['open'],
    created () {

    },
    watch: {
      open () {
        if (this.open === true) {
          $('.modal').modal()
        } else {
          $('.modal').modal('hide')
        }
      }
    },
    methods: {
      handleSaveButtonClick () {
        this.$emit('saved')
      }
    }
  }
</script>
