<template>
  <b-card
      style="width: 240px"
      bg-variant="dark"
      text-variant="white"
      header="Card"
      header-text-variant="white"
      header-tag="header"
      header-bg-variant="dark"

  >
    <template contenteditable="true" v-slot:header>
      <x-icon @click="deleteThis" style="cursor: pointer; margin: 0 0 5px 5px" class="float-right"/>
      <span class="header"  contenteditable="true" @blur="titleChanged">{{ card.title }}</span>
    </template>
    <b-card-text contenteditable="true" @blur="bodyChanged">
      {{ card.body }}
    </b-card-text>
  </b-card>
</template>

<script>
import {BIconX as XIcon} from "bootstrap-vue"

export default {
  name: "Card",
  props: {
    card: {type: Object},
    index: {type: Number}
  },
  components: {
    XIcon
  },
  methods: {
    deleteThis() {
      this.$emit('deleteCard', this.index)
    },

    titleChanged($event) {
      this.card.title = $event.target.innerHTML;
      this.$emit('cardUpdate', this.card)
    },
    bodyChanged($event) {
      this.card.body = $event.target.innerHTML;
      this.$emit('cardUpdate', this.card)
    }
  },
}
</script>

<style scoped lang="scss">

.card {
  margin: 5px;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
  transition: all 0.3s cubic-bezier(.25, .8, .25, 1);

  &:hover {
    box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
  }

  &:current {
    box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
  }

}

.header {
  display: inline-block;
  word-break: break-all;
  width: 88%;
}

</style>
