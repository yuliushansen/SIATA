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
                <a id="logout" @click="$auth.logout()" style="background-color:#00adb5;" class="list-group-item list-group-item-action">Logout</a>
                
            </div>
            </div>
        <!-- register -->
        <div class="container-fluid" >
        <h3 class="row ml-4 mt-4" style="color: #2d4059;">Supplier</h3>
        <div class="row ml-4 mt-4 mr-4"  id="register">
            
            <!-- form -->
            <div class="col shadow-sm p-3 mb-5 rounded col-3 ml-2 " style="background-color:#2d4059;">
            <h3>Form</h3><hr class="bg-light">
            
            <form  @submit.prevent="addSupplier" class="form-horizontal ml-1"  role="form">
                <!-- <div class="alert alert-success" role="alert" v-if="state">
                        Registrasi Berhasil
                </div> -->
                <div class="form-group">
                    <label for="nama_supplier">Nama Supplier</label>
                    <input id="nama_supplier" type="text" class=" form-control" name="nama_supplier" v-model="supplier.nama_supplier" required autofocus>
                </div>
                <div class="form-group">
                    <label for="nama_sales">Nama Sales</label>
                    <input id="nama_sales" type="text" class=" form-control" name="nama_sales" v-model="supplier.nama_sales" required autofocus>
                </div>
                <div class="form-group">
                    <label for="nomor_sales">Telepon</label>
                    <input id="nomor_sales" type="number" class=" form-control" v-model="supplier.nomor_sales" name="nomor_sales" required>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input id="alamat" type="text" class=" form-control" name="alamat" v-model="supplier.alamat" required autofocus>
                </div>             
                    
                <button id="SupSub" type="submit" class="btn text-light" style="background-color:#00adb5;" name="tambah">Submit</button>
            </form>
            </div>
            <!-- form -->
            <!-- table -->
            <div class="col shadow-sm p-3 mb-5 rounded ml-2" style="background-color:#2d4059;">
            <div class="row">
            <h3 class="col">Table</h3>
            <!-- <div class="col"> -->
                <label class="mr-3" for="Search"><h4>Search</h4></label>
                <input id="SupSearch" type="text" @keyup="showSupplier()" placeholder="Supplier Name" name="search" class="tombol col-3 mb-3 mr-3 form-control" v-model="search">
            <!-- </div> -->
            
            </div>
            <table class="table text-light ">
                <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Supplier</th>
                    <th scope="col">Nama Sales</th>
                    <th scope="col">Telepon</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Metode</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(supplier,index) of suppliers.data" v-bind:key="supplier['key']">
                    <td>{{index+1}}</td>
                    <td>{{supplier.nama_supplier}}</td>
                    <td>{{supplier.nama_sales}}</td>
                    <td>{{supplier.nomor_sales}}</td>
                    <td>{{supplier.alamat}}</td>
                    <td>
                        <button :id="'Edit'+(index+1)" type="button" class="btn btn-success" @click="editSupplier(supplier)"><i class="fas fa-edit"></i></button>
                        <button :id="'Hapus'+(index+1)" type="button" class="btn btn-danger" @click="deleteSupplier(supplier.id_supplier)"><i class="far fa-trash-alt"/></button>
                    </td>
                </tr>
                </tbody>
            </table>
            <nav v-cloak>
						<ul class="pagination">
							<li v-if="suppliers.prev_page_url">
								<a @click.prevent="getsupplier(suppliers.prev_page_url)" :href="suppliers.prev_page_url"><i class="fas fa-arrow-left"></i></a>
							</li>
							<li  v-if="suppliers.next_page_url">
								<a @click.prevent="getsupplier(suppliers.next_page_url)" :href="suppliers.next_page_url"><i style="font-size=100;" class="fas fa-arrow-right"></i></a>
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
                suppliers: [],
                supplier: {
                    id_supplier: '',
                    nama_supplier: '',
                    nama_sales: '',
                    nomor_sales: '',
                    alamat: '',
                },
                id_supplier: '',
                edit: false,
                state: false,
                stateEdit: false,
                tampung: [] ,
                search: '',
                cekHP: false,
            }
        },
        created() {
            this.showSupplier();
        },
        methods:{
            async showSupplier(){
                
                try {

                    this.tampung = await Controller.getSupplier(this.search);
                    //alert("Register berhasil !!")
                    this.suppliers = this.tampung.data;
                    
                    
                    
                } catch (err) {
                    console.log(err)
                }
                
            },
            async getsupplier(url){
                
                try {
                    this.tampung = await Controller.getsupplier(url);
                    this.suppliers = this.tampung.data;
                    // this.tampung = 
                    //alert("Register berhasil !!")
                    // this.pegawais = this.tampung.data;
                    
                    
                    
                } catch (err) {
                    console.log(err)
                }
                
            },
            async addSupplier() {
            if (this.edit === false) {
                
                try {
                    if(this.supplier.nomor_sales.length !==12){
                        alert("Nomor Telepon harus 12 digit")
                    }else{
                        this.cekHP = true;
                    }
                    if(this.cekHP === true){
                    await Controller.insertSupplier(this.supplier)
                    }
                    //alert("Register berhasil !!")
                    console.log("Success")
                    this.clearForm();
                    //alert('Mobil Added');
                    this.showSupplier();
                    this.state = true;
                    
                } catch (err) {
                    console.log(err)
                }
            }else{
                
                
                
                try {
                    await Controller.editSupplier(this.supplier.id_supplier,this.supplier)
                    //alert("Register berhasil !!")
                    console.log("Success")
                    this.clearForm();
                    // alert('Article Updated');
                    this.showSupplier();
                    this.stateEdit = true;
                    
                } catch (err) {
                    console.log(err)
                }
            } 
            },
            editSupplier(supplier) {
              this.edit = true;
              this.supplier.id_supplier = supplier.id_supplier;
              this.supplier.nama_supplier = supplier.nama_supplier;
              this.supplier.nama_sales = supplier.nama_sales;
              this.supplier.nomor_sales = supplier.nomor_sales;
              this.supplier.alamat = supplier.alamat;
              //console.log(this.mobil.image);
              this.state = false;
            },
            async deleteSupplier(id_supplier) {
           
                try {
                    await Controller.deleteSupplier(id_supplier)
                    //alert("Register berhasil !!")
                    console.log("Success")
                    this.showSupplier();
                    
                    
                } catch (err) {
                    console.log(err)
                }
            },
            clearForm() {
              this.edit = false;
              this.cekHP = false;
              this.supplier.id_supplier = '';
              this.supplier.nama_supplier = '';
              this.supplier.nama_sales = '';
              this.supplier.nomor_sales = '';
              this.supplier.alamat = '';
            },
        }
    }
</script>