<template>
    <div class="bg-light">
        <nav class="navbar navbar-dark bg-dark">
            <a href="#/" class="navbar-brand mb-0 h1">Siata</a>
        </nav>
        <div class="container mt-5">
    <div class="row">
        <div class="col">
            <h3 style="font-size: 52px;">Sparepart</h3>
        </div>
        <div class="col">
            <div class="input-group mt-4">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Sort By</label>
                </div>
                <select class="custom-select" id="inputGroupSelect01" @change="Sort" v-model="sortby">
                    <option value="0">No Sort</option>
                    <option value="1">Harga Termahal</option>
                    <option value="2">Harga Termurah</option>
                    <option value="3">Stok Terbanyak</option>
                    <option value="4">Stok Sedikit</option>
                </select>
            </div>
        </div>
    </div>
        <div class="row mt-4 mb-4">
            <div v-for="(Sparepart, index) in Spareparts" v-bind:key="index" class="col-md-3">
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
                        <h6 class="card-subtitle mb-2 text-dark">Stok: {{ Sparepart.jumlah_sparepart }} {{ Sparepart.satuan_sparepart }}</h6>
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
    sortby:'',
   }
  },
  created() {
    this.showSparepart();
  },
  methods: {
    async Sort(){
        if(this.sortby === '1'){
            this.tampung = await Controller.getHargaDESC();
            //alert("Register berhasil !!")
            this.Spareparts = this.tampung.data;
        }else if(this.sortby === '2'){
            this.tampung = await Controller.getHargaASC();
            //alert("Register berhasil !!")
            this.Spareparts = this.tampung.data;            
        }else if(this.sortby === '3'){
            this.tampung = await Controller.getStokDESC();
            //alert("Register berhasil !!")
            this.Spareparts = this.tampung.data;            
        }else if(this.sortby === '4'){
            this.tampung = await Controller.getStokASC();
            //alert("Register berhasil !!")
            this.Spareparts = this.tampung.data;
        }else{
            this.showSparepart();
        }
    },
    async showSparepart(){
      try {
                    
        this.tampung = await Controller.getsparepart();
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
