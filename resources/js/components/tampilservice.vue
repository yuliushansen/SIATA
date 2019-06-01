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
        <div class="row">
            <h3 class="col ml-4 mt-5" style="color: #2d4059;">Tampil Status Service</h3>
        </div>
        <div class="row ml-4 mt-4 mr-4"  id="register">
            <!-- table -->
            <div class="col shadow-sm p-3 mb-5 rounded ml-2" style="background-color:#2d4059;">
            <div class="row">
            <h3 class="col">Table</h3>
            <!-- <div class="col"> -->
                <label class="mr-3" for="Search"><h4>Search</h4></label>
                <input type="text" @keyup="showService()" placeholder="ID TRANSAKSI" name="search" class="tombol col-3 mb-3 mr-3 form-control" v-model="search">
            <!-- </div> -->
            
            </div>
            <table class="table text-light ">
                <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Id Transaksi</th> 
                    <th scope="col">Tanggal</th>
                    <th scope="col">Nomor Polisi</th>
                    <th scope="col">Nama Service</th>
                    <th scope="col">Status Service</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(servis,index) of service.data" v-bind:key="servis['key']">
                    <td>{{index+1}}</td>
                    <td>{{servis.id_transaksi}}</td>
                    <td>{{new Date(servis.tanggal).toLocaleDateString("en-GB", {year: 'numeric', month: 'long', day: 'numeric'})}}</td>
                    <td>
                        <template v-for="(motor) of servis.service">
                            <li v-bind:key="motor['key']">{{motor.detail.motor.nomor_polisi}}</li>
                        </template>
                    </td>  
                    <td>
                        <template v-for="(motor) of servis.service">
                            <li v-bind:key="motor['key']">{{motor.jasa.nama_jasa}}</li>
                        </template>
                    </td>  
                    <td>
                        <template v-for="(motor) of servis.service">
                            <li v-bind:key="motor['key']">{{motor.status_service}}</li>
                        </template>
                    </td>  
                </tr>
                </tbody>
            </table>
            <nav v-cloak>
                    <p>Current Page: {{service.meta.current_page}}</p>
						<ul class="pagination row mx-md-n5">
							<li  class="col px-md-5" v-if="service.links.prev">
								<a @click.prevent="gettransaksi(service.links.prev)" :href="service.links.prev"><i class="fas fa-arrow-left"></i></a>
							</li>
							<li  class="col px-md-5"  v-if="service.links.next">
								<a @click.prevent="gettransaksi(service.links.next)" :href="service.links.next"><i style="font-size=100;" class="fas fa-arrow-right"></i></a>
							</li>
						</ul>	
					</nav>
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
                tampung:'',
                service:'',
                search:'',
            }
                
        },
        created() {
            this.showService();
            
        },
        
        methods:{
            async gettransaksi(url){
                
                try {
                    this.tampung = await Controller.gettransaksi(url);
                    this.service = this.tampung.data;
                    // this.tampung = 
                    //alert("Register berhasil !!")
                    // this.pegawais = this.tampung.data;
                    
                    
                    
                } catch (err) {
                    console.log(err)
                }
                
            },
            async showService(){
                
                try {

                    this.tampung = await Controller.getTampilService(this.search);
                    //alert("Register berhasil !!")
                    this.service = this.tampung.data;
                    console.log(this.service)
                    
                    
                } catch (err) {
                    console.log(err)
                }
                
            },
            
        }
    }
</script>