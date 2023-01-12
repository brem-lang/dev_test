<template>
    <div class="container">
        <h1>Add Item</h1>
        <form @submit.prevent="addItems">
            <div class="form-group">
              <input type="text" v-model="items.name" class="form-control" placeholder="Name">
            </div><br>
            <div class="form-group">
              <input type="textarea" v-model="items.description" class="form-control" placeholder="Description">
            </div><br>
            <div class="form-group">
                <input type="number" v-model="items.price" class="form-control" placeholder="Price">
              </div><br>
              <div class="form-group">
                <input type="number" v-model="items.quantity" class="form-control" placeholder="Quantity">
              </div><br>
              <div class="form-group">
                <label for="exampleInputEmail1">Category</label>
                <select class='form-control' v-model='items.category'>
                  <option value='0' >Select Category</option>
                  <option v-for='data in category' :value='data.name'>{{ data.name }}</option>
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
            items: {},
            category: {}
        }
    },
    created() {
        this.getCategory();
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
        },

        getCategory(){
          var page = 'http://127.0.0.1:8000/api/category';
            axios.get(page)
            .then(
                ({data})=>{
                    console.log(data)
                    this.category = data
                }
            )
        }
    }
}

</script>