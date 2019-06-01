
// /**
//  * First we will load all of this project's JavaScript dependencies which
//  * includes Vue and other libraries. It is a great starting point when
//  * building robust, powerful web applications using Vue and Laravel.
//  */

// require('./bootstrap');

// window.Vue = require('vue');

// /**
//  * The following block of code may be used to automatically register your
//  * Vue components. It will recursively scan this directory for the Vue
//  * components and automatically register them with their "basename".
//  *
//  * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
//  */

// // const files = require.context('./', true, /\.vue$/i);
// // files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

// /**
//  * Next, we will create a fresh Vue application instance and attach it to
//  * the page. Then, you may begin adding components to this application
//  * or customize the JavaScript scaffolding to fit your unique needs.
//  */

// const app = new Vue({
//     el: '#app'
// });
//jwt : 1X1ZD5Ftg4YW2wFqicSuLPpbASIfNXqS
require('./bootstrap');

window.Vue = require('vue');

import Vue from 'vue';

import VueRouter from 'vue-router';

import axios from 'axios';

import VueAxios from 'vue-axios';

import App from './App.vue';

import Dashboard from './components/Dashboard.vue';

import Sparepart from './components/sparepart.vue';

import Jasa_service from './components/jasa_service.vue';

import Pegawai from './components/pegawai.vue';

import Cabang from './components/cabang.vue';

import Supplier from './components/supplier.vue';

import Detail from './components/detail_sparepart.vue';

import Transaksi from './components/transaksi.vue';

import Pembayaran from './components/pembayaran.vue';

import Nota from './components/nota.vue';

import SPK from './components/spk.vue';

import SP from './components/sp.vue';

import TampilService from './components/tampilservice.vue';

import Pengadaan from './components/pengadaan.vue';

import HistoryPengadaan from './components/historyPengadaan.vue';

import Home from './components/Home.vue';

import SparepartUser from './components/sparepartUser.vue';

import History from './components/HistoryUser.vue';

import Register from './components/Register.vue';

import Pelanggan from './components/pelanggan.vue';

import Motor from './components/motor.vue';

import Login from './components/Login.vue';
import pendapatanbycabang from './components/pendapatanbycabang.vue';
import pendapatanbulanan from './components/pendapatanbulanan.vue';
import pengeluaran from './components/pengeluaran.vue';
import sparepartterlaris from './components/sparepartterlaris.vue';
import laporanservice from './components/laporanservice.vue';
import laporan from './components/laporan.vue';
import sisastok from './components/sisastok.vue';

Vue.use(VueRouter);

Vue.use(VueAxios, axios);
Vue.component('chart-component', require('./components/Chart.vue'));
Vue.component('chart-component', require('./components/ChartBulanan.vue'));

axios.defaults.baseURL = 'api';

const router = new VueRouter({

    routes: [{

        path: '/',

        name: 'home',

        component: Home

    },
    {

        path: '/motor',

        name: 'motor',

        component: Motor,

        meta: {

            auth: true
        }

    },
    {

        path: '/laporan',

        name: 'laporan',

        component: laporan,

        meta: {

            auth: true
        }

    },
    {

        path: '/pendapatanbycabang',

        name: 'pendapatanbycabang',

        component: pendapatanbycabang,

        meta: {

            auth: true
        }

    },
    {

        path: '/pendapatanbulanan/:id',

        name: 'pendapatanbulanan',

        component: pendapatanbulanan,

        meta: {

            auth: true
        }

    },
    {

        path: '/sisastok/:tahun/:tipe',

        name: 'sisastok',

        component: sisastok,

        meta: {

            auth: true
        }

    },
    {

        path: '/laporanservice/:tahun/:bulan',

        name: 'laporanservice',

        component: laporanservice,

        meta: {

            auth: true
        }

    },
    {

        path: '/sparepartterlaris/:id',

        name: 'sparepartterlaris',

        component: sparepartterlaris,

        meta: {

            auth: true
        }

    },
    {

        path: '/pengeluaran/:id',

        name: 'pengeluaran',

        component: pengeluaran,

        meta: {

            auth: true
        }

    },
    {

        path: '/register',

        name: 'register',

        component: Register,

        meta: {

            auth: true
        }

    },
    {

        path: '/tampilservice',

        name: 'tampilservice',

        component: TampilService,

        meta: {

            auth: true
        }

    },
    {

        path: '/history',

        name: 'history',

        component: History,

        meta: {

            auth: false
        }

    },
    {

        path: '/login',

        name: 'login',

        component: Login,

        meta: {

            auth: false

        }

    },{

        path: '/dashboard',

        name: 'dashboard',

        component: Dashboard,

        meta: {

            auth: true

        }

    },
    {

        path: '/jasa_service',

        name: 'jasa_service',

        component: Jasa_service,

        meta: {

            auth: true

        }
    },
    {

        path: '/sparepart',

        name: 'sparepart',

        component: Sparepart,

        meta: {

            auth: true

        }
    },
    {

        path: '/sparepart/user',

        name: 'sparepartuser',

        component: SparepartUser,

        meta: {

            auth: false

        }
    },
    {

        path: '/pegawai',

        name: 'pegawai',

        component: Pegawai,

        meta: {

            auth: true

        }
    },
    {

        path: '/cabang',

        name: 'cabang',

        component: Cabang,

        meta: {

            auth: true

        }
    },
    {

        path: '/transaksi',

        name: 'transaksi',

        component: Transaksi,

        meta: {

            auth: true

        }
    },
    {

        path: '/pembayaran',

        name: 'pembayaran',

        component: Pembayaran,

        meta: {

            auth: true

        }
    },
    {

        path: '/supplier',

        name: 'supplier',

        component: Supplier,

        meta: {

            auth: true

        }
    },
    {

        path: '/pelanggan',

        name: 'pelanggan',

        component: Pelanggan,

        meta: {

            auth: true

        }
    },
    {

        path: '/pengadaan',

        name: 'pengadaan',

        component: Pengadaan,

        meta: {

            auth: true

        }
    },
    {

        path: '/historypengadaan',

        name: 'historypengadaan',

        component: HistoryPengadaan,

        meta: {

            auth: true

        }
    },
    {

        path: '/nota/:id',

        name: 'nota',

        component: Nota,

        meta: {

            auth: true

        }
    },
    {

        path: '/sp/:id',

        name: 'sp',

        component: SP,

        meta: {

            auth: true

        }
    },
    {

        path: '/spk/:id',

        name: 'spk',

        component: SPK,

        meta: {

            auth: true

        }
    },
    {

        path: '/detail_sparepart/:id',

        name: 'detail_sparepart',

        component: Detail,

        meta: {

            auth: false

        }
    },
]});

Vue.router = router

Vue.use(require('@websanova/vue-auth'), {

   auth: require('@websanova/vue-auth/drivers/auth/bearer.js'),

   http: require('@websanova/vue-auth/drivers/http/axios.1.x.js'),

   router: require('@websanova/vue-auth/drivers/router/vue-router.2.x.js'),

});

App.router = Vue.router

new Vue(App).$mount('#app');
