<template>
    <div>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light ">
      <div class="container">
        <a class="navbar-brand" href="#">SIATA</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav ml-auto">
            <!-- <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="#">Pricing</a>
            <a class="nav-item nav-link" href="#">Features</a> -->
            <a class="nav-item nav-link" href="#/history">History Transaksi</a>
            <a id="tombolLogin" class="nav-item tombol btn btn-primary" href="#/login">Login</a>
          </div>
        </div>
      </div>
    </nav>
    <!-- Akhir Navbar -->
    <!-- Jumbotron -->
    <div class="jumbotron jumbotron-fluid">
      <div class="container">
      
        <h1 class="display-4" id="target">Get Service done Faster and Better with Us</h1>
        
        <a href="#/sparepart/user/" class="btn btn-primary tombol">See Spareparts</a>
      </div>
    </div>
    <!-- Akhir Jumbotron -->

    <div class="container">
      <!-- info panel -->
      <div class="row justify-content-center">
        <div class="col-10 info-panel">
          <div class="row">
            <div class="col-lg">
              <img src="public/img/employee.png" alt="employee" class="float-left">
              <h4>12 Hours</h4>
              <p>Melayani service selama 12 jam per hari.</p>
            </div>
            <div class="col-lg">
              <img src="public/img/clock.png" alt="hires" class="float-left">
              <h4>Fast Service</h4>
              <p>Service cepat tanpa perlu antri.</p>
            </div>
            <div class="col-lg">
              <img src="public/img/security.png" alt="security" class="float-left">
              <h4>Safe</h4>
              <p>Service terjamin aman.</p>
            </div>
          </div>
        </div>
      </div>
      <!-- working -->
      <div class="row workingspace" >
        <div class="col-lg-6 rounded">
          <img style="border-radius: 2%" src="public/img/neonbrand-716631-unsplash.jpg" alt="workingspace" class="img-fluid">
        </div>
        <div class="col-lg-5"> <span></span>
          <h3><span>Service</span> Your <span>Motorcycle</span> Like <span>New Again</span></h3>
          <!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam ab praesentium perferendis ullam quod beatae, dolorum quisquam impedit officiis minima?</p> -->
        </div>
      </div>
    </div>
    <!-- sparepart -->
    <div class="container mt-5">
    <div class="row">
      <h3 style="font-size: 52px;">Sparepart</h3>
    </div>
        <div class="row mt-4 mb-4">
            <div v-for="(Sparepart, index) in Spareparts.data" v-bind:key="index" class="col-md-3">
                <div class="card">
                    <div style="width: 100%; padding-top: 100%; position: relative">
                        <div style="display: block; position: absolute; top: 0; right: 0; bottom: 0; left: 0">
                            <div class="text-center thumbnail" style="height:100%">
                                <router-link :to="{ name: 'detail_sparepart', params: { id: Sparepart.id_sparepart } }" ><img class="card-img-top" style="height:280px" :src="'public/gambar/'+Sparepart.gambar"></router-link>
                                
                            </div>
                        </div>
                    </div>
                    <div class="card-body mt-1">
                        <h5 class="card-title" style="height: 43px; -webkit-line-clamp: 2; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-box-orient: vertical;"><router-link :to="{ name: 'detail_sparepart', params: { id: Sparepart.id_sparepart } }" >{{ Sparepart.nama_sparepart }}</router-link></h5>
                        <h6 class="card-subtitle mb-2 text-danger"><b>Rp {{ Sparepart.harga_jual }}</b> </h6>
                    </div>
                </div>
            </div>
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
     Spareparts: [],
     Sparepart: {
     id_sparepart: '',
     kode_sparepart: '',
     nama_sparepart: '',
     gambar: '',
     harga_jual: '',                  
    },
    mobil_id: '',
    edit: false,
    tampung: [],
    tampung2: [],
    testi:[],
   }
  },
  created() {
    this.showSparepart();
  },
  methods: {
    async showSparepart(){
      try {
                    
        this.tampung = await Controller.getSparepart('');
        //alert("Register berhasil !!")
        this.Spareparts = this.tampung.data;
        console.log(this.tampung)
                   
                    
      } catch (err) {
          console.log(err)
      }
    },
  }
}
</script>