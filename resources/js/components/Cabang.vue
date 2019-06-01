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
        <h3 class="row ml-4 mt-4" style="color: #2d4059;">Cabang</h3>
        <div class="row ml-4 mt-4 mr-4"  id="register">
            
            <!-- form -->
            <div class="col shadow-sm p-3 mb-5 rounded col-3 ml-2 " style="background-color:#2d4059;">
            <h3>Form</h3><hr class="bg-light">
            
            <form  @submit.prevent="addCabang" class="form-horizontal ml-1"  role="form">
                <!-- <div class="alert alert-success" role="alert" v-if="state">
                        Registrasi Berhasil
                </div> -->
                <div class="form-group">
                    <label for="nama_jasa">Nama Cabang</label>
                    <input id="nama_jasa" type="text" class="form-control" name="nama_jasa" v-model="cabang.nama_cabang" required autofocus>
                </div>
                <div class="form-group">
                    <label for="nama_jasa">Alamat</label>
                    <input id="nama_jasa" type="text" class="form-control" name="nama_jasa" v-model="cabang.alamat" required autofocus>
                </div>
                <div class="form-group">
                    <label for="harga_jasa">Nomor Telepon</label>
                    <input id="harga_jasa" type="number" class="form-control" v-model="cabang.nomor" name="harga_jasa" required>
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
                <input type="text" @keyup="showCabang()" placeholder="Cabang Name" name="search" class="tombol col-3 mb-3 mr-3 form-control" v-model="search">
            <!-- </div> -->
            
            </div>
            <table class="table text-light ">
                <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Cabang</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Nomor Telepon</th>
                    <th scope="col">Metode</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(cabang,index) of cabangs.data" v-bind:key="cabang['key']">
                    <td>{{index+1}}</td>
                    <td>{{cabang.nama_cabang}}</td>
                    <td>{{cabang.alamat}}</td>
                    <td>{{cabang.nomor}}</td>
                    <td>
                        <button type="button" class="btn btn-success" @click="editCabang(cabang)"><i class="fas fa-edit"></i></button>
                        <button type="button" class="btn btn-danger" @click="deleteCabang(cabang.id_cabang)"><i class="far fa-trash-alt"/></button>
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
                cabangs: [],
                cabang: {
                    id_cabang: '',
                    nama_cabang: '',
                    alamat: '',
                    nomor: '',
                },
                id_cabang: '',
                edit: false,
                state: false,
                stateEdit: false,
                tampung: [] ,
                search: ''
            }
        },
        created() {
            this.showCabang();
        },
        methods:{
            async showCabang(){
                
                try {

                    this.tampung = await Controller.getCabang(this.search);
                    //alert("Register berhasil !!")
                    this.cabangs = this.tampung.data;
                    
                    
                } catch (err) {
                    console.log(err)
                }
                
            },
            async addCabang() {
            if (this.edit === false) {
                
                try {
                    await Controller.insertCabang(this.cabang)
                    //alert("Register berhasil !!")
                    console.log("Success")
                    this.clearForm();
                    //alert('Mobil Added');
                    this.showCabang();
                    this.state = true;
                    
                } catch (err) {
                    console.log(err)
                }
            }else{
                
                
                
                try {
                    await Controller.editCabang(this.cabang.id_cabang,this.cabang)
                    //alert("Register berhasil !!")
                    console.log("Success")
                    this.clearForm();
                    // alert('Article Updated');
                    this.showCabang();
                    this.stateEdit = true;
                    
                } catch (err) {
                    console.log(err)
                }
            } 
            },
            editCabang(cabang) {
              this.edit = true;
              this.cabang.id_cabang = cabang.id_cabang;
              this.cabang.nama_cabang = cabang.nama_cabang;
              this.cabang.alamat = cabang.alamat;
              this.cabang.nomor = cabang.nomor;
              this.state = false;
            },
            async deleteCabang(id_cabang) {
           
                try {
                    await Controller.deleteCabang(id_cabang)
                    //alert("Register berhasil !!")
                    console.log("Success")
                    this.showCabang();
                    
                    
                } catch (err) {
                    console.log(err)
                }
            },
            clearForm() {
              this.edit = false;
              this.cabang.id_cabang = '';
              this.cabang.nama_cabang = '';
              this.cabang.nomor = '';
              this.cabang.alamat = '';
            },
        }
    }
</script>