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
        <h3 class="row ml-4 mt-4" style="color: #2d4059;">Sparepart</h3>
        <div class="col shadow-sm p-3 mb-5 rounded col-5 ml-4 mt-4 mr-4" style="background-color:#2d4059;">
            <h3>Form</h3><hr class="bg-light">
            <form  @submit.prevent="addSparepart" class="form-horizontal row ml-1"  role="form">
                <div class="col">
                    <div class="form-group">
                        <label for="kode_sparepart">Kode Sparepart</label>
                        <input id="kode_sparepart" type="text" class="form-control" name="kode_sparepart" v-model="Sparepart.kode_sparepart" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="nama_sparepart">Nama Sparepart</label>
                        <input id="nama_sparepart" type="text" class="form-control" name="nama_sparepart" v-model="Sparepart.nama_sparepart" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="merk_sparepart">Merk Sparepart</label>
                        <input id="merk_sparepart" type="text" class="form-control" name="merk_sparepart" v-model="Sparepart.merk_sparepart" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="tipe_sparepart">Tipe Sparepart</label>
                        <input id="tipe_sparepart" type="text" class="form-control" name="tipe_sparepart" v-model="Sparepart.tipe_sparepart" required autofocus>
                    </div>
                    
                    <label for="jumlah_sparepart">Gambar</label>
                    <input type="file" class="form-control mb-1" placeholder="Gambar Sparepart" @change="imageChanged" >
                    <div class="form-group">
                        
                        <input type="text" class="form-control" placeholder="Gambar Sparepart" v-model="Sparepart.gambar" >
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="lokasi_sparepart">Lokasi Sparepart</label>
                        <input id="lokasi_sparepart" type="text" class="form-control" name="lokasi_sparepart" v-model="Sparepart.lokasi_sparepart" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="harga_jual">Harga</label>
                        <input id="harga_jual" type="number" class="form-control" name="harga_jual" v-model="Sparepart.harga_jual" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="satuan_sparepart">Satuan Sparepart</label>
                        <input id="satuan_sparepart" type="text" class="form-control" name="satuan_sparepart" v-model="Sparepart.satuan_sparepart" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="jumlah_sparepart">Jumlah</label>
                        <input id="jumlah_sparepart" type="number" class="form-control" name="jumlah_sparepart" v-model="Sparepart.jumlah_sparepart" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="minimal_stok">Minimal Stok</label>
                        <input id="minimal_stok" type="number" class="form-control" name="minimal_stok" v-model="Sparepart.minimal_stok" required autofocus>
                    </div>
                        
                    <button type="submit" class="btn text-light" style="background-color:#00adb5;" name="tambah">Submit</button>
                </div>
            </form>
        </div>
        <div class="row ml-4 mt-4 mr-4"  id="register">
            
            <!-- form -->
            
            <!-- form -->
            <!-- table -->
            <div class="col shadow-sm p-3 mb-5 rounded" style="background-color:#2d4059;">
            <div class="row">
            <h3 class="col">Table</h3>
            <label class="mr-3" for="Search"><h4>Search</h4></label>
            <input type="text" @keyup="showSparepart()" placeholder="Sparepart Name" name="search" class="tombol col-3 mb-3 mr-3 form-control" v-model="search">
            </div>
            <table class="table text-light ">
                <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">ID Sparepart</th>
                    <th scope="col">Kode Sparepart</th>
                    <th scope="col">Nama Sparepart</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Merk Sparepart</th>
                    <th scope="col">Tipe Sparepart</th>
                    <th scope="col">Lokasi Sparepart</th>
                    <th scope="col">Harga Jual</th>
                    <th scope="col">Jumlah Sparepart</th>
                    <th scope="col">Minimal Stok</th>
                    <th scope="col">Metode</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(Sparepart,index) of Spareparts.data" v-bind:key="Sparepart['key']">
                    <td>{{index+1}}</td>
                    <td>{{Sparepart.id_sparepart}}</td>
                    <td>{{Sparepart.kode_sparepart}}</td>
                    <td>{{Sparepart.nama_sparepart}}</td>
                    <td><img class="img-thumbnail" :src="'public/gambar/'+Sparepart.gambar" style="height: 200px;width: 200px;"></td>
                    <td>{{Sparepart.merk_sparepart}}</td>
                    <td>{{Sparepart.tipe_sparepart}}</td>
                    <td>{{Sparepart.lokasi_sparepart}}</td>
                    <td>{{Sparepart.harga_jual}}</td>
                    <td>{{Sparepart.jumlah_sparepart}} {{Sparepart.satuan_sparepart}}</td>
                    <td>{{Sparepart.minimal_stok}} {{Sparepart.satuan_sparepart}}</td>
                    <td>
                        <button type="button" class="btn btn-success" @click="editSparepart(Sparepart)"><i class="fas fa-edit"></i></button>
                        <button type="button" class="btn btn-danger" @click="deleteSparepart(Sparepart.id_sparepart)"><i class="far fa-trash-alt"/></button>
                    </td>
                </tr>
                </tbody>
            </table>
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
export default {
    data(){
            return{
                Spareparts: [],
                Sparepart: {
                    id_sparepart: '',
                    kode_sparepart: '',
                    nama_sparepart: '',
                    merk_sparepart: '',
                    tipe_sparepart: '',
                    lokasi_sparepart: '',
                    harga_jual: '',
                    satuan_sparepart: '',
                    jumlah_sparepart: '',
                    gambar: '',
                    minimal_stok: '',
                },
                id_sparepart: '',
                edit: false,
                state: false,
                stateEdit: false,
                tampung: [] ,
                search: [],
            }

    },
    created() {
        this.showSparepart();
    },
    methods:{
        imageChanged(e){
                console.log(e.target.files[0])
                var fileReader = new FileReader()

                fileReader.readAsDataURL(e.target.files[0])
                fileReader.onload = (e) => {
                    this.Sparepart.gambar = e.target.result
                }
                console.log(this.e.target.result)
        },
        async showSparepart(){
                
            try {
                    
                this.tampung = await Controller.getSparepart(this.search);
                //alert("Register berhasil !!")
                this.Spareparts = this.tampung.data;
                console.log(this.tampung)
                    
                    
            } catch (err) {
                console.log(err)
            }
                
        },
        async addSparepart() {
            if (this.edit === false) {
                
                try {
                    await Controller.insertSparepart(this.Sparepart)
                    //alert("Register berhasil !!")
                    console.log(this.Spareparts.gambar)
                    this.clearForm();
                    //alert('Mobil Added');
                    this.showSparepart();
                    this.state = true;
                    
                } catch (err) {
                    console.log(err)
                }
            }
            else{
                try {
                    await Controller.editSparepart(this.Sparepart.id_sparepart,this.Sparepart)
                    //alert("Register berhasil !!")
                    console.log("Success")
                    this.clearForm();
                    // alert('Article Updated');
                    this.showSparepart();
                    this.stateEdit = true;
                    
                } catch (err) {
                    console.log(err)
                }
            } 
        },
        async deleteSparepart(id_sparepart) {
           
            try {
                await Controller.deleteSparepart(id_sparepart)
                //alert("Register berhasil !!")
                console.log("Success")
                this.showSparepart();          
            } catch (err) {
                console.log(err)
            }
        },
        editSparepart(Sparepart) {
            this.edit = true;
            this.Sparepart.id_sparepart= Sparepart.id_sparepart;
            this.Sparepart.kode_sparepart= Sparepart.kode_sparepart;
            this.Sparepart.nama_sparepart= Sparepart.nama_sparepart;
            this.Sparepart.merk_sparepart= Sparepart.merk_sparepart;
            this.Sparepart.tipe_sparepart= Sparepart.tipe_sparepart;
            this.Sparepart.lokasi_sparepart= Sparepart.lokasi_sparepart;
            this.Sparepart.harga_jual= Sparepart.harga_jual;
            this.Sparepart.satuan_sparepart= Sparepart.satuan_sparepart;
            this.Sparepart.jumlah_sparepart= Sparepart.jumlah_sparepart;
            this.Sparepart.gambar= Sparepart.gambar;
            this.Sparepart.minimal_stok= Sparepart.minimal_stok;
            this.state = false;
        },
        clearForm() {
            this.edit = false;
            this.Sparepart.id_sparepart= '';
            this.Sparepart.kode_sparepart= '';
            this.Sparepart.nama_sparepart= '';
            this.Sparepart.merk_sparepart= '';
            this.Sparepart.tipe_sparepart= '';
            this.Sparepart.lokasi_sparepart= '';
            this.Sparepart.harga_jual= '';
            this.Sparepart.satuan_sparepart= '';
            this.Sparepart.jumlah_sparepart= '';
            this.Sparepart.gambar= '';
            this.Sparepart.minimal_stok= '';
        },
    }
    
}
</script>