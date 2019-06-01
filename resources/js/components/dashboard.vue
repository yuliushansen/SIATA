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
                <a @click="$auth.logout()" style="background-color:#00adb5;" class="list-group-item list-group-item-action">Logout</a>
                
        </div>
      </div>
  <div class="row" style="margin-top: 150px; margin-left:70px;">
    <div class="col mr-1">
      <img src="public/img/dash1.jpg" alt="..." class="shadow p-3 mb-5 rounded-circle mx-auto d-block" style="height: 350px;width: 350px;">
    </div>
    <div class="col mr-1">
      <img src="public/img/dash2.jpg" alt="..." class="shadow p-3 mb-5 rounded-circle mx-auto d-block" style="height: 350px;width: 350px;">
    </div>
    <div class="col">
      <img src="public/img/dash3.jpg" alt="..." class="shadow p-3 mb-5 rounded-circle mx-auto d-block" style="height: 350px;width: 350px;">
    </div>
  </div>
  </div>
</div>
</template>
