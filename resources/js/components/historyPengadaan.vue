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
            <h3 class="col ml-4 mt-5" style="color: #2d4059;">Pengadaan</h3>
            <div class="col-lg-1 mr-5">

            <button type="button" @click="OpenAdd()" class="btn btn-lg btn-success mt-4 ml-5"><i class="fas fa-plus"></i> Add</button>
            </div>
        </div>
        <div class="row ml-4 mt-4 mr-4"  id="register">
            <!-- table -->
            <div class="col shadow-sm p-3 mb-5 rounded ml-2" style="background-color:#2d4059;">
            <div class="row">
            <h3 class="col">Table</h3>
            <!-- <div class="col"> -->
                <label class="mr-3" for="Search"><h4>Search</h4></label>
                <input type="text" @keyup="showPengadaan()" placeholder="ID Pengadaan" name="search" class="tombol col-3 mb-3 mr-3 form-control" v-model="search">
            <!-- </div> -->
            
            </div>
            <table class="table text-light ">
                <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Id Pengadaan</th> 
                    <th scope="col">Nama CS</th>
                    <th scope="col">Nama Sales</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Detail Pengadaan</th>
                    <th scope="col">Total Harga</th>
                    <th scope="col">Status Pengadaan</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(pengadaan,index) of pengadaans.data" v-bind:key="pengadaan['key']">
                    <td>{{index+1}}</td>
                    <td>{{pengadaan.id_transaksi_pengadaan}}</td>
                    <td>
                        {{pengadaan.cs.nama}}
                    </td>
                    <td>{{pengadaan.supplier.nama_sales}}</td>
                    <td>{{new Date(pengadaan.tanggal).toLocaleDateString("en-GB", {year: 'numeric', month: 'long', day: 'numeric'})}}</td>
                    <td>
                        <button type="button" class="btn btn-primary" @click="OpenDetail(pengadaan)"><i class="far fa-eye"></i></button>
                    </td>
                    <td>{{pengadaan.total_harga}}</td>
                    <td>{{pengadaan.status_pengadaan}}</td>
                    
                    
                </tr>
                </tbody>
            </table>
            <nav v-cloak>
                    <p>Current Page: {{pengadaans.meta.current_page}}</p>
						<ul class="pagination row mx-md-n5">
							<li  class="col px-md-5" v-if="pengadaans.links.prev">
								<a @click.prevent="getpengadaan(pengadaans.links.prev)" :href="pengadaans.links.prev"><i class="fas fa-arrow-left"></i></a>
							</li>
							<li  class="col px-md-5"  v-if="pengadaans.links.next">
								<a @click.prevent="getpengadaan(pengadaans.links.next)" :href="pengadaans.links.next"><i style="font-size=100;" class="fas fa-arrow-right"></i></a>
							</li>
						</ul>	
					</nav>
            </div>
            </div>
            <!-- table -->
        </div>
        <!-- register -->
        </div>

         <!-- Modal Detail -->
        <div class="modal fade bd-example-modal-lg"  id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-lg-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-dark" id="exampleModalLabel">Detail Pengadaan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-dark" style="overflow-x: auto;" >
          <!-- body -->
              <div class="table-responsive">

        <table class="table table-sm text-dark ">
                <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Id Detail Pengadaan</th> 
                    <th scope="col">Nama Sparepart</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Jumlah Datang</th>
                    <th scope="col">Harga Beli</th>
                    <th scope="col">Harga Jual</th>
                    <th scope="col">Sub Total</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(detail,index) of tampung_detail_pengadaan" v-bind:key="detail['key']">
                    <td>{{index+1}}</td>
                    <td>{{detail.id_detail_pengadaan}}</td>
                    <td>{{detail.sparepart.nama_sparepart}}</td>
                    <td>{{detail.jumlah}}</td>
                    <td>{{detail.jumlah_datang}}</td>
                    <td>{{detail.harga_beli}}</td>
                    <td>{{detail.harga_jual}}</td>
                    <td>{{detail.sub_total}}</td>
                    
                </tr>
                </tbody>
            </table>
            
          </div>
            <!-- body -->
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button> -->
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
                tampung:'',
                pengadaans:'',
                search:'',
                tampung_detail_pengadaan:'',
                tampung_pengadaan : '',
            }
                
        },
        created() {
            this.showPengadaan();
            
        },
        
        methods:{
            async showPengadaan(){
                
                try {

                    this.tampung = await Controller.getHistoryPengadaan(this.search);
                    //alert("Register berhasil !!")
                    this.pengadaans = this.tampung.data;
                    console.log(this.pengadaans)
                    
                    
                } catch (err) {
                    console.log(err)
                }
                
            },
            async OpenDetail(index) {
                
                this.tampung_detail_pengadaan=index.pengadaan
                this.tampung_pengadaan = index
                //console.log(this.tampung_transaksi)
                $('#exampleModal').modal('show')
            },
            
        }
    }
</script>