<template>
  <div id="cards">
    <b-button class="add-btn" variant="dark" @click="addNew">Add new</b-button>
    <b-card-group columns>
      <card v-for="(card, index) in cards"
            :key="index" :card="card" :index="index"
            @deleteCard="deleteCard"
            @cardUpdate="cardUpdate"
      />
    </b-card-group>
  </div>
</template>

<script>
import Card from "./Card";

export default {
  name: "Cards",
  components: {
    Card
  },
  data() {
    return {
      cards: [
        {id: 1, title: 'my title', body: 'my body'}
      ]
    }
  },

  methods: {
    addNew() {
      this.cards.unshift({})
    },
    deleteCard(index) {
      console.log('emitted')
      this.cards = this.cards.filter((item, key) => key !== index);
    },
    cardUpdate(card) {
      console.log(card)
    }
  }
}
</script>

<style scoped lang="scss">


$small-breakpoint: 576px;
$medium-breakpoint: 768px;
$large-breakpoint: 1024px;


.add-btn {
  width: 200px;
  display: block;
  margin: 0 auto 20px;
}

.card-columns {
  column-count: 4;
  justify-content: center;

  @media screen and (max-width: $small-breakpoint) {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
  }
  @media screen and (min-width: $small-breakpoint) {
    column-count: 1;
    column-gap: 2.55rem;
  }
  @media screen and (min-width: $medium-breakpoint) {
    column-count: 2;
    column-gap: 11.25rem;
  }
  @media screen and (min-width: $large-breakpoint) {
    column-count: 4;
    column-gap: 2.25rem;
  }
}
</style>
