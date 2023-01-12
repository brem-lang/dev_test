<template>
    <div class="container">
        <h1>CATEGORY PAGE</h1>
        

        <router-link :to="{ path: '/' }"><button type="button" class="btn btn-warning">BACK</button></router-link>
        <router-link :to="{ path: '/categoryAdd' }"><button type="button" class="btn btn-primary">ADD CATEGORY</button></router-link>

        <br>
        <table class="table table-dark">
            <thead>
              <tr>
                <th scope="col">Name</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="items in result" v-bind:key="items.id">
                <th scope="row">{{ items.name }}</th>
                <td>
                    <button type="button" @click="DeleteCategory(items)" class="btn btn-danger">delete</button>
                </td>
              </tr>
            </tbody>
          </table>
    </div>
</template>

<script>
import axios from 'axios'

export default{
    name : 'ItemView',
    data () {
        return{
            result: {},
        }
    },

    created() {
        this.GetItems();
    },

    methods: {

        GetItems(){
            var page = 'http://127.0.0.1:8000/api/category-list';
            axios.get(page)
            .then(
                ({data})=>{
                    console.log(data)
                    this.result = data
                }
            )
        },
        DeleteCategory(items){
            var page = `http://127.0.0.1:8000/api/category-delete/${items.id}`;
            axios.get(page)
                    .then(response => {
                        alert("item Deleted!!!!!!")
                        this.GetItems()
                    });
        },
    }
}
</script>