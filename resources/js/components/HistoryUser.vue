<template>
    <div class="bg-light">
        <nav class="navbar navbar-dark bg-dark">
            <a href="#/" class="navbar-brand mb-0 h1">Siata</a>
        </nav>
        <div class="container shadow-sm p-3 mt-5  rounded col-3 ml-4 bg-dark text-light">
            <h3>Form</h3><hr class="bg-light">
            
            <form  @submit.prevent="History(cari)" class="form-horizontal ml-1"  role="form">
                <!-- <div class="alert alert-success" role="alert" v-if="state">
                        Registrasi Berhasil
                </div> -->
                <div class="form-group">
                    <label for="nama_jasa">Nomor Polisi</label>
                    <input id="nama_jasa" type="text" class="form-control" name="nama_jasa" v-model="cari.nomor_polisi" required autofocus>
                </div>
                <div class="form-group">
                    <label for="harga_jasa">Nomor Telepon</label>
                    <input id="harga_jasa" type="number" class="form-control" v-model="cari.nomor_pelanggan" name="harga_jasa" required>
                </div>
                    
                <button type="submit" class="btn btn-primary text-light" name="tambah">Submit</button>
            </form>
        </div>
        <div class="row">
            <div class="col container mt-5 shadow-sm p-3 mb-5 rounded col-6 bg-dark">
                <div class="row text-light">
                    <h3 class="col">History Service</h3>
                    
                </div>
                <table class="table text-light ">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Nama Pelanggan</th>
                            <th scope="col">Nomor Plat</th>
                            <th scope="col">Nama Montir</th>
                            <th scope="col">Nama Jasa</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(transaksi_service,index) of transaksi_services.data" v-bind:key="transaksi_service['key']">
                        <td>{{index+1}}</td>
                        <td>{{new Date(transaksi_service.tanggal).toLocaleDateString("en-GB", {year: 'numeric', month: 'long', day: 'numeric'})}}</td>
                        <td>{{transaksi_service.pelanggan.nama_pelanggan}}</td>
                        <td>
                            <template v-for="(service) of transaksi_service.service">
                                <li v-bind:key="service['key']">{{service.detail.motor.nomor_polisi}}</li>
                            </template>
                        </td>         
                        <td>
                            <template v-for="(service) of transaksi_service.service">
                                <li v-bind:key="service['key']">{{service.montir.nama}}</li>
                            </template>
                        </td>         
                        <td>
                            <template v-for="(service) of transaksi_service.service">
                                <li v-bind:key="service['key']">{{service.jasa.nama_jasa}}</li>
                            </template>
                        </td>         
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="col container mt-5 shadow-sm p-3 mb-5 rounded col-5 bg-dark">
                <div class="row text-light">
                    <h3 class="col">History Penjualan</h3>
                    
                </div>
                <table class="table text-light ">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Nama Pelanggan</th>
                            <th scope="col">Nomor Plat</th>
                            <th scope="col">Sparepart</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(transaksi_penjualan,index) of transaksi_penjualans.data" v-bind:key="transaksi_penjualan['key']">
                            <td>{{index+1}}</td>
                            <td>{{new Date(transaksi_penjualan.tanggal).toLocaleDateString("en-GB", {year: 'numeric', month: 'long', day: 'numeric'})}}</td>
                            <td>{{transaksi_penjualan.pelanggan.nama_pelanggan}}</td>
                            <td>
                                <template v-for="(penjualan) of transaksi_penjualan.penjualan">
                                    <li v-bind:key="penjualan['key']">{{penjualan.detail.motor.nomor_polisi}}</li>
                                </template>
                            </td>         
                            <td>
                                <template v-for="(penjualan) of transaksi_penjualan.penjualan">
                                    <li v-bind:key="penjualan['key']">{{penjualan.jumlah_sparepart}} {{penjualan.sparepart.nama_sparepart}}</li>
                                </template>
                            </td>                 
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        
        <footer class="text-muted bg-dark" style="padding-top: 3rem; padding-bottom: 3rem;">
            <div class="container text-center">
                <span class="text-light"><h3>Atma Auto</h3></span>
                <span class="text-light"><h5 style="margin-top: 0rem;">Motorcycle Spareparts and Services</h5></span>
                <span class="text-light">Jl. Babarsari No.43,Yogyakarta (552181)</span><br>
                <span class="text-light">Telp. (0274) 487711</span>
                <p style="margin-top: 1rem;" class="text-light">Copyright &copy; 2019 PT.AtmaAuto . All rights reserved</p>
            </div>
        </footer>
    </div>
</template>
<script>
import Controller from '../httpController'
export default {
  data(){
   return{
    transaksi_services:'',
    transaksi_penjualans:'',
    mobil_id: '',
    edit: false,
    tampung: [],
    tampung2: [],
    testi:[],
    sortby:'',
    search:'',
    cari:{
        nomor_polisi:'',
        nomor_pelanggan:'',
    },
   }
  },
  created() {
      
  },
  methods: {
    async History(search){
        this.showService(search);
        this.showPenjualan(search);
    },
    async showService(search){
      try {
                    
        this.tampung = await Controller.getServicebyMotor(search.nomor_polisi,search.nomor_pelanggan);
        //alert("Register berhasil !!")
        this.transaksi_services = this.tampung.data;
        console.log(this.tampung)
                   
                    
      } catch (err) {
          console.log(err)
      }
    },
    async showPenjualan(search){
      try {
                    
        this.tampung = await Controller.getPenjualanbyMotor(search.nomor_polisi,search.nomor_pelanggan);
        //alert("Register berhasil !!")
        this.transaksi_penjualans = this.tampung.data;
        console.log(this.tampung)
                   
                    
      } catch (err) {
          console.log(err)
      }
    },
    

  }
}
</script>
