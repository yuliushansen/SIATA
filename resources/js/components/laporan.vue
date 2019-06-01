<template>
<div class="text-light">
  <nav class="navbar navbar-expand-lg navbar-dark"  style="background-color:#2d4059;">
    <a class="navbar-brand uppercase" href="#/dashboard"><h2>{{this.$auth.user().username}}</h2></a>              
  </nav>
  <div class="d-flex" id="wrapper">
      <!-- Sidebar -->
      <div class="border-right" id="sidebar-wrapper" style="background-color:#00adb5;">
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
          <a @click="$auth.logout()" style="background-color:#00adb5;" class="list-group-item list-group-item-action ">Logout</a>
          
        </div>
      </div>
       <div class="container-fluid" >
        <h3 class="row ml-4 mt-4" style="color: #2d4059;">Laporan</h3>
        <div class="row ml-4 mt-4 mr-4"  id="register">
            
            <!-- form -->
            <div class="col shadow-sm p-3 mb-5 rounded col-3 ml-2 " style="background-color:#2d4059;">
            <h3>Laporan Pendapatan Tahunan</h3><hr class="bg-light">
            <router-link class="static-bottom float-right" :to="{ name: 'pendapatanbycabang'}" ><button type="button" class="btn text-light" style="background-color:#00adb5;">Tampil Laporan <i class="fa fa-print"/></button></router-link>
            
            </div>
            <div class="col shadow-sm p-3 mb-5 rounded col-3 ml-2 " style="background-color:#2d4059;">
            <h3>Laporan Pendapatan Bulanan</h3><hr class="bg-light">
            <form  @submit.prevent="coba" class="form-horizontal ml-1"  role="form">
                <div class="form-group">
                    <label for="nama_jasa">Tahun</label>
                    <input id="nama_jasa" type="text" class="form-control" name="nama_jasa" v-model="laporanperbulan" required autofocus>
                </div>
                <button type="submit" class="btn text-light float-right" style="background-color:#00adb5;">Tampil Laporan <i class="fa fa-print"/></button>
            </form>
            </div>
            <div class="col shadow-sm p-3 mb-5 rounded col-3 ml-2 " style="background-color:#2d4059;">
            <h3>Laporan Pengeluaran</h3><hr class="bg-light">
            <form  @submit.prevent="laporanpengeluaran" class="form-horizontal ml-1"  role="form">
                <div class="form-group">
                    <label for="nama_jasa">Tahun</label>
                    <input id="nama_jasa" type="text" class="form-control" name="nama_jasa" v-model="laporanpengeluarans" required autofocus>
                </div>
                <button type="submit" class="btn text-light float-right" style="background-color:#00adb5;">Tampil Laporan <i class="fa fa-print"/></button>
            </form>
            </div>
        </div>
        <div class="row ml-4 mt-4 mr-4"  id="register">
            
            <!-- form -->
            <div class="col shadow-sm p-3 mb-5 rounded col-3 ml-2 " style="background-color:#2d4059;">
            <h3>Laporan Sparepart Terlaris</h3><hr class="bg-light">
            <form  @submit.prevent="sparepartterlaris" class="form-horizontal ml-1"  role="form">
                <div class="form-group">
                    <label for="nama_jasa">Tahun</label>
                    <input id="nama_jasa" type="text" class="form-control" name="nama_jasa" v-model="sparepartterlariss" required autofocus>
                </div>
                <button type="submit" class="btn text-light float-right" style="background-color:#00adb5;">Tampil Laporan <i class="fa fa-print"/></button>
            </form>
            </div>
            <div class="col shadow-sm p-3 mb-5 rounded col-3 ml-2 " style="background-color:#2d4059;">
            <h3>Laporan Penjualan Jasa</h3><hr class="bg-light">
            <form  @submit.prevent="laporanjasa" class="form-horizontal ml-1"  role="form">
                <div class="form-group">
                    <label for="nama_jasa">Tahun</label>
                    <input id="nama_jasa" type="text" class="form-control" name="nama_jasa" v-model="tahun_jasa" required autofocus>
                </div>
                <div class="form-group">
                    <label for="jenis_transaksi">Bulan</label>
                    <select name="jenis_transaksi" class="custom-select" id="inputGroupSelect01" v-model="bulan_jasa">
                        <option value="January">January</option>
                        <option value="February">February</option>
                        <option value="March">March</option>
                        <option value="April">April</option>
                        <option value="May">May</option>
                        <option value="June">June</option>
                        <option value="July">July</option>
                        <option value="August">August</option>
                        <option value="September">September</option>
                        <option value="October">October</option>
                        <option value="November">November</option>
                        <option value="December">December</option>
                    </select>
                </div>
                <button type="submit" class="btn text-light float-right" style="background-color:#00adb5;">Tampil Laporan <i class="fa fa-print"/></button>
            </form>
            </div>
            <div class="col shadow-sm p-3 mb-5 rounded col-3 ml-2 " style="background-color:#2d4059;">
            <h3>Laporan Sisa Stok Sparepart</h3><hr class="bg-light">
            <form  @submit.prevent="laporanstok" class="form-horizontal ml-1"  role="form">
                <div class="form-group">
                    <label for="nama_jasa">Tahun</label>
                    <input id="nama_jasa" type="text" class="form-control" name="nama_jasa" v-model="tahun_stok" required autofocus>
                </div>
                <div class="form-group">
                    <label for="jenis_transaksi">Tipe Sparepart</label>
                    <select name="jenis_transaksi" class="custom-select" id="inputGroupSelect01" v-model="tipe_stok">
                        <option v-for="sparepart of spareparts" v-bind:key="sparepart['key']" :value=sparepart.tipe_sparepart>{{sparepart.tipe_sparepart}}</option>
                    </select>
                </div>
                <button type="submit" class="btn text-light float-right" style="background-color:#00adb5;">Tampil Laporan <i class="fa fa-print"/></button>
            </form>
            </div>
        </div>
       </div>
  </div>
</div>
</template>

<script>
import Controller from '../httpController';

export default {
    data(){
        return{
            laporanperbulan:'',
            laporanpengeluarans:'',
            sparepartterlariss:'',
            tahun_jasa:'',
            bulan_jasa:'',
            tahun_stok:'',
            bulan_stok:'',
            spareparts:'',
        }
    },
    created() {
        this.getSparepart();
    },
    methods:{
        async coba(){
            this.$router.push({ name: 'pendapatanbulanan',  params: { id: this.laporanperbulan } })
        },
        async laporanpengeluaran(){
            this.$router.push({ name: 'pengeluaran',  params: { id: this.laporanpengeluarans } })
        },
        async sparepartterlaris(){
            this.$router.push({ name: 'sparepartterlaris',  params: { id: this.sparepartterlariss } })
        },
        async laporanjasa(){
            this.$router.push({ name: 'laporanservice',  params: { tahun: this.tahun_jasa, bulan: this.bulan_jasa } })
        },
        async laporanstok(){
            this.$router.push({ name: 'sisastok',  params: { tahun: this.tahun_stok, tipe: this.tipe_stok } })
        },
        async getSparepart(){
                
                try {

                    this.tampung = await Controller.getsparepart();
                    //alert("Register berhasil !!")
                    this.spareparts = this.tampung.data;
                    console.log(this.spareparts)
                    
                    
                } catch (err) {
                    console.log(err)
                }
                
            },
    }
}
</script>
