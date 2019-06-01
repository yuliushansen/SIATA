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
            <h3 class="col ml-4 mt-5" style="color: #2d4059;">Pembayaran</h3>
            <div class="col-lg-1 mr-5">

            
            </div>
        </div>
        <div class="row ml-4 mt-4 mr-4"  id="register">
            <!-- table -->
            <div class="col shadow-sm p-3 mb-5 rounded ml-2" style="background-color:#2d4059;">
            <div class="row">
            <h3 class="col">Table</h3>
            <!-- <div class="col"> -->
                <label class="mr-3" for="Search"><h4>Search</h4></label>
                <input type="text" @keyup="showTransaksi()" placeholder="ID TRANSAKSI" name="search" class="tombol col-3 mb-3 mr-3 form-control" v-model="search">
            <!-- </div> -->
            
            </div>
            <table class="table text-light ">
                <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Id Transaksi</th> 
                    <!-- <th scope="col">Nama Cabang</th>
                    <th scope="col">Nama Kasir</th>
                    <th scope="col">Nama CS</th> -->
                    <th scope="col">Tanggal Transaksi</th>
                    <th scope="col">Jenis Transaksi</th>
                    <th scope="col">Nama Pelanggan</th>
                    <th scope="col">Detail Transaksi</th>
                    <th scope="col">Total Harga</th>
                    <th scope="col">Status Transaksi</th>
                    <th scope="col">Metode</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(transaksi,index) of transaksis.data" v-bind:key="transaksi['key']">
                    <td>{{index+1}}</td>
                    <td>{{transaksi.id_transaksi}}</td>
                    <!-- <td>
                        {{transaksi.cabang.nama_cabang}}
                    </td>
                    <td>{{transaksi.kasir.nama}}</td>
                    <td>{{transaksi.cs.nama}}</td> -->
                    <td>{{new Date(transaksi.tanggal).toLocaleDateString("en-GB", {year: 'numeric', month: 'long', day: 'numeric'})}}</td>
                    <td>{{transaksi.jenis_transaksi}}</td>
                    <td>{{transaksi.pelanggan.nama_pelanggan}}</td>
                    <td>
                        <button type="button" class="btn btn-primary" @click="OpenDetail(transaksi)"><i class="far fa-eye"></i></button>
                    </td>
                    <td>{{transaksi.total_harga}}</td>
                    <td>{{transaksi.status_transaksi}}</td>
                    <td>
                         <router-link  v-if="transaksi.status_transaksi === 'Lunas'" :to="{ name: 'nota', params: { id: transaksi.id_transaksi } }" ><button type="button" class="btn btn-primary"><i class="fa fa-print"/></button></router-link>
                        <button v-else-if="transaksi.status_transaksi === 'Belum Lunas'" type="button" class="btn btn-success" @click="Bayar(transaksi)"><b>Bayar</b></button>
                    </td>
                    
                </tr>
                </tbody>
            </table>
            <nav v-cloak>
                    <p>Current Page: {{transaksis.meta.current_page}}</p>
						<ul class="pagination row mx-md-n5">
							<li  class="col px-md-5" v-if="transaksis.links.prev">
								<a @click.prevent="gettransaksi(transaksis.links.prev)" :href="transaksis.links.prev"><i class="fas fa-arrow-left"></i></a>
							</li>
							<li  class="col px-md-5"  v-if="transaksis.links.next">
								<a @click.prevent="gettransaksi(transaksis.links.next)" :href="transaksis.links.next"><i style="font-size=100;" class="fas fa-arrow-right"></i></a>
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
        <h5 class="modal-title text-dark" id="exampleModalLabel">Detail Transaksi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-dark" style="overflow-x: auto;" >
          <!-- body -->
              <div class="table-responsive" v-if="tampung_transaksi.jenis_transaksi ==='SV' || this.tampung_transaksi.jenis_transaksi ==='SS'">
       <h3>Detail Service</h3>

        <table class="table table-sm text-dark ">
                <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Id Service</th> 
                    <th scope="col">Nama Montir</th>
                    <th scope="col">Nomor Plat</th>
                    <th scope="col">Nama Jasa</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Sub Total</th>
                    <th scope="col">Status Service</th>
                </tr>
                </thead>
                <tbody v-if="tampung_services !== null" >
                <tr v-for="(service,index) of tampung_services" v-bind:key="service['key']">
                    <td>{{index+1}}</td>
                    <td>{{service.id_transaksi_service}}</td>
                    <td>{{service.montir.nama}}</td>
                    <td>{{service.detail.motor.nomor_polisi}}</td>
                    <td>{{service.jasa.nama_jasa}}</td>
                    <td>{{service.jumlah_jasa}}</td>
                    <td>{{service.sub_total}}</td>
                    <td>{{service.status_service}}</td>
                </tr>
                </tbody>
            </table>
            
          </div>
              <div class="table-responsive" v-if="tampung_transaksi.jenis_transaksi ==='SP' || tampung_transaksi.jenis_transaksi ==='SS'">
          <h3>Detail Penjualan</h3>

        <table class="table table-sm text-dark ">
                <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Id Penjualan</th> 
                    <th scope="col">Nama Sparepart</th>
                    <th scope="col">Nomor Plat</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Sub Total</th>
                </tr>
                </thead>
                <tbody v-if="tampung_penjualans !== null" >
                <tr v-for="(penjualan,index) of tampung_penjualans" v-bind:key="penjualan['key']">
                    <td>{{index+1}}</td>
                    <td>{{penjualan.id_transaksi_penjualan}}</td>
                    <td>{{penjualan.sparepart.nama_sparepart}}</td>
                    <td>{{penjualan.detail.motor.nomor_polisi}}</td>
                    <td>{{penjualan.jumlah_sparepart}}</td>
                    <td>{{penjualan.sub_total}}</td>
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

<!-- Modal Edit -->
<div class="modal fade bd-example-modal-lg" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-lg-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-dark" id="exampleModalLabel">Edit Transaksi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form @submit.prevent="SuperBayar" class="form-horizontal ml-1" role="form">
      <div class="modal-body text-dark">
            <div class="form-group">
                <label for="nama_jasa">Total Harga</label>
                <input id="nama_jasa" type="text" class="form-control" name="nama_jasa" v-model="transaksiBayar.total_harga" required readonly>
            </div>
            <div class="form-group">
                <label for="nama_jasa">Discount</label>
                <input id="nama_jasa" type="text" class="form-control" name="nama_jasa" @keyup="hitung()" v-model="PembayaranTransaksi.discount" required autofocus>
            </div>
            <div class="form-group">
                <label for="nama_jasa">Total Harga Sesudah Discount</label>
                <input id="nama_jasa" type="text" class="form-control" name="nama_jasa" v-model="supertotal" required readonly>
            </div>
            <div class="form-group">
                <label for="nama_jasa">Jumlah Uang</label>
                <input id="nama_jasa" type="text" class="form-control" name="nama_jasa"  @keyup="hitungKembalian()" v-model="PembayaranTransaksi.jumlah_uang" required autofocus>
            </div>
            <div class="form-group">
                <label for="nama_jasa">Kembalian</label>
                <input id="nama_jasa" type="text" class="form-control" name="nama_jasa" v-model="PembayaranTransaksi.kembalian" required readonly>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        
      </div>
      
        </form>
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
                tampung_transaksi:[],
                harga:'',
                id_ts:'',
                ds_adds: [],
                dp_adds: [],
                ds_edits: [],
                dp_edits: [],
                jasa:[],
                sparepart:[],
                harga_jasa:'',
                id_motor:'',
                id_detail:'',
                id_montir:'',
                id_transaksi:'',
                sub_total:'',
                jumlah_jasa:'',
                jumlah_sparepart:'',
                status_service:'Belum Selesai',
                dp_add:{},
                motorpelanggan:[],
                Kasirs:[],
                Kasir:{
                    id_pegawai:'',
                    nama:'',
                },
                pegawai_cabang:'',
                Pelanggans:[],
                Pelanggan:{
                    id_pelanggan:'',
                    nama_pelanggan:'',
                },
                cs:'',
                transaksis: [],
                transaksi: {
                    id_transaksi: '',
                    id_jasa: '',
                    id_cabang: '',
                    id_kasir: '',
                    id_cs: '',
                    id_pelanggan: '',
                    jenis_transaksi: '',
                    tanggal: '',
                    status_transaksi: '',
                    total_harga: '',
                    cabang:[],
                    kasir:[],
                    cs:[],
                    pelanggan:[],
                },
                transaksi_add: {
                    id_transaksi: '',
                    id_cabang: '',
                    id_kasir: '',
                    id_cs: '',
                    id_pelanggan: '',
                    jenis_transaksi: '',
                    tanggal: '',
                    status_transaksi: '',
                    total_harga: '',
                },
                transaksi_edit: {
                    id_transaksi: '',
                    id_cabang: '',
                    id_kasir: '',
                    id_cs: '',
                    id_pelanggan: '',
                    jenis_transaksi: '',
                    tanggal: '',
                    status_transaksi: '',
                    total_harga: '',
                },
                tampung_services:[],
                tampung_penjualans:[],
                tanggal:'',
                service:{
                    id_transaksi_service:'',
                    id_detail:'',
                    id_jasa:'',
                    id_montir:'',
                    id_transaksi:'',
                    sub_total:'',
                    jumlah_jasa:'',
                    status_service:'',
                    detail:{
                        motor:{
                            nomor_polisi:'',
                        }
                    },
                    jasa:[],
                    montir:[],
                },
                penjualan:{
                    id_transaksi_penjualan:'',
                    id_detail:'',
                    id_sparepart:'',
                    id_transaksi:'',
                    sub_total:'',
                    jumlah_sparepart:'',
                    sparepart:[],
                    detail:{
                        motor:{
                            nomor_polisi:'',
                        }
                    },
                },
                id_jasa: '',
                edit: false,
                state: false,
                stateEdit: false,
                tampung: [] ,
                search: '',
                TempJumlah:'',
                transaksiBayar:'',
                supertotal:'',
                PembayaranTransaksi:{
                    id_transaksi:'',
                    discount:'',
                    kembalian:'',
                    jumlah_uang:'',
                },
            }
        },
        created() {
            this.showTransaksi();
        },
        
        methods:{
            async SuperBayar(){
                console.log(this.transaksiBayar)
                this.transaksiBayar.status_transaksi = "Lunas"
                await Controller.postPembayaran(this.PembayaranTransaksi);
                await Controller.editTransaksi(this.transaksiBayar.id_transaksi,this.transaksiBayar);
                this.showTransaksi();
                $('#edit').modal('hide')
                this.clear();
            },
            async clear(){
                this.PembayaranTransaksi.id_transaksi = ''
                this.PembayaranTransaksi.discount = ''
                this.PembayaranTransaksi.kembalian = ''
                this.PembayaranTransaksi.jumlah_uang = ''
                this.supertotal = ''
            },
            async hitung(){
                this.supertotal = this.transaksiBayar.total_harga - this.PembayaranTransaksi.discount
            },
            async hitungKembalian(){
                this.PembayaranTransaksi.kembalian = this.PembayaranTransaksi.jumlah_uang - this.supertotal
            },
            async Bayar(transaksi){
                $('#edit').modal('show')
                this.transaksiBayar = transaksi;
                this.PembayaranTransaksi.id_transaksi=this.transaksiBayar.id_transaksi;
            },
           
            
            async showTransaksi(){
                
                try {

                    this.tampung = await Controller.getTransaksi(this.search);
                    //alert("Register berhasil !!")
                    this.transaksis = this.tampung.data;
                    //console.log(this.transaksis)
                    
                    
                } catch (err) {
                    console.log(err)
                }
                
            },
           
            async gettransaksi(url){
                
                try {
                    this.tampung = await Controller.gettransaksi(url);
                    this.transaksis = this.tampung.data;
                    // this.tampung = 
                    //alert("Register berhasil !!")
                    // this.pegawais = this.tampung.data;
                    
                    
                    
                } catch (err) {
                    console.log(err)
                }
                
            },
            async OpenDetail(index) {
                
                this.tampung_services=index.service
                this.tampung_penjualans=index.penjualan
                this.tampung_transaksi = index
                //console.log(this.tampung_transaksi)
                $('#exampleModal').modal('show')
            }, 
            
        }
    }
</script>