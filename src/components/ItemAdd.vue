<template>
    <div class="container">
        <h1>Add Item</h1>
        <form @submit.prevent="addItems">
            <div class="form-group">
              <input type="text" v-model="items.name" class="form-control" placeholder="Name">
            </div>
            <div class="form-group">
              <input type="textarea" v-model="items.description" class="form-control" placeholder="Description">
            </div>
            <div class="form-group">
                <input type="number" v-model="items.price" class="form-control" placeholder="Price">
              </div>
              <div class="form-group">
                <input type="number" v-model="items.quantity" class="form-control" placeholder="Quantity">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Category</label>
                <select class="form-control"  v-model="items.category">
                  <option selected>Open this select menu</option>s
                  <option value="Shoes">Shoes</option>
                  <option value="Fruit">Fruit</option>
                  <option value="Motor">Motor</option>
                  <option value="Appliances">Appliances</option>
                </select>
              </div>
              
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data(){
        return {
            items: {}
        }
    },

    methods: {
        addItems() {
            axios.post('http://127.0.0.1:8000/api/save', this.items)
            .then(
                ({data})=>{
                    this.$router.push({path: '/'})
                    alert("item saved...");
                }
            )
        }
    }
}

</script>