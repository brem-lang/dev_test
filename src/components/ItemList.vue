<template>
    <div class="container">
        <h1>ADD ITEM PAGE</h1>
        
        <!-- Example single danger button -->
        <div class="btn-group">
            <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                Filter
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" @click="showAll()" href="#">Show All</a></li>
                    <li><a class="dropdown-item" @click="withStocks()" href="#">With Stocks</a></li>
                    <li><a class="dropdown-item" @click="noStocks()" href="#">No stocks</a></li>
                </ul>
        </div>

        <router-link :to="{ path: '/add' }"><button type="button" class="btn btn-primary">ADD</button></router-link>

        <input type="text" v-model="keywords" placeholder="search name..">

        <br>
        <table class="table table-dark">
            <thead>
              <tr>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Category</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="items in result" v-bind:key="items.id">
                <th scope="row">{{ items.name }}</th>
                <td>{{ items.description }}</td>
                <td>{{ items.price }}</td>
                <td>{{ items.quantity }}</td>
                <td>{{ items.categorys[0].name }}</td>
                <td>
                    <router-link :to="{name: 'edit', params: { id: items.id }}" class="btn btn-primary">Edit</router-link>
                    <button type="button" @click="DeleteItems(items)" class="btn btn-danger">delete</button>
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
            keywords: null,
            result: {},
        }
    },

    watch: {
        keywords(after, before) {
            this.fetch();
        }
    },

    created() {
        this.GetItems();
    },

    methods: {

        GetItems(){
            var page = 'http://127.0.0.1:8000/api/items';
            axios.get(page)
            .then(
                ({data})=>{
                    console.log(data)
                    this.result = data
                }
            )
        },
        DeleteItems(items){
            var page = `http://127.0.0.1:8000/api/delete/${items.id}`;
            axios.get(page)
                    .then(response => {
                        alert("item Deleted!!!!!!")
                        this.GetItems()
                    });
        },       
        fetch() {
            axios.get('http://127.0.0.1:8000/api/search?keywords=', { params: { keywords: this.keywords } })
                .then(response => this.result = response.data)
                .catch(error => {})
        },

        showAll(){
            this.$router.go(this.$router.currentRoute)
        },
        withStocks(){
            axios.get('http://127.0.0.1:8000/api/with-stock')
                .then(response => this.result = response.data)
                .catch(error => {})
        },
        noStocks(){
            axios.get('http://127.0.0.1:8000/api/no-stock')
                .then(response => this.result = response.data)
                .catch(error => {})
        }



    }
}
</script>