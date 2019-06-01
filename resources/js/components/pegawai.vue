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
        <h3 class="row ml-4 mt-4" style="color: #2d4059;">Pegawai</h3>
        <div class="row ml-4 mt-4 mr-4"  id="register">
            
            <!-- form -->
            <div class="col shadow-sm p-3 mb-5 rounded col-3 ml-2 " style="background-color:#2d4059;">
            <h3>Form</h3><hr class="bg-light">
            
            <form  @submit.prevent="addPegawai" class="form-horizontal ml-1"  role="form">
                <!-- <div class="alert alert-success" role="alert" v-if="state">
                        Registrasi Berhasil
                </div> -->
                <div class="form-group">
                    <label for="id_cabang">Cabang</label>
                    <select name="cabang" class="custom-select" id="inputGroupSelect01" v-model="pegawai.id_cabang">
                        <!-- <option selected>Pilih...</option> -->
                        <option v-for="cabang of cabangs" v-bind:key="cabang['key']" :value=cabang.id_cabang>{{cabang.nama_cabang}}</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="nama">Nama Pegawai</label>
                    <input id="nama" type="text" class="form-control" name="nama" v-model="pegawai.nama" required autofocus>
                </div>
                <div class="form-group">
                    <label for="role">Role</label>
                    <select name="role" class="custom-select" id="inputGroupSelect01" v-model="pegawai.role">
                        <!-- <option selected>Pilih...</option> -->
                        <option value="Kasir">Kasir</option>
                        <option value="CS">CS</option>
                        <option value="Montir">Montir</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input id="alamat" type="text" class="form-control" name="alamat" v-model="pegawai.alamat" required autofocus>
                </div>
                <div class="form-group">
                    <label for="nomor">Telepon Pegawai</label>
                    <input id="nomor" type="number" class="form-control" name="nomor" v-model="pegawai.nomor" required autofocus>
                </div>
                <div class="form-group">
                    <label for="gaji">Gaji</label>
                    <input id="gaji" type="number" class="form-control" v-model="pegawai.gaji" name="gaji" required>
                </div>
                    
                <button type="submit" class="btn text-light" style="background-color:#00adb5;" name="tambah">Submit</button>
            </form>
            </div>
            <!-- form -->
            <!-- table -->
            <div class="col shadow-sm p-3 mb-5 rounded ml-2" style="background-color:#2d4059;">
            <div class="row">
            <h3 class="col">Table</h3>
            
                <label class="mr-3" for="Search"><h4>Search</h4></label>
                <input type="text" @keyup="showPegawai()" placeholder="Employee Name" name="search" class="tombol col-3 mb-3 mr-3 form-control" v-model="search">
            
            
            </div>
            <table class="table text-light ">
                <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">ID Pegawai</th>
                    <th scope="col">Nama Cabang</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Role</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Telepon</th>
                    <th scope="col">Gaji</th>
                    <th scope="col">Metode</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(pegawai2,index) of pegawais.data" v-bind:key="pegawai2['key']">
                    <td>{{index+1}}</td>
                    <td>{{pegawai2.id_pegawai}}</td>
                    <td>{{pegawai2.cabang.nama_cabang}}</td>
                    <td>{{pegawai2.nama}}</td>
                    <td>{{pegawai2.role}}</td>
                    <td>{{pegawai2.alamat}}</td>
                    <td>{{pegawai2.nomor}}</td>
                    <td>{{pegawai2.gaji}}</td>
                    <td>
                        <button type="button" class="btn btn-success" @click="editPegawai(pegawai2)"><i class="fas fa-edit"></i></button>
                        <button type="button" class="btn btn-danger" @click="deletePegawai(pegawai2.id_pegawai)"><i class="far fa-trash-alt"/></button>
                    </td>
                </tr>
                </tbody>
            </table>
                <nav v-cloak>
                    <p>Current Page: {{pegawais.meta.current_page}}</p>
						<ul class="pagination row mx-md-n5">
							<li  class="col px-md-5" v-if="pegawais.links.prev">
								<a @click.prevent="getpegawai(pegawais.links.prev)" :href="pegawais.links.prev"><i class="fas fa-arrow-left"></i></a>
							</li>
							<li  class="col px-md-5"  v-if="pegawais.links.next">
								<a @click.prevent="getpegawai(pegawais.links.next)" :href="pegawais.links.next"><i style="font-size=100;" class="fas fa-arrow-right"></i></a>
							</li>
						</ul>	
					</nav>
            </div>
                    
            </div>
            
        </div>
        
        </div>
    </div>
</template>

<script>
import Controller from '../httpController'
    export default{
        data(){
            return{
                pegawais: [],
                namaCabang: [],
                tampungnama:'',
                tampung3:[],
                pegawai: {
                    id_pegawai: '',
                    nama: '',
                    id_cabang: '',
                    role: '',
                    alamat: '',
                    nomor: '',
                    gaji: '',
                },
                pegawai2: {
                    id_pegawai: '',
                    nama: '',
                    id_cabang: '',
                    role: '',
                    alamat: '',
                    nomor: '',
                    gaji: '',
                    cabang: [],
                },
                id_jasa: '',
                edit: false,
                state: false,
                stateEdit: false,
                tampung: [] ,
                cabangs:[],
                cabang: {
                    nama_cabang: '',
                    id_cabang: '',
                },
                tampung2: [] ,
                search: '',
                cekHP: false,
            }
        },
        created() {
            this.showPegawai();
            this.showCabang();
        },
        methods:{
            async showPegawai(){
                
                try {

                    this.tampung = await Controller.getPegawai(this.search);
                    //alert("Register berhasil !!")
                    this.pegawais = this.tampung.data;
                    
                    console.log(this.pegawais.next_page_url)
                    
                } catch (err) {
                    console.log(err)
                }
                
            },
            async getpegawai(url){
                
                try {
                    this.tampung = await Controller.getpegawai(url);
                    this.pegawais = this.tampung.data;
                    // this.tampung = 
                    //alert("Register berhasil !!")
                    // this.pegawais = this.tampung.data;
                    
                    
                    
                } catch (err) {
                    console.log(err)
                }
                
            },
            
            async showCabang(){
                
                try {

                    this.tampung2 = await Controller.getCabangAll();
                    //alert("Register berhasil !!")
                    this.cabangs = this.tampung2.data;
                    
                    
                } catch (err) {
                    console.log(err)
                }
                
            },
            async addPegawai() {
            if (this.edit === false) {
                
                
                try {
                    console.log(this.pegawai)
                    if(this.pegawai.nomor.length !== 12){
                        alert("Nomor HP harus 12 digit");
                    } else if(this.pegawai.gaji < 1){
                        alert("Gaji tidak boleh kurang dari 1")
                    }
                    else {
                        this.cekHP = true;
                    }
                    if(this.cekHP === true){  
                    await Controller.insertPegawai(this.pegawai)
                    }
                    //alert("Register berhasil !!")
                    
                        
                    console.log("Success")
                    this.clearForm();
                    //alert('Mobil Added');
                    this.showPegawai();
                    this.state = true;
                    
                } catch (err) {
                    console.log(err)
                }
            }else{
                
                
                
                try {
                    await Controller.editPegawai(this.pegawai.id_pegawai,this.pegawai)
                    //alert("Register berhasil !!")
                    console.log("Success")
                    this.clearForm();
                    // alert('Article Updated');
                    this.showPegawai();
                    this.stateEdit = true;
                    
                } catch (err) {
                    console.log(err)
                }
            } 
            },
            editPegawai(pegawai) {
              this.edit = true;
              this.pegawai.id_pegawai = pegawai.id_pegawai;
              this.pegawai.id_cabang = pegawai.id_cabang;
              this.pegawai.nama = pegawai.nama;
              this.pegawai.role = pegawai.role;
              this.pegawai.alamat = pegawai.alamat;
              this.pegawai.nomor = pegawai.nomor;
              this.pegawai.gaji = pegawai.gaji;
              
              //console.log(this.mobil.image);
              this.state = false;
            },
            async deletePegawai(id_pegawai) {
           
                try {
                    await Controller.deletePegawai(id_pegawai)
                    //alert("Register berhasil !!")
                    console.log("Success")
                    this.showPegawai();
                    
                    
                } catch (err) {
                    console.log(err)
                }
            },
            clearForm() {
              this.edit = false;
              this.cekHP = false;
              this.pegawai.id_pegawai = '';
              this.pegawai.id_cabang = '';
              this.pegawai.nama = '';
              this.pegawai.role = '';
              this.pegawai.alamat = '';
              this.pegawai.nomor = '';
              this.pegawai.gaji = '';
            },
        }
    }
</script>