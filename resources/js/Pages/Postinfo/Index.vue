<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Pagination from '@/Components/Pagination.vue';
import { Head,Link,useForm } from '@inertiajs/vue3';
import { defineComponent,ref, watch } from 'vue';
import { router } from '@inertiajs/vue3'



defineProps({ posts: Object });
const deleteform = useForm({

});
defineComponent({
    Pagination
})
const search = ref(' ');
const perPage = ref(50);
watch(search,value =>{
    router.get('/post',{search:value},{
            preserveState:true,
            replace:true
        });
});
const deletepostinfo = (post_id)=>{
  //alert(post_id)
  if(confirm('Are you sure to delete this post ?'))
  {
    deleteform.delete(route('post.destroy',post_id));
  }
};

</script>
<template>
   <Head title="Post Information"></Head>
   <AuthenticatedLayout>
    <template #header>
            <Link :href="route('post.create')" class="font-semibold text-xl bg-green-500 text-white  t leading-tight btn btn-success p-2" >Post Create</Link>
        </template>
        <div>
            <input v-model="search" placeholder="Typing Search" />
            <table id="customers">
                    <tr>
                        <th>Title</th>
                        <th>Date</th>
                        <th>Url</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
        <tr v-for="post in posts.data" :key="post.id">
             <td>{{ post.title }}</td>
             <td>{{ post.post_date }}</td>
             <td>{{ post.url }}</td>
            <td>
              {{ (post.description) }}
            </td>
            <td>
                <Link :href="route('post.edit',post.id)" class="font-semibold text-xl bg-green-800 text-white leading-tight btn btn-success p-2">Edit</Link>
                <button @click="deletepostinfo(post.id)"  class="font-semibold text-xl bg-gray-800 text-green-500 leading-tight btn btn-success mx-2 p-2">Delete</button>

            </td>
        </tr>

</table>
        <div class="text-right">
              <Pagination  :pagination="posts.meta"/>
        </div>
        </div>
   </AuthenticatedLayout>
</template>



<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
  margin: 10px;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
