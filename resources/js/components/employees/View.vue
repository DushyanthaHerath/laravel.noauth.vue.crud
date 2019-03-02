<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Employee List</div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>EPF</th>
                                    <th>Address</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="employee, index in emloyeeData">
                                    <td>{{ employee.name }}</td>
                                    <td>{{ employee.epf }}</td>
                                    <td>{{ employee.address }}</td>
                                    <td>
                                        <router-link :to="{name: 'edit', params: {id: employee.id}}" class="btn btn-xs btn-default">
                                            Edit
                                        </router-link>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
          return {
            emloyeeData: {}
          }
        },
        mounted() {
            let uri = 'http://127.0.0.1:8000/api/employees';
            this.axios.get(uri).then(response => {
              this.emloyeeData = response.data.data;
            });
        }
    }
</script>
