<template>
    <div class="container">
        <h1>Add Item</h1>
        <form @submit.prevent="add">
            <div class="form-group">
              <input type="text" v-model="items.category" class="form-control" placeholder="Name">
            </div>
              
            <button type="submit" class="btn btn-primary">Add</button>
          </form>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data(){
        return {
            items: {},
        }
    },


    methods: {
        add() {
            axios.post('http://127.0.0.1:8000/api/category-add', this.items)
            .then(
                ({data})=>{
                    this.$router.push({path: '/category'})
                    alert("category saved...");
                }
            )
        },
    }
}

</script>