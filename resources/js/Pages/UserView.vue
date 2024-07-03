<template>
    <div class="container">
      <div className='row my-5'>
        <div className="col-md-9">
          <div className="card">
            <div className="card-body">
              <table className="table">
                  <thead>
                      <tr>
                          <th>ID</th>
                          <th>Title</th>
                          <th>Email</th>
                       
                      </tr>
                  </thead>
                <tbody>
                  <tr v-for="task in usersList.data" :key="task.id">
                    <td>{{ task.id }}</td>
                    <td>{{ task.name }}</td>
                    <td>{{ task.email }}</td>
                  </tr>
                </tbody>
              </table>
              <div className="my-4 d-flex justify-content-center">
                  <ul className="pagination">
                      <li v-for="(link, index) in usersList.links" :key="index" 
                          :class="`page-item ${link.active ? 'active' : ''}`">
                          <Link
                              v-if="link.url !== null"
                              :href="link.url"
                              className="page-link"
                              v-html="link.label">
                          </Link>
                          <div
                              v-else
                              className="page-link"
                              v-html="link.label">
                          </div>
                      </li>
                  </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</template>

<script setup>
  import { Link } from '@inertiajs/vue3'; 
  
  const props = defineProps({
    usersList: {
      type: Object,
      required: true
    }
  });
</script>

<style scoped>
</style>
                                                            
                                                        

