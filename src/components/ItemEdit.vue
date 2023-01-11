<template>
    <div class="container">
        <h1>EDIT ITEM</h1>
        <form @submit.prevent="UpdateItem">
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
                <!-- <select class="form-control"  v-model="items.category"> -->
                    <!-- <option v-for="cat in categories"
                        :value="cat.id"
                        :selected="cat.id == post.category_id">
                    {{cat.name}}
            </option> -->
                <!-- </select> -->
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
            items: {},
            id: this.$route.params.id
        }
    },
    created(){
        this.GetData();
    },

    methods: {
        GetData(){
            var page = `http://127.0.0.1:8000/api/edit/${this.id}`;
            axios.get(page)
            .then(
                ({data})=>{
                    console.log(data);
                    this.items = data;
                }
            )
        },
        UpdateItem(){
            var page = `http://127.0.0.1:8000/api/update/${this.id}`;
            axios.post(page, this.items)
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