<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h3>User</h3></div>

                    <div class="card-body">
                        <button type="button" class="btn btn-success" @click="modalBaru"><i class="fas fa-credit-card"></i>
                        Tambah User
                        </button>
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
        <!-- Modal -->
    <div
      class="modal fade"
      id="tambah"
      tabindex="-1"
      role="dialog"
      aria-labelledby="tambahLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="tambahLabel" v-show="!editmode">Tambah Data Baru</h5>
            <h5 class="modal-title" id="tambahLabel" v-show="editmode">Rubah Data Kategori</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form @submit.prevent="editmode ? updateData() : createData()">
            <div class="modal-body">
              <div class="form-group">
                <input
                  v-model="form.name"
                  type="text"
                  name="name"
                  placeholder="Nama"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('name') }"
                />
                <has-error :form="form" field="name"></has-error>
              </div>
              <div class="form-group">
                <input
                  v-model="form.email"
                  type="text"
                  name="email"
                  placeholder="Email"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('email') }"
                />
                <has-error :form="form" field="email"></has-error>
              </div>
              <div class="form-group">
                <input
                  v-model="form.password"
                  type="text"
                  name="password"
                  placeholder="Password"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('password') }"
                />
                <has-error :form="form" field="password"></has-error>
              </div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Keluar</button>
              <button v-show="!editmode" type="submit" class="btn btn-primary">Tambah</button>
              <button v-show="editmode" type="submit" class="btn btn-primary">Rubah</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!--/Modal-->
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
                    password:"",
                })
            };
        },
        methods: {
            modalBaru() {
                this.editmode = false;
                this.form.reset();
                $("#tambah").modal("show");
            },  //tindakan untuk data:hapus, lihat, dll
            loadData() {
                axios.get("api/user").then(({data}) => (this.users = data));
            },
            createData() {
                this.form
                .post("api/user")
                .then(() => {
                    this.$Progress.start();
                    Fire.$emit("refreshData");
                    $("#tambah").modal("hide");
                    Toast.fire({
                        type: "success",
                        title: "Data Berhasi Tersimpan"
                        });
                        this.$Progress.finish();
                        })
                        .catch();
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