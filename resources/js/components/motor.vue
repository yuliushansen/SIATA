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
        <h3 class="row ml-4 mt-4" style="color: #2d4059;">Motor Pelanggan</h3>
        <div class="row ml-4 mt-4 mr-4"  id="register">
            
            <!-- form -->
            <div class="col shadow-sm p-3 mb-5 rounded col-3 ml-2 " style="background-color:#2d4059;">
            <h3>Form</h3><hr class="bg-light">
            
            <form  @submit.prevent="addMotor" class="form-horizontal ml-1"  role="form">
                <!-- <div class="alert alert-success" role="alert" v-if="state">
                        Registrasi Berhasil
                </div> -->
                <div class="form-group">
                    <label for="nama_jasa">Kode Motor</label>
                    <input v-if="edit == false" id="nama_jasa" type="text" class="form-control" name="nama_jasa" v-model="motor.id_motor" required autofocus>
                    <input v-else id="nama_jasa" type="text" class="form-control" name="nama_jasa" v-model="motor.id_motor" readonly autofocus>
                </div>
                <div class="form-group">
                    <label for="nama_pelanggan">Nama Pelanggan</label>
                    <select name="nama_pelanggan" class="custom-select" id="inputGroupSelect01" v-model="motor.id_pelanggan">
                        <option v-for="Pelanggan of Pelanggans" v-bind:key="Pelanggan['key']"  :value=Pelanggan.id_pelanggan>{{Pelanggan.nama_pelanggan}}</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="nama_jasa">Merk Motor</label>
                    <select name="jenis_transaksi" class="custom-select" id="inputGroupSelect01" v-model="motor.merk_motor">

                        <option value="Honda">Honda</option>
                        <option value="Yamaha">Yamaha</option>
                        <option value="Suzuki">Suzuki</option>
                        <option value="Kawasaki">Kawasaki</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="nama_jasa">Tipe Motor</label>
                    <input id="nama_jasa" type="text" class="form-control" name="nama_jasa" v-model="motor.tipe_motor" required autofocus>
                </div>
                <div class="form-group">
                    <label for="nama_jasa">Nomor Polisi</label>
                    <input id="nama_jasa" type="text" class="form-control" name="nama_jasa" v-model="motor.nomor_polisi" required autofocus>
                </div>
                    
                <button type="submit" class="btn text-light" style="background-color:#00adb5;" name="tambah">Submit</button>
            </form>
            </div>
            <!-- form -->
            <!-- table -->
            <div class="col shadow-sm p-3 mb-5 rounded ml-2" style="background-color:#2d4059;">
            <div class="row">
            <h3 class="col">Table</h3>
            <!-- <div class="col"> -->
                <label class="mr-3" for="Search"><h4>Search</h4></label>
                <input type="text" @keyup="showMotor()" placeholder="Nomor Polisi" name="search" class="tombol col-3 mb-3 mr-3 form-control" v-model="search">
            <!-- </div> -->
            
            </div>
            <table class="table text-light ">
                <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kode Motor</th>
                    <th scope="col">Nama Pelanggan</th>
                    <th scope="col">Merk Motor</th>
                    <th scope="col">Tipe Motor</th>
                    <th scope="col">Nomor Polisi</th>
                    <th scope="col">Metode</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(motor,index) of motors.data" v-bind:key="motor['key']">
                    <td>{{index+1}}</td>
                    <td>{{motor.id_motor}}</td>
                    <td>{{motor.pelanggan.nama_pelanggan}}</td>
                    <td>{{motor.merk_motor}}</td>
                    <td>{{motor.tipe_motor}}</td>
                    <td>{{motor.nomor_polisi}}</td>
                    <td>
                        <button type="button" class="btn btn-success" @click="editMotor(motor)"><i class="fas fa-edit"></i></button>
                        <button type="button" class="btn btn-danger" @click="deleteMotor(motor.id_motor)"><i class="far fa-trash-alt"/></button>
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
    export default{
        data(){
            return{
                Pelanggans:[],
                Pelanggan:{
                    id_pelanggan:'',
                    nama_pelanggan:'',
                },
                motors: [],
                motor: {
                    id_motor: '',
                    id_pelanggan: '',
                    merk_motor: '',
                    tipe_motor: '',
                    nomor_polisi: '',
                },
                id_motor: '',
                edit: false,
                state: false,
                stateEdit: false,
                tampung: [] ,
                search: ''
            }
        },
        created() {
            this.showPelanggan();
            this.showMotor();
        },
        methods:{
            async showPelanggan(){
                
                try {
                    
                  this.tampung = await Controller.getPelangganAll();
                  //alert("Register berhasil !!")
                  this.Pelanggans = this.tampung.data;
                            
                              
                } catch (err) {
                    console.log(err)
                }
            },
            
            async showMotor(){
                
                try {

                    this.tampung = await Controller.getMotorR(this.search);
                    //alert("Register berhasil !!")
                    this.motors = this.tampung.data;
                    console.log(this.motors)
                    
                    
                } catch (err) {
                    console.log(err)
                }
                
            },
            async addMotor() {
            if (this.edit === false) {
                
                try {
                    await Controller.postMotor(this.motor)
                    //alert("Register berhasil !!")
                    console.log("Success")
                    this.clearForm();
                    //alert('Mobil Added');
                    this.showMotor();
                    this.state = true;
                    
                } catch (err) {
                    console.log(err)
                }
            }else{
                
                
                
                try {
                    await Controller.editMotor(this.motor.id_motor,this.motor)
                    //alert("Register berhasil !!")
                    console.log("Success")
                    this.clearForm();
                    // alert('Article Updated');
                    this.showMotor();
                    this.stateEdit = true;
                    
                } catch (err) {
                    console.log(err)
                }
            } 
            },
            editMotor(motor) {
              this.edit = true;
              this.motor.id_motor = motor.id_motor;
              this.motor.merk_motor = motor.merk_motor;
              this.motor.tipe_motor = motor.tipe_motor;
              this.motor.id_pelanggan = motor.id_pelanggan;
              this.motor.nomor_polisi = motor.nomor_polisi;
              
              //console.log(this.mobil.image);
              this.state = false;
            },
            async deleteMotor(id_motor) {
           
                try {
                    await Controller.deleteMotor(id_motor)
                    //alert("Register berhasil !!")
                    console.log("Success")
                    this.showMotor();
                    
                    
                } catch (err) {
                    console.log(err)
                }
            },
            clearForm() {
              this.edit = false;
              this.motor.id_pelanggan = '';
              this.motor.id_motor = '';
              this.motor.merk_motor = '';
              this.motor.tipe_motor = '';
              this.motor.nomor_polisi = '';
            },
        }
    }
</script>