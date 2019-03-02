<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Employee</div>

                    <div class="card-body">
                        <form v-on:submit="saveForm()">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" v-model="employee.name">
                            </div>
                            <div class="form-group">
                                <label>EPF No</label>
                                <input type="text" class="form-control" v-model="employee.epf">
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" class="form-control" v-model="employee.address">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            let app=this;
            app.employeeId = app.$route.params.id;
            let uri = 'http://127.0.0.1:8000/api/employees/'+app.employeeId;
            axios.get(uri).then(function(response){
                let d = response.data.data;
                console.log(d); 
                app.employee = {
                    name: d.name,
                    epf: d.epf,
                    address: d.address
                }   
            });
        },
        data : function() {
            return {
                employeeId: null,
                employee: {
                    name: "",
                    epf: "",
                    address: ""
                }
            }
        },
        methods : {
            saveForm() {
                event.preventDefault();
                const app = this;
                let uri='http://127.0.0.1:8000/api/employees/'+app.employeeId;
                axios.put(uri, app.employee).then(function(response){
                    app.$router.push({path: '/view'});
                });
            }
        }
    }
</script>
