<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Tambah Data</div>

                    <div class="card-body">
                    <tr>
                      <th><center>Nama</center></th>
                      <th style ="width : 25%"><center>Aksi</center></th>
                    </tr>
                    <table class="table table-bordered">
                    <tr>
                      <td><center>Salma</center></td>
                      <td><center>
                        
                          <a href ="#"><i class="fas fa-glasses indigo">Lihat</i></a>
                          |
                        
                          <a href ="#"><i class="fas fa-edit green">Edit</i></a>  
                          |
                        
                          <a href="#"><i class="fas fa-trash-alt red">Hapus</i></a>
                        
                      </center></td>
                    </tr>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
