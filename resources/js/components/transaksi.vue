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
            <h3 class="col ml-4 mt-5" style="color: #2d4059;">Transaksi</h3>
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
                <input type="text" @keyup="showTransaksi()" placeholder="ID TRANSAKSI" name="search" class="tombol col-3 mb-3 mr-3 form-control" v-model="search">
            <!-- </div> -->
            
            </div>
            <table class="table text-light ">
                <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Id Transaksi</th> 
                    <th scope="col">Nama Cabang</th>
                    <th scope="col">Nama Kasir</th>
                    <th scope="col">Nama CS</th>
                    <th scope="col">Nama Pelanggan</th>
                    <th scope="col">Jenis Transaksi</th>
                    <th scope="col">Detail Transaksi</th>
                    <th scope="col">Tanggal Transaksi</th>
                    <th scope="col">Status Transaksi</th>
                    <th scope="col">Total Harga</th>
                    <th scope="col">Metode</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(transaksi,index) of transaksis.data" v-bind:key="transaksi['key']">
                    <td>{{index+1}}</td>
                    <td>{{transaksi.id_transaksi}}</td>
                    <td>
                        {{transaksi.cabang.nama_cabang}}
                    </td>
                    <td>{{transaksi.kasir.nama}}</td>
                    <td>{{transaksi.cs.nama}}</td>
                    <td>{{transaksi.pelanggan.nama_pelanggan}}</td>
                    <td>{{transaksi.jenis_transaksi}}</td>
                    <td>
                        <button type="button" class="btn btn-primary" @click="OpenDetail(transaksi)"><i class="far fa-eye"></i></button>
                    </td>
                    <td>{{transaksi.tanggal}}</td>
                    <td>{{transaksi.status_transaksi}}</td>
                    <td>{{transaksi.total_harga}}</td>
                    <td>
                         <router-link :to="{ name: 'spk', params: { id: transaksi.id_transaksi } }" ><button type="button" class="btn btn-primary"><i class="fa fa-print"/></button></router-link>
                        <button type="button" class="btn btn-success" @click="editTransaksi(transaksi)"><i class="fas fa-edit"></i></button>
                        <button type="button" class="btn btn-danger" @click="deleteTransaksi(transaksi)"><i class="far fa-trash-alt"/></button>
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
                    <th scope="col">Metode</th>
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
                    <td>
                        <button type="button" class="btn btn-danger" @click="deleteService(service)"><i class="far fa-trash-alt"/></button>
                    </td>
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
                    <th scope="col">Metode</th>
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
                    <td>
                        <button type="button" class="btn btn-danger" @click="deletePenjualan(penjualan)"><i class="far fa-trash-alt"/></button>
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
        <h5 class="modal-title text-dark" id="exampleModalLabel">Add Transaksi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form @submit.prevent="addTransaksi" class="form-horizontal ml-1" role="form">
      <div class="modal-body text-dark">
            <div class="form-group">
                <label for="id_kasir">Nama Kasir</label>
                <select name="kasir" class="custom-select" id="inputGroupSelect01" v-model="transaksi_add.id_kasir">
                    <!-- <option selected>Pilih...</option> -->
                    <option v-for="Kasir of Kasirs.data" v-bind:key="Kasir['key']" :value=Kasir.id_pegawai>{{Kasir.nama}}</option>
                </select>
            </div>
      
            <!-- <div class="form-group">
                <label for="id_cs">Id CS</label>
                <input id="id_cs" type="text" class="form-control" name="id_cs" v-model="transaksi_add.id_cs" autofocus>
            </div> -->
            
            <!-- <div class="form-group">
                <label for="id_cabang">Id Cabang</label>
                <input id="id_cabang" type="text" class="form-control" name="id_cabang" v-model="transaksi_add.id_cabang" autofocus readonly>
            </div> -->
            <div class="form-group">
                <label for="nama_pelanggan">Nama Pelanggan</label>
                <select name="nama_pelanggan" class="custom-select" id="inputGroupSelect01" @change="getMotor" v-model="transaksi_add.id_pelanggan">
                    <!-- <option selected>Pilih...</option> -->
                    <option v-for="Pelanggan of Pelanggans" v-bind:key="Pelanggan['key']"  :value=Pelanggan.id_pelanggan>{{Pelanggan.nama_pelanggan}}</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="jenis_transaksi">Jenis Transaksi</label>
                <select name="jenis_transaksi" class="custom-select" id="inputGroupSelect01" v-model="transaksi_add.jenis_transaksi">
                    <!-- <option selected>Pilih...</option> -->
                    <option value="SV">SV</option>
                    <option value="SP">SP</option>
                    <option value="SS">SS</option>
                </select>
            </div>
       
            <!-- <div class="form-group">
                <label for="tanggal">Tanggal Transaksi</label>
                <input id="tanggal" type="date" class="form-control" name="tanggal" v-model="transaksi_add.tanggal" autofocus readonly>
            </div> -->
            <!-- table form -->
            <div v-if="this.transaksi_add.jenis_transaksi == 'SV' || this.transaksi_add.jenis_transaksi == 'SS'" name="Detail_Service">
            <h5>Detail Service</h5>
            <table class="table table-sm ">
                <thead>
                    <tr>
                        <td><strong>No</strong></td>
                        <td><strong>Motor Pelanggan</strong></td>
                        <td><strong>Montir</strong></td>
                        <td><strong>Jasa Service</strong></td>
                        <td><strong>Jumlah</strong></td>
                        <td><strong>Subtotal</strong></td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(ds_add,index) of ds_adds" v-bind:key="ds_add['key']">
                        <td>{{index+1}}</td>
                        <td>
                            <div class="form-group">
                                <select name="motorpelanggan" class="custom-select" id="inputGroupSelect01" v-model="ds_add.id_motor">
                                
                                    <option v-for="motor of motorpelanggan.data" v-bind:key="motor['key']" :value=motor.id_motor>{{motor.nomor_polisi}}</option>
                                </select>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <select name="montir" class="custom-select" id="inputGroupSelect01" v-model="ds_add.id_montir">
                                
                                    <option v-for="montir of Montirs.data" v-bind:key="montir['key']" :value=montir.id_pegawai>{{montir.nama}}</option>
                                </select>
                            </div>
                        </td>
                         <td>
                            <div class="form-group">
                                <select name="jasa" class="custom-select" id="inputGroupSelect01" v-model="ds_add.jasa">
                                
                                    <option v-for="jasa of jasas" v-bind:key="jasa['key']" :value=jasa>{{jasa.nama_jasa}}</option>
                                </select>
                            </div>
                        </td>
                        <td><input id="jumlah" type="number" class=" form-control" v-model="ds_add.jumlah_jasa" name="jumlah" @keyup="subtotal(index)"></td>
                        <td><input id="jumlah" type="text" class=" form-control" v-model="ds_add.sub_total" name="jumlah" readonly></td>
                        <td><a v-on:click="removeElement(ds_add);" style="cursor: pointer">Remove</a></td>
                    </tr>
                </tbody>
            </table>
            <div>
                <button type="button" class="btn btn-primary" @click="addRow()">Add Row</button>
            </div>
      </div>
            <div v-if="this.transaksi_add.jenis_transaksi == 'SP' || this.transaksi_add.jenis_transaksi == 'SS'" name="Detail_Penjualan">
            <h5>Detail Penjualan</h5>
            <table class="table table-sm ">
                <thead>
                    <tr>
                        <td><strong>No</strong></td>
                        <td><strong>Motor Pelanggan</strong></td>
                        <td><strong>Sparepart</strong></td>
                        <td><strong>Jumlah</strong></td>
                        <td><strong>Subtotal</strong></td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(dp_add,index) of dp_adds" v-bind:key="dp_add['key']">
                        <td>{{index+1}}</td>
                        <td>
                            <div class="form-group">
                                <select name="motorpelanggan" class="custom-select" id="inputGroupSelect01" v-model="dp_add.id_motor">
                                
                                    <option v-for="motor of motorpelanggan.data" v-bind:key="motor['key']" :value=motor.id_motor>{{motor.nomor_polisi}}</option>
                                </select>
                            </div>
                        </td>
                         <td>
                            <div class="form-group">
                                <select name="jasa" class="custom-select" id="inputGroupSelect01" v-model="dp_add.sparepart">
                                
                                    <option v-for="sparepart of spareparts" v-bind:key="sparepart['key']" :value=sparepart>{{sparepart.nama_sparepart}}</option>
                                </select>
                            </div>
                        </td>
                        <td><input id="jumlah" type="number" class=" form-control" v-model="dp_add.jumlah_sparepart" name="jumlah" @keyup="subtotals(index)"></td>
                        <td><input id="jumlah" type="text" class=" form-control" v-model="dp_add.sub_total" name="jumlah" readonly></td>
                        <td><a v-on:click="removeElements(dp_add);" style="cursor: pointer">Remove</a></td>
                    </tr>
                </tbody>
            </table>
            <div>
                <button type="button" class="btn btn-primary" @click="addRows()">Add Row</button>
            </div>
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
      <form @submit.prevent="EditMaster" class="form-horizontal ml-1" role="form">
      <div class="modal-body text-dark">
            <div class="form-group">
                <label for="id_kasir">Nama Kasir</label>
                <select name="kasir" class="custom-select" id="inputGroupSelect01" v-model="transaksi_edit.id_kasir">
                    <!-- <option selected>Pilih...</option> -->
                    <option v-for="Kasir of Kasirs.data" v-bind:key="Kasir['key']" :value=Kasir.id_pegawai>{{Kasir.nama}}</option>
                </select>
            </div>
            <div class="form-group">
                <label for="nama_pelanggan">Nama Pelanggan</label>
                <select name="nama_pelanggan" class="custom-select" id="inputGroupSelect01" @change="getMotors" v-model="transaksi_edit.id_pelanggan">
                    <!-- <option selected>Pilih...</option> -->
                    <option v-for="Pelanggan of Pelanggans" v-bind:key="Pelanggan['key']"  :value=Pelanggan.id_pelanggan>{{Pelanggan.nama_pelanggan}}</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="jenis_transaksi">Jenis Transaksi</label>
                <select name="jenis_transaksi" class="custom-select" id="inputGroupSelect01" v-model="transaksi_edit.jenis_transaksi">
                    <!-- <option selected>Pilih...</option> -->
                    <option value="SV">SV</option>
                    <option value="SP">SP</option>
                    <option value="SS">SS</option>
                </select>
            </div>
            <div class="form-group">
                <label for="jenis_transaksi">Status Transaksi</label>
                <select name="jenis_transaksi" class="custom-select" id="inputGroupSelect01" v-model="transaksi_edit.status_transaksi">
                    <!-- <option selected>Pilih...</option> -->
                    <option value="Lunas">Lunas</option>
                    <option value="Belum Lunas">Belum Lunas</option>
                </select>
            </div>
       
            <!-- <div class="form-group">
                <label for="tanggal">Tanggal Transaksi</label>
                <input id="tanggal" type="date" class="form-control" name="tanggal" v-model="transaksi_add.tanggal" autofocus readonly>
            </div> -->
            <!-- table form -->
            <div v-if="this.transaksi_edit.jenis_transaksi == 'SV' || this.transaksi_edit.jenis_transaksi == 'SS'" name="Detail_Service">
            <h5>Detail Service</h5>
            <table class="table table-sm ">
                <thead>
                    <tr>
                        <td><strong>No</strong></td>
                        <td><strong>Motor Pelanggan</strong></td>
                        <td><strong>Montir</strong></td>
                        <td><strong>Jasa Service</strong></td>
                        <td><strong>Jumlah</strong></td>
                        <td><strong>Subtotal</strong></td>
                        <td><strong>Status Service</strong></td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(ds_edit,index) of ds_edits" v-bind:key="ds_edit['key']">
                        <td>{{index+1}}</td>
                        <td>
                            <div class="form-group">
                                <select name="motorpelanggan" class="custom-select" id="inputGroupSelect01" v-model="ds_edit.detail.id_motor">
                                
                                    <option v-for="motor of motorpelanggan.data" v-bind:key="motor['key']" :value=motor.id_motor>{{motor.nomor_polisi}}</option>
                                </select>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <select name="montir" class="custom-select" id="inputGroupSelect01" v-model="ds_edit.id_montir">
                                
                                    <option v-for="montir of Montirs.data" v-bind:key="montir['key']" :value=montir.id_pegawai>{{montir.nama}}</option>
                                </select>
                            </div>
                        </td>
                         <td>
                            <div class="form-group">
                                <select name="jasa" class="custom-select" id="inputGroupSelect01" v-model="ds_edit.id_jasa" @change="subtotaledit(index)">
                                
                                    <option v-for="jasa of jasas" v-bind:key="jasa['key']" :value=jasa.id_jasa>{{jasa.nama_jasa}}</option>
                                </select>
                            </div>
                        </td>
                        <td><input id="jumlah" type="number" class=" form-control" v-model="ds_edit.jumlah_jasa" name="jumlah" @keyup="subtotaledit(index)"></td>
                        <td><input id="jumlah" type="text" class=" form-control" v-model="ds_edit.sub_total" name="jumlah" readonly></td>
                        <td>
                            <div class="form-group">
                                <select name="jenis_transaksi" class="custom-select" id="inputGroupSelect01" v-model="ds_edit.status_service">
                                    <!-- <option selected>Pilih...</option> -->
                                    <option value="Selesai">Selesai</option>
                                    <option value="Belum Selesai">Belum Selesai</option>
                                </select>
                            </div>
                        </td>
                        <td><a v-on:click="removeElementedit(ds_edit);" style="cursor: pointer">Remove</a></td>
                    </tr>
                </tbody>
            </table>
            <div>
                <button type="button" class="btn btn-primary" @click="editRow()">Add Row</button>
            </div>
      </div>
            <div v-if="this.transaksi_edit.jenis_transaksi == 'SP' || this.transaksi_edit.jenis_transaksi == 'SS'" name="Detail_Penjualan">
            <h5>Detail Penjualan</h5>
            <table class="table table-sm ">
                <thead>
                    <tr>
                        <td><strong>No</strong></td>
                        <td><strong>Motor Pelanggan</strong></td>
                        <td><strong>Sparepart</strong></td>
                        <td><strong>Jumlah</strong></td>
                        <td><strong>Subtotal</strong></td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(dp_edit,index) of dp_edits" v-bind:key="dp_edit['key']">
                        <td>{{index+1}}</td>
                        <td>
                            <div class="form-group">
                                <select name="motorpelanggan" class="custom-select" id="inputGroupSelect01" v-model="dp_edit.detail.id_motor">
                                
                                    <option v-for="motor of motorpelanggan.data" v-bind:key="motor['key']" :value=motor.id_motor>{{motor.nomor_polisi}}</option>
                                </select>
                            </div>
                        </td>
                         <td>
                            <div class="form-group">
                                <select name="jasa" class="custom-select" id="inputGroupSelect01" v-model="dp_edit.id_sparepart" @change="subtotalsedit(index)">
                                
                                    <option v-for="sparepart of spareparts" v-bind:key="sparepart['key']" :value=sparepart.id_sparepart>{{sparepart.nama_sparepart}}</option>
                                </select>
                            </div>
                        </td>
                        <td><input id="jumlah" type="number" class=" form-control" v-model="dp_edit.jumlah_sparepart" name="jumlah" @keyup="subtotalsedit(index)"></td>
                        <td><input id="jumlah" type="text" class=" form-control" v-model="dp_edit.sub_total" name="jumlah" readonly></td>
                        <td><a v-on:click="removeElementsedit(dp_edit);" style="cursor: pointer">Remove</a></td>
                    </tr>
                </tbody>
            </table>
            <div>
                <button type="button" class="btn btn-primary" @click="editRows()">Add Row</button>
            </div>
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
            }
        },
        created() {
            this.showTransaksi();
            this.showKasir();
            this.getMontir();
            this.showPelanggan();
            this.showPegawai();
            this.dates();
            this.getJasa();
            this.getSparepart();
        },
        
        methods:{
            async deleteService(service) {
           
                try {
                    
                    this.tampung = await Controller.getTransaksibyID(service.id_transaksi)
                    var a = this.tampung.data.total_harga-service.sub_total;
                    this.tampung.data.total_harga = a;
                    
                    await Controller.deleteService(service.id_transaksi_service);
                    await Controller.editTransaksi(this.tampung.data.id_transaksi,this.tampung.data);
                    this.showTransaksi();
                    $('#exampleModal').modal('hide')
                } catch (err) {
                    console.log(err)
                }
            },
            async deletePenjualan(penjualan) {
           
                try {
                    
                    this.tampung = await Controller.getDetSparepart(penjualan.id_sparepart);
                    this.tampung.data.jumlah_sparepart = this.tampung.data.jumlah_sparepart + penjualan.jumlah_sparepart
                    await Controller.editSparepart(this.tampung.data.id_sparepart,this.tampung.data);
                    // penjualan.sparepart.jumlah_sparepart = penjualan.sparepart.jumlah_sparepart + penjualan.jumlah_sparepart
                    // await Controller.editSparepart(penjualan.sparepart.id_sparepart,penjualan.sparepart);
                    await Controller.deletePenjualan(penjualan.id_transaksi_penjualan);
                    this.tampung = await Controller.getTransaksibyID(penjualan.id_transaksi)
                    var a = this.tampung.data.total_harga - penjualan.sub_total;
                    this.tampung.data.total_harga = a;
                    await Controller.editTransaksi(this.tampung.data.id_transaksi,this.tampung.data);
                    this.showTransaksi();
                    $('#exampleModal').modal('hide')
                } catch (err) {
                    console.log(err)
                }
            },
            async deleteTransaksi(transaksi){
                //console.log(transaksi)
                if(transaksi.jenis_transaksi === "SV"){
                    for(var index in transaksi.service){
                        await Controller.deleteService(transaksi.service[index].id_transaksi_service);
                        
                    }
                    
                }
                else if(transaksi.jenis_transaksi === "SP"){
                    for(var index in transaksi.penjualan){
                        this.tampung = await Controller.getDetSparepart(transaksi.penjualan[index].sparepart.id_sparepart);
                        this.tampung.data.jumlah_sparepart = this.tampung.data.jumlah_sparepart + transaksi.penjualan[index].jumlah_sparepart
                        await Controller.editSparepart(this.tampung.data.id_sparepart,this.tampung.data);
                        await Controller.deletePenjualan(transaksi.penjualan[index].id_transaksi_penjualan);
                    }
                }
                else if(transaksi.jenis_transaksi === "SS"){
                    for(var index in transaksi.penjualan){
                        this.tampung = await Controller.getDetSparepart(transaksi.penjualan[index].sparepart.id_sparepart);
                        this.tampung.data.jumlah_sparepart = this.tampung.data.jumlah_sparepart + transaksi.penjualan[index].jumlah_sparepart
                        await Controller.editSparepart(this.tampung.data.id_sparepart,this.tampung.data);
                        await Controller.deletePenjualan(transaksi.penjualan[index].id_transaksi_penjualan);
                    }
                    for(var a in transaksi.service){
                        await Controller.deleteService(transaksi.service[a].id_transaksi_service);
                    }
                }
                await Controller.deleteDetail(transaksi.id_transaksi);
                await Controller.deleteTransaksi(transaksi.id_transaksi);
                this.showTransaksi();
            },
            async editTransaksi(transaksi){
                
                this.transaksi_edit.id_cabang = transaksi.id_cabang;
                this.transaksi_edit.id_transaksi = transaksi.id_transaksi;
                this.transaksi_edit.id_kasir = transaksi.id_kasir;
                this.transaksi_edit.id_cs = transaksi.id_cs;
                this.transaksi_edit.id_pelanggan = transaksi.id_pelanggan;
                this.transaksi_edit.tanggal = transaksi.tanggal;
                this.transaksi_edit.status_transaksi = transaksi.status_transaksi;
                this.transaksi_edit.total_harga = transaksi.total_harga;
                this.transaksi_edit.jenis_transaksi = transaksi.jenis_transaksi;
                this.ds_edits = transaksi.service;
                this.dp_edits = transaksi.penjualan;
                this.getMotors();
                this.EditModal();
            },
            async EditMaster(){
                
                if(this.transaksi_edit.jenis_transaksi === "SV"){
                    
                    for(var a in this.ds_edits){
                        if(this.ds_edits[a].id_detail === ""){
                            this.ds_edits[a].id_transaksi = this.transaksi_edit.id_transaksi;
                            await Controller.postdetail(this.ds_edits[a].id_transaksi,this.ds_edits[a].detail.id_motor);
                            this.tampung = await Controller.detailLast();
                            this.ds_edits[a].id_detail = this.tampung.data.id_detail;
                            //console.log(this.ds_edits)
                            await Controller.postservice(this.ds_edits[a]);
                        }else{
                            await Controller.editservice(this.ds_edits[a].id_transaksi_service,this.ds_edits[a]);
                        }
                        
                    }
                }
                else if(this.transaksi_edit.jenis_transaksi === "SP"){
                    
                    for(var a in this.dp_edits){
                        if(this.dp_edits[a].id_detail === ""){
                            this.dp_edits[a].id_transaksi = this.transaksi_edit.id_transaksi;
                            await Controller.postdetail(this.dp_edits[a].id_transaksi,this.dp_edits[a].detail.id_motor);
                            this.tampung = await Controller.detailLast();
                            this.dp_edits[a].id_detail = this.tampung.data.id_detail;
                            //console.log(this.dp_edits)
                            this.tampung = await Controller.getDetSparepart(this.dp_edits[a].id_sparepart);
                            this.tampung.data.jumlah_sparepart = this.tampung.data.jumlah_sparepart- this.dp_edits[a].jumlah_sparepart
                            await Controller.editSparepart(this.tampung.data.id_sparepart,this.tampung.data);

                            await Controller.postpenjualan(this.dp_edits[a]);
                        }else{
                            this.tampung = await Controller.getPenjualanbyID(this.dp_edits[a].id_transaksi_penjualan);
                            if(this.tampung.data.jumlah_sparepart !== this.dp_edits[a].jumlah_sparepart){
                                var temp = this.tampung.data.jumlah_sparepart;
                                this.tampung = await Controller.getDetSparepart(this.dp_edits[a].id_sparepart);
                                this.tampung.data.jumlah_sparepart = this.tampung.data.jumlah_sparepart- this.dp_edits[a].jumlah_sparepart + temp
                                await Controller.editSparepart(this.tampung.data.id_sparepart,this.tampung.data);
                            }
                            await Controller.editpenjualan(this.dp_edits[a].id_transaksi_penjualan,this.dp_edits[a]);
                        }
                        if(this.transaksi_edit.status_transaksi === "Lunas"){
                            this.his.id_sparepart = this.dp_edits[a].id_sparepart;
                            this.his.tanggal = this.transaksi_edit.tanggal;
                            this.his.jumlah_masuk = 0;
                            this.his.jumlah_keluar = this.dp_edits[a].jumlah_sparepart;
                            await Controller.posthis(this.his);
                        }
                    }
                }
                else {
                    for(var a in this.ds_edits){
                        if(this.ds_edits[a].id_detail === ""){
                            this.ds_edits[a].id_transaksi = this.transaksi_edit.id_transaksi;
                            await Controller.postdetail(this.ds_edits[a].id_transaksi,this.ds_edits[a].detail.id_motor);
                            this.tampung = await Controller.detailLast();
                            this.ds_edits[a].id_detail = this.tampung.data.id_detail;
                            //console.log(this.ds_edits)
                            await Controller.postservice(this.ds_edits[a]);
                        }else{
                            await Controller.editservice(this.ds_edits[a].id_transaksi_service,this.ds_edits[a]);
                        }
                        
                    }
                    for(var a in this.dp_edits){
                        if(this.dp_edits[a].id_detail === ""){
                            this.dp_edits[a].id_transaksi = this.transaksi_edit.id_transaksi;
                            await Controller.postdetail(this.dp_edits[a].id_transaksi,this.dp_edits[a].detail.id_motor);
                            this.tampung = await Controller.detailLast();
                            this.dp_edits[a].id_detail = this.tampung.data.id_detail;
                            //console.log(this.dp_edits)
                            await Controller.postpenjualan(this.dp_edits[a]);
                        }else{
                            await Controller.editpenjualan(this.dp_edits[a].id_transaksi_penjualan,this.dp_edits[a]);
                        }
                        if(this.transaksi_edit.status_transaksi === "Lunas"){
                            this.his.id_sparepart = this.dp_edits[a].id_sparepart;
                            this.his.tanggal = this.transaksi_edit.tanggal;
                            this.his.jumlah_masuk = 0;
                            this.his.jumlah_keluar = this.dp_edits[a].jumlah_sparepart;
                            await Controller.posthis(this.his);
                        }
                    }
                }
                if(this.transaksi_edit.jenis_transaksi === "SV"){
                    this.transaksi_edit.total_harga = this.ds_edits.reduce((acc,item)=> acc+item.sub_total,0);
                }else if(this.transaksi_edit.jenis_transaksi === "SP"){
                    this.transaksi_edit.total_harga = this.dp_edits.reduce((acc,item)=> acc+item.sub_total,0);
                }else{
                    this.transaksi_edit.total_harga = this.dp_edits.reduce((acc,item)=> acc+item.sub_total,0)+this.ds_edits.reduce((acc,item)=> acc+item.sub_total,0);
                }                
                await Controller.editTransaksi(this.transaksi_edit.id_transaksi,this.transaksi_edit);
                this.showTransaksi();
                $('#edit').modal('hide')
            },
            async EditModal(){
                $('#edit').modal('show')
            },
            async addTransaksi(){
               
                try{
                    this.transaksi_add.id_cs = this.$auth.user().id_pegawai;
                    if(this.ds_adds.length !== 0 && this.dp_adds.length === 0){
                        this.transaksi_add.total_harga = this.ds_adds.reduce((acc,item)=> acc+item.sub_total,0);
                    }else if(this.dp_adds.length !==0 && this.ds_adds.length === 0){
                        this.transaksi_add.total_harga = this.dp_adds.reduce((acc,item)=> acc+item.sub_total,0);
                    }else{
                        this.transaksi_add.total_harga = this.dp_adds.reduce((acc,item)=> acc+item.sub_total,0)+this.ds_adds.reduce((acc,item)=> acc+item.sub_total,0);
                        
                    }
                    
                    this.transaksi_add.status_transaksi = "Belum Lunas";
                    await Controller.insertTransaksi(this.transaksi_add)
                    if(this.ds_adds.length > 0){
                        this.getLast(this.ds_adds);
                    }
                    if(this.dp_adds.length > 0){
                        this.getLasts(this.dp_adds);
                    }

                    this.showTransaksi();
                    this.clear();

                    
                    
                    //console.log(this.ds_adds[index])
                }catch(err) {
                    console.log(err)
                }
                $('#add').modal('hide')
            },
            
            async subtotal(index){
                this.ds_adds[index].sub_total = this.ds_adds[index].jasa.harga_jasa * this.ds_adds[index].jumlah_jasa;
                this.ds_adds[index].id_jasa = this.ds_adds[index].jasa.id_jasa
            },
            async subtotals(index){
                this.dp_adds[index].sub_total = this.dp_adds[index].sparepart.harga_jual * this.dp_adds[index].jumlah_sparepart;
                this.dp_adds[index].id_sparepart = this.dp_adds[index].sparepart.id_sparepart
            },
            async subtotaledit(index){
                this.tampung = await Controller.getJasabyID(this.ds_edits[index].id_jasa);
                this.harga = this.tampung.data;
                this.ds_edits[index].sub_total = this.harga.harga_jasa * this.ds_edits[index].jumlah_jasa;
            },
            async subtotalsedit(index){
                this.tampung = await Controller.getDetSparepart(this.dp_edits[index].id_sparepart);
                this.harga = this.tampung.data;
                this.dp_edits[index].sub_total = this.harga.harga_jual * this.dp_edits[index].jumlah_sparepart;
            },
            async getLasts(dp_adds){
                
                try {
                  
                  //alert("Register berhasil !!")
                  //console.log(this.tampung.data)
                    //console.log(this.id_ts)   
                    for(var index in dp_adds){
                        this.tampung = await Controller.getLast();
                        dp_adds[index].id_transaksi = this.tampung.data.id_transaksi;
                        //console.log(dp_adds[index])
                        // dp_adds[index].sparepart.jumlah_sparepart = dp_adds[index].sparepart.jumlah_sparepart - dp_adds[index].jumlah_sparepart
                        // //console.log(dp_adds[index])
                        // await Controller.editSparepart(dp_adds[index].sparepart.id_sparepart,dp_adds[index].sparepart);
                        this.tampung = await Controller.getDetSparepart(dp_adds[index].sparepart.id_sparepart);
                        this.tampung.data.jumlah_sparepart = this.tampung.data.jumlah_sparepart - dp_adds[index].jumlah_sparepart
                        await Controller.editSparepart(this.tampung.data.id_sparepart,this.tampung.data);
                        this.tampung = await Controller.getdetail(dp_adds[index].id_transaksi,dp_adds[index].id_motor);
                            
                        // if(this.tampung.data.length !== 0){
                        //     dp_adds[index].id_detail = this.tampung.data[0].id_detail;
                        // }
                        // else{
                            await Controller.postdetail(dp_adds[index].id_transaksi,dp_adds[index].id_motor);
                            this.tampung = await Controller.detailLast();
                            
                            if(this.tampung.data.length !== 0){
                                dp_adds[index].id_detail = this.tampung.data.id_detail;
                            }
                        //}
                        await Controller.postpenjualan(dp_adds[index]);
                    }
                              
                } catch (err) {
                    console.log(err)
                }
            },
            async getLast(ds_adds){
                
                try {
                    for(var a in ds_adds){
                        this.tampung = await Controller.getLast();
                        //console.log(ds_adds)
                        ds_adds[a].id_transaksi = this.tampung.data.id_transaksi;
                        // this.tampung = await Controller.getdetail(ds_adds[a].id_transaksi,ds_adds[a].id_motor);
                            
                        // if(this.tampung.data.length !== 0){
                        //     ds_adds[a].id_detail = this.tampung.data[0].id_detail;
                        // }
                        // else{
                            await Controller.postdetail(ds_adds[a].id_transaksi,ds_adds[a].id_motor);
                            this.tampung = await Controller.detailLast();
                            
                            if(this.tampung.data.length !== 0){
                                ds_adds[a].id_detail = this.tampung.data.id_detail;
                            }
                        //}
                        await Controller.postservice(ds_adds[a]);
                    }
                              
                } catch (err) {
                    console.log(err)
                }
            },
            async getMontir(){
                
                try {
                    
                  this.tampung = await Controller.getbyRole('Montir');
                  //alert("Register berhasil !!")
                  this.Montirs = this.tampung.data;
                            
                              
                } catch (err) {
                    console.log(err)
                }
            },
            async getJasa(){
                
                try {

                    this.tampung = await Controller.getjasa();
                    //alert("Register berhasil !!")
                    this.jasas = this.tampung.data;
                    //console.log(this.transaksis)
                    
                    
                } catch (err) {
                    console.log(err)
                }
                
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
            async getMotor(){
                try {

                    this.tampung = await Controller.getMotorPelanggan(this.transaksi_add.id_pelanggan);
                    //alert("Register berhasil !!")
                    this.motorpelanggan = this.tampung.data;
                    //console.log(this.motorpelanggan)
                    
                    
                } catch (err) {
                    console.log(err)
                }
            },
            async getMotors(){
                try {

                    this.tampung = await Controller.getMotorPelanggan(this.transaksi_edit.id_pelanggan);
                    //alert("Register berhasil !!")
                    this.motorpelanggan = this.tampung.data;
                    //console.log(this.motorpelanggan)
                    
                    
                } catch (err) {
                    console.log(err)
                }
            },
            async addRow() {
                this.ds_adds.push({ jasa:[],
                    id_motor:'',
                    id_detail:'',
                    id_montir:'',
                    id_jasa:'',
                    id_transaksi:'',
                    sub_total:'',
                    jumlah_jasa:'',
                    status_service:'Belum Selesai', });
            },
            async addRows() {
                this.dp_adds.push({ sparepart:[],
                    id_motor:'',
                    id_detail:'',
                    id_sparepart:'',
                    id_transaksi:'',
                    sub_total:'',
                    jumlah_sparepart:'',});
            },
            async editRow() {
                this.ds_edits.push({ jasa:[],
                    detail:{
                        id_motor:''
                    },
                    id_detail:'',
                    id_montir:'',
                    id_jasa:'',
                    id_transaksi:'',
                    sub_total:'',
                    jumlah_jasa:'',
                    status_service:'Belum Selesai', });
            },
            async editRows() {
                this.dp_edits.push({ sparepart:[],
                    detail:{
                        id_motor:''
                    },
                    id_detail:'',
                    id_sparepart:'',
                    id_transaksi:'',
                    sub_total:'',
                    jumlah_sparepart:'',});
            },
            async removeElement(ds_add) {
                var index = this.ds_adds.indexOf(ds_add);
                this.ds_adds.splice(index, 1);
            },
            async removeElements(dp_add) {
                var index = this.dp_adds.indexOf(dp_add);
                this.dp_adds.splice(index, 1);
            },
            async removeElementedit(ds_edit) {
                var index = this.ds_edits.indexOf(ds_edit);
                this.ds_edits.splice(index, 1);
            },
            async removeElementsedit(dp_edit) {
                var index = this.dp_edits.indexOf(dp_edit);
                this.dp_edits.splice(index, 1);
            },
            async dates(){
                var n =  new Date();
                var y = n.getFullYear();
                var m = ("0"+(n.getMonth() + 1)).slice(-2);
                var d = ("0"+(n.getDate())).slice(-2);
                this.transaksi_add.tanggal = y + "-" + m + "-" + d;
                console.log(this.transaksi_add.tanggal)
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
            async showKasir(){
                
                try {
                    
                  this.tampung = await Controller.getbyRole('Kasir');
                  //alert("Register berhasil !!")
                  this.Kasirs = this.tampung.data;
                            
                              
                } catch (err) {
                    console.log(err)
                }
            },
            async showPegawai(){
                
                try {
                    
                  this.tampung = await Controller.getPegawaibyID(this.$auth.user().id_pegawai);
                  //alert("Register berhasil !!")
                  this.transaksi_add.id_cabang = this.tampung.data.data.id_cabang;
                  //console.log(this.pegawai_cabang)
                              
                } catch (err) {
                    console.log(err)
                }
            },
            async showPelanggan(){
                
                try {
                    
                  this.tampung = await Controller.getPelangganAll();
                  //alert("Register berhasil !!")
                  this.Pelanggans = this.tampung.data;
                            
                              
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
            async OpenAdd() {
                $('#add').modal('show')
            },
            async addJasa() {
            if (this.edit === false) {
                
                try {
                    await Controller.insertJasa(this.jasa)
                    //alert("Register berhasil !!")
                    //.log("Success")
                    this.clearForm();
                    //alert('Mobil Added');
                    this.showJasa();
                    this.state = true;
                    
                } catch (err) {
                    console.log(err)
                }
            }else{
                
                
                
                try {
                    await Controller.editJasa(this.jasa.id_jasa,this.jasa)
                    //alert("Register berhasil !!")
                    //console.log("Success")
                    this.clearForm();
                    // alert('Article Updated');
                    this.showJasa();
                    this.stateEdit = true;
                    
                } catch (err) {
                    console.log(err)
                }
            } 
            },
            editJasa(jasa) {
              this.edit = true;
              this.jasa.id_jasa = jasa.id_jasa;
              this.jasa.nama_jasa = jasa.nama_jasa;
              this.jasa.harga_jasa = jasa.harga_jasa;
              
              //console.log(this.mobil.image);
              this.state = false;
            },
            async deleteJasa(id_jasa) {
           
                try {
                    await Controller.deleteJasa(id_jasa)
                    //alert("Register berhasil !!")
                    //console.log("Success")
                    this.showJasa();
                    
                    
                } catch (err) {
                    console.log(err)
                }
            },
            clearForm() {
              this.edit = false;
              this.jasa.id_jasa = '';
              this.jasa.nama_jasa = '';
              this.jasa.harga_jasa = '';
            },
            clear() {
                this.edit = false;
                this.transaksi_add.id_transaksi= '',
                this.transaksi_add.id_kasir= '',
                this.transaksi_add.id_cs= '',
                this.transaksi_add.id_pelanggan= '',
                this.transaksi_add.jenis_transaksi= '',
                this.transaksi_add.status_transaksi= '',
                this.transaksi_add.total_harga= '',
                this.ds_adds = [],
                this.dp_adds = []
            },
        }
    }
</script>