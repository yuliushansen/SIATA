<template>
    <div class="text-light">
        <nav class="navbar navbar-expand-lg navbar-dark"  style="background-color:#2d4059;">
            <a class="navbar-brand uppercase" href="#/dashboard"><h2>{{this.$auth.user().username}}</h2></a>              
        </nav>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar -->
            <div class="border-right" id="sidebar-wrapper" style="background-color:#00adb5;">
            <div class="list-group list-group-flush">
                <router-link v-if="this.$auth.user().id_akun===1" :to="{ name: 'register' }" class="list-group-item list-group-item-action text-light" style="background-color:#00adb5;">Kelola Akun Pegawai</router-link>
                <router-link v-if="this.$auth.user().id_akun===1" :to="{ name: 'pegawai' }" style="background-color:#00adb5;" class="list-group-item list-group-item-action text-light">Kelola Pegawai</router-link>
                <router-link :to="{ name: 'pelanggan' }" style="background-color:#00adb5;" class="list-group-item list-group-item-action text-light">Kelola Pelanggan</router-link>
                <router-link :to="{ name: 'motor' }" style="background-color:#00adb5;" class="list-group-item list-group-item-action text-light">Kelola Motor Pelanggan</router-link>
                <router-link :to="{ name: 'transaksi' }" style="background-color:#00adb5;" class="list-group-item list-group-item-action text-light">Kelola Transaksi</router-link>
                <router-link :to="{ name: 'tampilservice' }" style="background-color:#00adb5;" class="list-group-item list-group-item-action text-light">Tampil Status Service</router-link>
                <router-link :to="{ name: 'pembayaran' }" style="background-color:#00adb5;" class="list-group-item list-group-item-action text-light">Kelola Pembayaran</router-link>
                <router-link :to="{ name: 'pengadaan' }" style="background-color:#00adb5;" class="list-group-item list-group-item-action text-light">Kelola Pengadaan</router-link>
                <router-link :to="{ name: 'historypengadaan' }" style="background-color:#00adb5;" class="list-group-item list-group-item-action text-light">History Pengadaan</router-link>
                <router-link :to="{ name: 'jasa_service' }" class="list-group-item list-group-item-action text-light"  style="background-color:#00adb5;">Kelola Jasa Service</router-link>
                <router-link :to="{ name: 'sparepart' }" style="background-color:#00adb5;" class="list-group-item list-group-item-action text-light">Kelola Sparepart</router-link>
                <router-link :to="{ name: 'cabang' }" style="background-color:#00adb5;" class="list-group-item list-group-item-action text-light">Kelola Cabang</router-link>
                <router-link :to="{ name: 'supplier' }" style="background-color:#00adb5;" class="list-group-item list-group-item-action text-light">Kelola Supplier</router-link>
                <router-link :to="{ name: 'laporan' }" style="background-color:#00adb5;" class="list-group-item list-group-item-action text-light">Laporan</router-link>
                <a @click="$auth.logout()" class="list-group-item list-group-item-action " style="background-color:#00adb5;" >Logout</a>
                
            </div>
            </div>
        <!-- register -->
        <div class="container-fluid" id="register">
        <h3 class="row ml-4 mt-4" style="color: #2d4059;">Akun</h3>
            <div class="row ml-4 mt-4 mr-4">
                <div class="col shadow-sm p-3 mb-5 rounded col-3 ml-2 " style="background-color:#2d4059;">
                    <form  @submit.prevent="register" class="form-horizontal"  role="form">
                    <h3>Form</h3><hr class="bg-light">
                    <!-- <div class="alert alert-success" role="alert" v-if="state">
                            Registrasi Berhasil
                    </div> -->
                        <!-- <div class="form-group">
                            <label for="id_pegawai">Id Pegawai</label>
                            <input id="id_pegawai" type="number" class="form-control" name="id_pegawai" v-model="id_pegawai" required autofocus>
                        </div> -->
                        <div class="form-group">
                            <label for="id_pegawai">Pegawai</label>
                            <select name="pegawai" class="custom-select" id="inputGroupSelect01" v-model="akun1.id_pegawai">
                                <!-- <option selected>Pilih...</option> -->
                                <option v-for="pegawai of pegawais" v-bind:key="pegawai['key']" :value=pegawai.id_pegawai>{{pegawai.nama}}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input id="username" type="text" class="form-control" name="username" v-model="akun1.username" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input id="password" type="password" class="form-control" v-model="akun1.password" name="password" required>
                        </div>
                        
                        <button type="submit" class="btn text-light" style="background-color:#00adb5;" name="tambah">Register</button>
                    </form>
                </div>
                <div class="col shadow-sm p-3 mb-5 rounded ml-2" style="background-color:#2d4059;">
            <div class="row">
            <h3 class="col">Table</h3>
            <label class="mr-3" for="Search"><h4>Search</h4></label>
                <input type="text" @keyup="showAkun()" placeholder="Username" name="search" class="tombol col-3 mb-3 mr-3 form-control" v-model="search">
            </div>
            <table class="table text-light ">
                <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Pegawai</th>
                    <th scope="col">Username</th>
                    <th scope="col">Metode</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(akun,index) of akuns.data" v-bind:key="akun['key']">
                    <td>{{index+1}}</td>
                    <td>{{akun.pegawai.nama}}</td>
                    <td>{{akun.username}}</td>
                    <td>
                        <button type="button" class="btn btn-success" @click="editAkun(akun)"><i class="fas fa-edit"></i></button>
                        <button type="button" class="btn btn-danger" @click="deleteAkun(akun.id_akun)"><i class="far fa-trash-alt"/></button>
                    </td>
                </tr>
                </tbody>
            </table>
                      <nav v-cloak>
                    <p>Current Page: {{akuns.meta.current_page}}</p>
						<ul class="pagination row mx-md-n5">
							<li  class="col px-md-5" v-if="akuns.links.prev">
								<a @click.prevent="getakun(akuns.links.prev)" :href="akuns.links.prev"><i class="fas fa-arrow-left"></i></a>
							</li>
							<li  class="col px-md-5"  v-if="akuns.links.next">
								<a @click.prevent="getakun(akuns.links.next)" :href="akuns.links.next"><i style="font-size=100;" class="fas fa-arrow-right"></i></a>
							</li>
						</ul>	
					</nav>
            </div>
            </div>
        </div>
        <!-- register -->
        </div>
    </div>
</template>

<script>
import Controller from '../httpController.js'
export default {
    data(){
        return{
            id_akun:'',
            id_pegawai: '',
            edit: false,
            username: '',
            password: '',  
            tampung: [],
            tampung2: [],
            pegawais: [], 
            akuns: [],
            search: '',
            search2: '',
            akun: {
                id_akun: '',
                id_pegawai: '',
                username: '',
                password: '',
                pegawai:[],
            },
            akun1: {
                id_akun: '',
                id_pegawai: '',
                username: '',
                password: '',
            },       
        }
    },
    created() {
            this.showPegawai();
            this.showAkun();
    },
    methods:{
        async getakun(url){
                
                try {
                    this.tampung = await Controller.getakun(url);
                    this.akuns = this.tampung.data;
                    // this.tampung = 
                    //alert("Register berhasil !!")
                    // this.pegawais = this.tampung.data;
                    
                    
                    
                } catch (err) {
                    console.log(err)
                    
                }
                
            },
        async register(){
             if (this.edit === false) {
                try {
                    await Controller.register(this.akun1.id_pegawai,this.akun1.username,this.akun1.password)
                    //alert("Register berhasil !!")
                    console.log("Success")
                    this.showAkun();
                    this.clearForm()
                } catch (err) {
                    console.log(err)
                    alert("Pegawai telah memiliki Akun");
                    this.clearForm();
                }
            }
            else{
                try {
                    await Controller.editAkun(this.akun1.id_akun,this.akun1)
                    //alert("Register berhasil !!")
                    console.log("Success")
                    this.clearForm();
                    // alert('Article Updated');
                    this.showAkun();
                    this.stateEdit = true;
                    
                } catch (err) {
                    console.log(err)
                }
            }
                
        },
        async showAkun(){
                
                try {

                    this.tampung2 = await Controller.getAkun(this.search);
                    //alert("Register berhasil !!")
                    this.akuns = this.tampung2.data;
                    console.log(this.akuns.links.next)
                    
                    
                } catch (err) {
                    console.log(err)
                }
                
            },
        async showPegawai(){
                
                try {
                    
                  this.tampung = await Controller.getPegawaiAll();
                  //alert("Register berhasil !!")
                  this.pegawais = this.tampung.data;
                  console.log(this.tampung)
                            
                              
                } catch (err) {
                    console.log(err)

                }
        },
        editAkun(akun) {
              this.edit = true;
              this.akun1.id_akun = akun.id_akun;
              this.akun1.id_pegawai = akun.id_pegawai;
              this.akun1.username = akun.username;
              this.akun1.password = (akun.password);
              
              //console.log(this.mobil.image);
              this.state = false;
            },
            async deleteAkun(id_akun) {
           
                try {
                    await Controller.deleteAkun(id_akun)
                    //alert("Register berhasil !!")
                    console.log("Success")
                    this.showAkun();
                    
                    
                } catch (err) {
                    console.log(err)
                }
            },
            clearForm() {
              this.edit = false;
              this.akun1.id_pegawai = '';
              this.akun1.username = '';
              this.akun1.password = '';
            },
        
    }
}
</script>