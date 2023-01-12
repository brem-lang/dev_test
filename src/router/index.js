import Vue from 'vue'
import Router from 'vue-router'
import HelloWorld from '@/components/HelloWorld'
import ItemList from '@/components/ItemList'
import ItemAdd from '@/components/ItemAdd'
import ItemEdit from '@/components/ItemEdit'
import CategoryList from '@/components/CategoryList'
import CategoryAdd from '@/components/CategoryAdd'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/test',
      name: 'HelloWorld',
      component: HelloWorld
    },
    {
      path: '/',
      name: 'home',
      component: ItemList
    },
    {
      path: '/add',
      name: 'add',
      component: ItemAdd
    },
    {
      path: '/edit',
      name: 'edit',
      component: ItemEdit
    },
    {
      path: '/category',
      name: 'category',
      component: CategoryList
    },
    {
      path: '/categoryAdd',
      name: 'categoryAdd',
      component: CategoryAdd
    }
  ]
})
