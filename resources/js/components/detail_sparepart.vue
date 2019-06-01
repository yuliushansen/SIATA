<template>
    <div class="bg-light">
        <nav class="navbar navbar-dark bg-dark">
            <a href="#/" class="navbar-brand mb-0 h1">Siata</a>
        </nav>
        <div class="container mt-5">
            <div class="">
                <div class="row">
                    <div class="col card">
                        <img class="card-img-top" style="height:600px" :src="'public/gambar/'+sparepart.gambar">
                    </div>
                    <div class="col">
                        <h5 style="color: #989898;font-size: 16px;margin:0;">{{sparepart.tipe_sparepart}}</h5>
                        <h2 style="font-family: 'Viga', sans-serif;font-size: 36px;"><b>{{sparepart.nama_sparepart}}</b></h2>
                        <h4 style="color: #989898;bottom:90px;position: absolute">Sisa Stok : {{sparepart.jumlah_sparepart}} {{sparepart.satuan_sparepart}}</h4>
                        <h6 class="card-subtitle mb-3 text-muted" style="bottom:60px;position: absolute"><small><i class="far fa-clock"></i> Last Update on {{ new Date(sparepart.updated_at).toLocaleDateString("en-US", {weekday: 'long', year: 'numeric', month: 'long', day: 'numeric'}) }}</small></h6>
                        <h3 style="font-size: 52px;font-weight: 200;color:#ff5722;bottom:0;position: absolute;"><b>Rp. {{sparepart.harga_jual}}</b></h3>
                    </div>
                </div>
            </div>
        </div>
        <footer class="text-muted" style="padding-top: 3rem; padding-bottom: 3rem;">
        <div class="container">
            
            <p style="margin-bottom: .25rem;">Copyright &copy; 2019 PT.AtmaAuto . All rights reserved</p>
        </div>
    </footer>
    </div>
</template>
<script>
import Controller from '../httpController'
export default {
    
   name: 'detail_sparepart',
   data(){
       return{
          sparepart: '',
          tampung: ''
       }
   },
   created(){
      this.showSparepart();
   },
   methods: {
    async showSparepart(){
      try {
                    
        this.tampung = await Controller.getDetSparepart(this.$route.params.id);
        //alert("Register berhasil !!")
        this.sparepart = this.tampung.data;
        console.log(this.sparepart)
                   
                    
      } catch (err) {
          console.log(err)
      }
    },
   }
   
}
</script>
