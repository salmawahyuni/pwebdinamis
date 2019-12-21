<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h3>User</h3></div>

                    <div class="card-body">
                        <button type="button" class="btn btn-success float-right"><i class="fas fa-credit-card"></i> &nbsp; Tambah User </button>
                        <br>
                        <br>
                        <br>

                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th><center>Id</center></th>
                                <th><center>Nama</center></th>
                                <th><center>Email</center></th>
                                <th style="width:15%"><center>Aksi</center></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="items in users" :key="items.id">
                                <td>{{items.id}}</td>
                                <td>{{items.name}}</td>
                                <td>{{items.email}}</td>
                                <td>
                                <center>
                                
                                <a href="#">
                                    <i class="fas fa-edit cyan"> </i>
                                </a>
                                &nbsp;&nbsp; | &nbsp;&nbsp;
                                <a href="#">
                                    <i class="fas fa-trash indigo"> </i>
                                </a>
                                </center>
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
            return{
                editmode: false,
                users: {},  //menampung data di form
                form: new Form({    //mengisi data otomatis
                    id: "",
                    name: "",
                    email: "",
                })
            };
        },
        methods: {  //tindakan untuk data:hapus, lihat, dll
            loadData() {
                axios.get("api/user").then(({data}) => (this.users = data));
            } 
        },
        created(){  //menampilkan data
            this.loadData();
            Fire.$on("refreshData", () => {
                this.loadData();
            });
        }
    };
</script>
