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
                    <th scope="col">Nama Supplier</th>
                    <th scope="col">Nama Sales</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Detail Pengadaan</th>
                    <th scope="col">Total Harga</th>
                    <th scope="col">Status Pengadaan</th>
                    <th scope="col">Metode</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(pengadaan,index) of pengadaans.data" v-bind:key="pengadaan['key']">
                    <td>{{index+1}}</td>
                    <td>{{pengadaan.id_transaksi_pengadaan}}</td>
                    <td>
                        PT. {{pengadaan.supplier.nama_supplier}}
                    </td>
                    <td>{{pengadaan.supplier.nama_sales}}</td>
                    <td>{{new Date(pengadaan.tanggal).toLocaleDateString("en-GB", {year: 'numeric', month: 'long', day: 'numeric'})}}</td>
                    <td>
                        <button type="button" class="btn btn-primary" @click="OpenDetail(pengadaan)"><i class="far fa-eye"></i></button>
                    </td>
                    <td>{{pengadaan.total_harga}}</td>
                    <td>{{pengadaan.status_pengadaan}}</td>
                    <td>
                        <button type="button" class="btn btn-success" @click="editPengadaan(pengadaan)"><i class="fas fa-edit"></i></button>
                        <button v-if="pengadaan.status_pengadaan === 'Sedang Dipesan'" type="button" class="btn btn-danger" @click="deletePengadaan(pengadaan)"><i class="far fa-trash-alt"/></button>
                        <router-link v-if="pengadaan.status_pengadaan === 'Menunggu Pesanan'" :to="{ name: 'sp', params: { id: pengadaan.id_transaksi_pengadaan } }" ><button type="button" class="btn btn-primary"><i class="fa fa-print"/></button></router-link>
                    </td>
                    
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
                    <th v-if="tampung_pengadaan.status_pengadaan === 'Sedang Dipesan'" scope="col">Metode</th>
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
                    <td>
                        <button v-if="tampung_pengadaan.status_pengadaan === 'Sedang Dipesan'" type="button" class="btn btn-danger" @click="deleteDetailPengadaan(detail)"><i class="far fa-trash-alt"/></button>
                    </td>
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
        
        <!-- modal ADD -->
<div class="modal fade bd-example-modal-lg" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-lg-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-dark" id="exampleModalLabel">Add Pengadaan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form @submit.prevent="addPengadaan" class="form-horizontal ml-1" role="form">
      <div class="modal-body text-dark">
            <div class="form-group">
                <label for="nama_pelanggan">Nama Sales</label>
                <select name="nama_pelanggan" class="custom-select" id="inputGroupSelect01" v-model="pengadaan_add.id_supplier">
                    <!-- <option selected>Pilih...</option> -->
                    <option v-for="supplier of suppliers" v-bind:key="supplier['key']"  :value=supplier.id_supplier>{{supplier.nama_sales}}</option>
                </select>
            </div>
            <!-- table form -->
            
            <h5>Detail Pengadaan</h5>
            <table class="table table-sm ">
                <thead>
                    <tr>
                        <td><strong>No</strong></td>
                        <td><strong>Sparepart</strong></td>
                        <td><strong>Jumlah</strong></td>
                        <td><strong>Harga Beli</strong></td>
                        <td><strong>Harga Jual</strong></td>
                        <td><strong>Subtotal</strong></td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(da_add,index) of da_adds" v-bind:key="da_add['key']">
                        <td>{{index+1}}</td>
                        <td>
                            <div class="form-group">
                                <select name="motorpelanggan" class="custom-select" id="inputGroupSelect01" v-model="da_add.id_sparepart">
                                
                                    <option v-for="sparepart of spareparts" v-bind:key="sparepart['key']" :value=sparepart.id_sparepart>{{sparepart.nama_sparepart}}</option>
                                </select>
                            </div>
                        </td>
                        <td><input id="jumlah" type="number" class=" form-control" v-model="da_add.jumlah" name="jumlah" @keyup="subtotal(index)"></td>
                        <td><input id="jumlah" type="number" class=" form-control" v-model="da_add.harga_beli" name="jumlah" @keyup="subtotal(index)"></td>
                        <td><input id="jumlah" type="number" class=" form-control" v-model="da_add.harga_jual" name="jumlah" ></td>                       
                        <td><input id="jumlah" type="text" class=" form-control" v-model="da_add.sub_total" name="jumlah" readonly></td>
                        <td><a v-on:click="removeElement(da_add);" style="cursor: pointer">Remove</a></td>
                    </tr>
                </tbody>
            </table>
            <div>
                <button type="button" class="btn btn-primary" @click="addRow()">Add Row</button>
            </div>
      
           
            <!-- Tabel form -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        
      </div>
      
        </form>
    </div>
  </div>
</div>

        <!-- modal EDIT -->
<div class="modal fade bd-example-modal-lg" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-lg-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-dark" id="exampleModalLabel">Add Pengadaan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form @submit.prevent="EditMaster" class="form-horizontal ml-1" role="form">
      <div class="modal-body text-dark">
            <div v-if="pengadaan_edit.status_pengadaan === 'Sedang Dipesan'" class="form-group">
                <label for="nama_pelanggan">Nama Sales</label>
                <select name="nama_pelanggan" class="custom-select" id="inputGroupSelect01" v-model="pengadaan_edit.id_supplier">
                    <!-- <option selected>Pilih...</option> -->
                    <option v-for="supplier of suppliers" v-bind:key="supplier['key']"  :value=supplier.id_supplier>{{supplier.nama_sales}}</option>
                </select>
            </div>
            <div v-else class="form-group">
                <label for="nama_pelanggan">Nama Sales</label>
                <select name="nama_pelanggan" class="custom-select" id="inputGroupSelect01" v-model="pengadaan_edit.id_supplier" disabled>
                    <!-- <option selected>Pilih...</option> -->
                    <option v-for="supplier of suppliers" v-bind:key="supplier['key']"  :value=supplier.id_supplier>{{supplier.nama_sales}}</option>
                </select>
            </div>
            <div class="form-group">
                <label for="jenis_transaksi">Status Transaksi</label>
                <select name="jenis_transaksi" class="custom-select" id="inputGroupSelect01" v-model="pengadaan_edit.status_pengadaan">
                    <!-- <option selected>Pilih...</option> -->
                    <option value="Sedang Dipesan">Sedang Dipesan</option>
                    <option value="Menunggu Pesanan">Menunggu Pesanan</option>
                    <option value="Barang Datang">Barang Datang</option>
                    <option value="Selesai">Selesai</option>
                </select>
            </div>
            <!-- table form -->
            
            <h5>Detail Pengadaan</h5>
            <table class="table table-sm ">
                <thead>
                    <tr>
                        <td><strong>No</strong></td>
                        <td><strong>Sparepart</strong></td>
                        <td><strong>Jumlah</strong></td>
                        <td v-if="pengadaan_edit.status_pengadaan === 'Barang Datang'"><strong>Jumlah Datang</strong></td>
                        <td><strong>Harga Beli</strong></td>
                        <td><strong>Harga Jual</strong></td>
                        <td><strong>Subtotal</strong></td>
                        <td v-if="pengadaan_edit.status_pengadaan === 'Sedang Dipesan'"></td>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(da_edit,index) of da_edits" v-bind:key="da_edit['key']">
                        <td>{{index+1}}</td>
                        <td v-if="pengadaan_edit.status_pengadaan === 'Sedang Dipesan'">
                            <div class="form-group">
                                <select name="motorpelanggan" class="custom-select" id="inputGroupSelect01" v-model="da_edit.id_sparepart">
                                
                                    <option v-for="sparepart of spareparts" v-bind:key="sparepart['key']" :value=sparepart.id_sparepart>{{sparepart.nama_sparepart}}</option>
                                </select>
                            </div>
                        </td>
                        <td v-else>
                            <div class="form-group">
                                <select name="motorpelanggan" class="custom-select" id="inputGroupSelect01" v-model="da_edit.id_sparepart" disabled>
                                
                                    <option v-for="sparepart of spareparts" v-bind:key="sparepart['key']" :value=sparepart.id_sparepart>{{sparepart.nama_sparepart}}</option>
                                </select>
                            </div>
                        </td>
                        <td v-if="pengadaan_edit.status_pengadaan === 'Sedang Dipesan'"><input id="jumlah" type="number" class=" form-control" v-model="da_edit.jumlah" name="jumlah" @keyup="subtotaledit(index)"></td>
                        <td v-else-if="pengadaan_edit.status_pengadaan === 'Barang Datang'"><input id="jumlah" type="number" class=" form-control" v-model="da_edit.jumlah" name="jumlah" readonly></td>
                        <td v-else><input id="jumlah" type="number" class=" form-control" v-model="da_edit.jumlah" name="jumlah" @keyup="subtotaledit(index)" readonly></td>
                        <td v-if="pengadaan_edit.status_pengadaan === 'Barang Datang'"><input id="jumlah" type="number" class=" form-control" v-model="da_edit.jumlah_datang" name="jumlah" @keyup="subtotalbaru(index)" required></td>
                        <td v-if="pengadaan_edit.status_pengadaan === 'Sedang Dipesan'"><input id="jumlah" type="number" class=" form-control" v-model="da_edit.harga_beli" name="jumlah" @keyup="subtotaledit(index)"></td>
                        <td v-else-if="pengadaan_edit.status_pengadaan === 'Barang Datang'"><input id="jumlah" type="number" class=" form-control" v-model="da_edit.harga_beli" name="jumlah" @keyup="subtotalbaru(index)"></td>
                        <td v-else><input id="jumlah" type="number" class=" form-control" v-model="da_edit.harga_beli" name="jumlah" @keyup="subtotaledit(index)" readonly></td>
                        <td v-if="pengadaan_edit.status_pengadaan === 'Sedang Dipesan'"><input id="jumlah" type="number" class=" form-control" v-model="da_edit.harga_jual" name="jumlah" ></td>                       
                        <td v-else-if="pengadaan_edit.status_pengadaan === 'Barang Datang'"><input id="jumlah" type="number" class=" form-control" v-model="da_edit.harga_jual" name="jumlah" ></td>                       
                        <td v-else><input id="jumlah" type="number" class=" form-control" v-model="da_edit.harga_jual" name="jumlah" readonly></td>                       
                        <td><input id="jumlah" type="text" class=" form-control" v-model="da_edit.sub_total" name="jumlah" readonly></td>
                        <td v-if="pengadaan_edit.status_pengadaan === 'Sedang Dipesan'"><a v-on:click="removeElementEdit(da_edit);" style="cursor: pointer">Remove</a></td>
                    </tr>
                </tbody>
            </table>
            <div v-if="pengadaan_edit.status_pengadaan === 'Sedang Dipesan'">
                <button type="button" class="btn btn-primary" @click="addRowEdit()">Add Row</button>
            </div>
      
           
            <!-- Tabel form -->
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
                his:{
                    id_sparepart:'',
                    tanggal:'',
                    jumlah_masuk:'',
                    jumlah_keluar:'',
                },
                tampung:'',
                pengadaans:'',
                search:'',
                tampung_detail_pengadaan:'',
                tampung_pengadaan : '',
                pengadaan_add:{
                    id_transaksi_pengadaan:'',
                    id_cs:'',
                    id_supplier:'',
                    tanggal:'',
                    status_pengadaan:'',
                    total_harga:'',
                },
                pengadaan_edit:{
                    id_transaksi_pengadaan:'',
                    id_cs:'',
                    id_supplier:'',
                    tanggal:'',
                    status_pengadaan:'',
                    total_harga:'',
                },
                da_adds:[],
                da_edits:[],
                edit: false,
                suppliers:'',
                spareparts:'',
            }
                
        },
        created() {
            this.showPengadaan();
            this.dates();
            this.getSupplier();
            this.getSparepart();            
        },
        
        methods:{
            async EditMaster(){
                
                // if(this.pengadaan_edit.status_pengadaan === "Sedang Dipesan"){
                    
                    for(var a in this.da_edits){
                        if(this.da_edits[a].id_detail_pengadaan === ""){
                            this.da_edits[a].id_transaksi_pengadaan = this.pengadaan_edit.id_transaksi_pengadaan;
                            this.da_edits[a].jumlah_datang = 0;
                            await Controller.postDetailPengadaan(this.da_edits[a]);
                        }else{
                            await Controller.editDetailPengadaan(this.da_edits[a].id_detail_pengadaan,this.da_edits[a]);
                        }
                    }
                //}
                this.pengadaan_edit.total_harga = this.da_edits.reduce((acc,item)=> acc+item.sub_total,0);
                if(this.pengadaan_edit.status_pengadaan === "Selesai"){
                    for(var a in this.da_edits){
                        this.tampung = await Controller.getDetSparepart(this.da_edits[a].id_sparepart);
                        this.tampung.data.jumlah_sparepart = this.tampung.data.jumlah_sparepart + this.da_edits[a].jumlah_datang;
                        this.tampung.data.harga_jual = this.da_edits[a].harga_jual;
                        await Controller.editSparepart(this.tampung.data.id_sparepart,this.tampung.data)
                        
                        this.his.id_sparepart = this.da_edits[a].id_sparepart;
                        this.his.tanggal = this.pengadaan_edit.tanggal;
                        this.his.jumlah_masuk = this.da_edits[a].jumlah_datang;
                        this.his.jumlah_keluar = 0;
                        await Controller.posthis(this.his);
                        
                    }
                }
                await Controller.editPengadaan(this.pengadaan_edit.id_transaksi_pengadaan,this.pengadaan_edit);
                this.showPengadaan();
                $('#edit').modal('hide')
            },
            async editPengadaan(pengadaan){
                
                this.pengadaan_edit.id_transaksi_pengadaan = pengadaan.id_transaksi_pengadaan
                this.pengadaan_edit.id_cs = pengadaan.id_cs
                this.pengadaan_edit.id_supplier = pengadaan.id_supplier
                this.pengadaan_edit.tanggal = pengadaan.tanggal
                this.pengadaan_edit.status_pengadaan = pengadaan.status_pengadaan
                this.pengadaan_edit.total_harga = pengadaan.total_harga
                this.da_edits = pengadaan.pengadaan;
                console.log(this.da_edits)
                this.EditModal();
            },
            async EditModal(){
                $('#edit').modal('show')
            },
            async deletePengadaan(Pengadaan) {
                for(var index in Pengadaan.pengadaan){
                    await Controller.deleteDetailPengadaan(Pengadaan.pengadaan[index].id_detail_pengadaan);
                }
                await Controller.deletePengadaan(Pengadaan.id_transaksi_pengadaan);
                this.showPengadaan();
            },
            async deleteDetailPengadaan(Pengadaan) {
                await Controller.deleteDetailPengadaan(Pengadaan.id_detail_pengadaan);
                this.showPengadaan();
                $('#exampleModal').modal('hide')
            },
            async addRow() {
                this.da_adds.push({ 
                    id_detail_pengadaan:'',
                    id_transaksi_pengadaan:'',
                    id_sparepart:'',
                    jumlah:'',
                    jumlah_datang:'',
                    harga_beli:'',
                    harga_jual:'',
                    sub_total:'',
                });
            },
            async addRowEdit() {
                this.da_edits.push({ 
                    id_detail_pengadaan:'',
                    id_transaksi_pengadaan:'',
                    id_sparepart:'',
                    jumlah:'',
                    jumlah_datang:'',
                    harga_beli:'',
                    harga_jual:'',
                    sub_total:'',
                });
            },
            async removeElement(da_add) {
                var index = this.da_adds.indexOf(da_add);
                this.da_adds.splice(index, 1);
            },
            async removeElementEdit(da_edit) {
                var index = this.da_edits.indexOf(da_edit);
                this.da_edits.splice(index, 1);
            },
            async subtotal(index){
                this.da_adds[index].sub_total = this.da_adds[index].harga_beli * this.da_adds[index].jumlah;
            },
            async subtotaledit(index){
                this.da_edits[index].sub_total = this.da_edits[index].harga_beli * this.da_edits[index].jumlah;
            },
            async subtotalbaru(index){
                this.da_edits[index].sub_total = this.da_edits[index].harga_beli * this.da_edits[index].jumlah_datang;
            },
            async getSparepart(){
                
                try {

                    this.tampung = await Controller.getsparepart();
                    //alert("Register berhasil !!")
                    this.spareparts = this.tampung.data;
                    
                    
                    
                } catch (err) {
                    console.log(err)
                }
                
            },
            async getSupplier(){
                
                try {
                    
                  this.tampung = await Controller.getSupplierAll();
                  //alert("Register berhasil !!")
                  this.suppliers = this.tampung.data;
                            console.log(this.suppliers)
                              
                } catch (err) {
                    console.log(err)
                }
            },
            async dates(){
                var n =  new Date();
                var y = n.getFullYear();
                var m = ("0"+(n.getMonth() + 1)).slice(-2);
                var d = ("0"+(n.getDate())).slice(-2);
                this.pengadaan_add.tanggal = y + "-" + m + "-" + d;
                console.log(this.pengadaan_add.tanggal)
            },
            async DetailAdd(da_adds){
                
                try {
                    for(var a in da_adds){
                        this.tampung = await Controller.getLastPengadaan();
                        
                        da_adds[a].id_transaksi_pengadaan = this.tampung.data.id_transaksi_pengadaan;
                        da_adds[a].jumlah_datang = 0;
                        console.log(da_adds[a])
                        await Controller.postDetailPengadaan(da_adds[a]);
                        this.showPengadaan();
                    }
                              
                } catch (err) {
                    console.log(err)
                }
            },
            async addPengadaan(){
               
                try{
                    this.pengadaan_add.id_cs = this.$auth.user().id_pegawai;
                    this.pengadaan_add.total_harga = this.da_adds.reduce((acc,item)=> acc+item.sub_total,0);
                    this.pengadaan_add.status_pengadaan = "Sedang Dipesan";
                    console.log(this.pengadaan_add)
                    await Controller.insertPengadaan(this.pengadaan_add)
                    this.DetailAdd(this.da_adds);
                    this.showPengadaan();
                    this.clear();
                    //console.log(this.ds_adds[index])
                }catch(err) {
                    console.log(err)
                }
                $('#add').modal('hide')
                
            },
            async OpenAdd() {
                $('#add').modal('show')
            },
            async showPengadaan(){
                
                try {

                    this.tampung = await Controller.getPengadaan(this.search);
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
            clear() {
                this.edit = false;
                this.pengadaan_add.id_transaksi_pengadaan= '',
                this.pengadaan_add.id_supplier= '',
                this.pengadaan_add.id_cs= '',
                this.pengadaan_add.tanggal= '',
                this.pengadaan_add.status_pengadaan= '',
                this.pengadaan_add.total_harga= '',
                this.da_adds = []
            },
            
        }
    }
</script>