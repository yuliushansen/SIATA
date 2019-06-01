<template>
    <div class="text-light">
        <nav class="navbar navbar-expand-lg navbar-dark"  style="background-color:#2d4059;">
                <a class="navbar-brand uppercase" href="#/dashboard"><h2>{{this.$auth.user().username}}</h2></a>
                
            </nav>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar -->
            
            <div class="border-right" id="sidebar-wrapper"  style="background-color:#00adb5;">
            <!-- <div class="sidebar-heading uppercase bg-primary text-white font-weight-bold">{{this.$auth.user().username}}</div> -->
            <div class="list-group list-group-flush" >
                <router-link v-if="this.$auth.user().id_akun===1" :to="{ name: 'register' }" style="background-color:#00adb5;" class="list-group-item list-group-item-action text-light">Kelola Akun Pegawai</router-link>
                <router-link v-if="this.$auth.user().id_akun===1" :to="{ name: 'pegawai' }" style="background-color:#00adb5;" class="list-group-item list-group-item-action text-light">Kelola Pegawai</router-link>
                <router-link :to="{ name: 'pelanggan' }" style="background-color:#00adb5;" class="list-group-item list-group-item-action text-light">Kelola Pelanggan</router-link>
                <router-link :to="{ name: 'motor' }" style="background-color:#00adb5;" class="list-group-item list-group-item-action text-light">Kelola Motor Pelanggan</router-link>
                <router-link :to="{ name: 'transaksi' }" style="background-color:#00adb5;" class="list-group-item list-group-item-action text-light">Kelola Transaksi</router-link>
                <router-link :to="{ name: 'tampilservice' }" style="background-color:#00adb5;" class="list-group-item list-group-item-action text-light">Tampil Status Service</router-link>
                <router-link :to="{ name: 'pembayaran' }" style="background-color:#00adb5;" class="list-group-item list-group-item-action text-light">Kelola Pembayaran</router-link>
                <router-link :to="{ name: 'pengadaan' }" style="background-color:#00adb5;" class="list-group-item list-group-item-action text-light">Kelola Pengadaan</router-link>
                <router-link :to="{ name: 'historypengadaan' }" style="background-color:#00adb5;" class="list-group-item list-group-item-action text-light">History Pengadaan</router-link>
                <router-link :to="{ name: 'jasa_service' }" style="background-color:#00adb5;" class="list-group-item list-group-item-action text-light">Kelola Jasa Service</router-link>
                <router-link :to="{ name: 'sparepart' }" style="background-color:#00adb5;" class="list-group-item list-group-item-action text-light">Kelola Sparepart</router-link>
                <router-link :to="{ name: 'cabang' }" style="background-color:#00adb5;" class="list-group-item list-group-item-action text-light">Kelola Cabang</router-link>
                <router-link :to="{ name: 'supplier' }" style="background-color:#00adb5;" class="list-group-item list-group-item-action text-light">Kelola Supplier</router-link>
                <router-link :to="{ name: 'laporan' }" style="background-color:#00adb5;" class="list-group-item list-group-item-action text-light">Laporan</router-link>
                <a @click="$auth.logout()" style="background-color:#00adb5;" class="list-group-item list-group-item-action">Logout</a>
                
            </div>
            </div>
        <!-- register -->
        <div class="container-fluid" >
        <h3 class="row ml-4 mt-4" style="color: #2d4059;">Jasa Service</h3>
        <div class="row ml-4 mt-4 mr-4"  id="register">
            
            <!-- form -->
            <div class="col shadow-sm p-3 mb-5 rounded col-3 ml-2 " style="background-color:#2d4059;">
            <h3>Form</h3><hr class="bg-light">
            
            <form  @submit.prevent="addJasa" class="form-horizontal ml-1"  role="form">
                <!-- <div class="alert alert-success" role="alert" v-if="state">
                        Registrasi Berhasil
                </div> -->
                <div class="form-group">
                    <label for="nama_jasa">Nama Jasa Service</label>
                    <input id="nama_jasa" type="text" class="form-control" name="nama_jasa" v-model="jasa.nama_jasa" required autofocus>
                </div>
                <div class="form-group">
                    <label for="harga_jasa">Harga</label>
                    <input id="harga_jasa" type="number" class="form-control" v-model="jasa.harga_jasa" name="harga_jasa" required>
                </div>
                    
                <button type="submit" class="btn text-light" style="background-color:#00adb5;" name="tambah">Submit</button>
            </form>
            </div>
            <!-- form -->
            <!-- table -->
            <div class="col shadow-sm p-3 mb-5 rounded ml-2" style="background-color:#2d4059;">
            <div class="row">
            <h3 class="col">Table</h3>
            <!-- <div class="col"> -->
                <label class="mr-3" for="Search"><h4>Search</h4></label>
                <input type="text" @keyup="showJasa()" placeholder="Service Name" name="search" class="tombol col-3 mb-3 mr-3 form-control" v-model="search">
            <!-- </div> -->
            
            </div>
            <table class="table text-light ">
                <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Jasa Service</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Metode</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(jasa,index) of jasas.data" v-bind:key="jasa['key']">
                    <td>{{index+1}}</td>
                    <td>{{jasa.nama_jasa}}</td>
                    <td>
                        {{jasa.harga_jasa}}
                    </td>
                    <td>
                        <button type="button" class="btn btn-success" @click="editJasa(jasa)"><i class="fas fa-edit"></i></button>
                        <button type="button" class="btn btn-danger" @click="deleteJasa(jasa.id_jasa)"><i class="far fa-trash-alt"/></button>
                    </td>
                </tr>
                </tbody>
            </table>
            </div>
            </div>
            <!-- table -->
        </div>
        <!-- register -->
        </div>
        
    </div>
</template>

<script>
import Controller from '../httpController'
    export default{
        data(){
            return{
                jasas: [],
                jasa: {
                    id_jasa: '',
                    nama_jasa: '',
                    harga_jasa: '',
                },
                id_jasa: '',
                edit: false,
                state: false,
                stateEdit: false,
                tampung: [] ,
                search: ''
            }
        },
        created() {
            this.showJasa();
        },
        methods:{
            
            async showJasa(){
                
                try {

                    this.tampung = await Controller.getJasa(this.search);
                    //alert("Register berhasil !!")
                    this.jasas = this.tampung.data;
                    console.log(this.jasas)
                    
                    
                } catch (err) {
                    console.log(err)
                }
                
            },
            async addJasa() {
            if (this.edit === false) {
                
                try {
                    await Controller.insertJasa(this.jasa)
                    //alert("Register berhasil !!")
                    console.log("Success")
                    this.clearForm();
                    //alert('Mobil Added');
                    this.showJasa();
                    this.state = true;
                    
                } catch (err) {
                    console.log(err)
                }
            }else{
                
                
                
                try {
                    await Controller.editJasa(this.jasa.id_jasa,this.jasa)
                    //alert("Register berhasil !!")
                    console.log("Success")
                    this.clearForm();
                    // alert('Article Updated');
                    this.showJasa();
                    this.stateEdit = true;
                    
                } catch (err) {
                    console.log(err)
                }
            } 
            },
            editJasa(jasa) {
              this.edit = true;
              this.jasa.id_jasa = jasa.id_jasa;
              this.jasa.nama_jasa = jasa.nama_jasa;
              this.jasa.harga_jasa = jasa.harga_jasa;
              
              //console.log(this.mobil.image);
              this.state = false;
            },
            async deleteJasa(id_jasa) {
           
                try {
                    await Controller.deleteJasa(id_jasa)
                    //alert("Register berhasil !!")
                    console.log("Success")
                    this.showJasa();
                    
                    
                } catch (err) {
                    console.log(err)
                }
            },
            clearForm() {
              this.edit = false;
              this.jasa.id_jasa = '';
              this.jasa.nama_jasa = '';
              this.jasa.harga_jasa = '';
            },
        }
    }
</script>