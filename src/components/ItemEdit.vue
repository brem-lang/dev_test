<template>
    <div class="container">
        <h1>EDIT ITEM</h1>
        <form @submit.prevent="UpdateItem">
            <div class="form-group">
              <input type="text" v-model="result.name" class="form-control" placeholder="Name">
            </div><br>
            <div class="form-group">
              <input type="textarea" v-model="result.description" class="form-control" placeholder="Description">
            </div><br>
            <div class="form-group">
                <input type="number" v-model="result.price" class="form-control" placeholder="Price">
              </div><br>
              <div class="form-group">
                <input type="number" v-model="result.quantity" class="form-control" placeholder="Quantity">
              </div><br>
              <div class="form-group">
                <label for="exampleInputEmail1">Category</label>
                <select class='form-control' v-model='result.categorys[0].name'>
                    <option value='0' >Select Category</option>
                    <option v-for='data in category' 
                    :value='data.name'
                    >{{ data.name }}</option>
                </select>
              </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
</template>

<script>
import axios from 'axios'

export default {
    data() {
        return {
            result: {},
            id: this.$route.params.id,
            category: {},
        }
    },
    created(){
        this.GetData();
        this.getCategory();
    },

    methods: {
        GetData(){
            var page = `http://127.0.0.1:8000/api/edit/${this.id}`;
            axios.get(page)
            .then(
                ({data})=>{
                    console.log(data)
                    this.result = data;
                }
            )
        },
        UpdateItem(){
            var page = `http://127.0.0.1:8000/api/update/${this.id}`;
            axios.post(page, this.result)
            .then(
                ({data})=>{
                    this.$router.push({path: '/'})
                    console.log(data)
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