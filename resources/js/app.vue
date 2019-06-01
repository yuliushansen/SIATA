<template>
    <!-- <div class="d-flex panel panel-default" id="wrapper">
        <div class="panel-heading bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">Start Bootstrap </div>
      <div class="list-group list-group-flush">
        <li>
            <router-link :to="{ name: 'home' }">Home</router-link>
        </li>
        <li v-if="this.$auth.user().id_akun===1">
            <router-link :to="{ name: 'home' }"  >Home</router-link>
        </li>
      </div>
    </div>
    <div class="page-content-wrapper panel-body ml-5">
            <router-view></router-view>
        </div>
    </div> -->

    <div>
        <router-view></router-view>
    </div>
</template>