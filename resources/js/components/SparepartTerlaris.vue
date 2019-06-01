<template>
    <div>
        
        <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="6">
                    <table>
                        <tr>
                            <td class="title text-center">
                                <img :src="'public/gambar/AtmaAuto.jpg'" style="width:100%; max-width:300px;">
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">
                                Motorcycle Spareparts and Services <br>
                                Jl. Babarsari No.43,Yogyakarta (552181) <br>
                                Telp. (0274) 487711<br>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="total">
                <td colspan="6"></td>
            </tr>
            <tr >
                <td class="text-center" colspan="6"><h3>Laporan Sparepart Terlaris</h3></td>
            </tr>
            <table class="table">
                <tr  >
                <th>
                    No
                </th>
                <th >
                    Bulan
                </th>
                <th >
                    Nama Sparepart
                </th>
                <th >
                    Tipe Sparepart
                </th>
                <th class="text-right">
                    Jumlah Penjualan
                </th>
            </tr>
            
            <tr  v-for="(lapor,index) of laporan" v-bind:key="lapor['key']">
                <td>
                    {{index+1}}
                </td>
                <td class="text-left">
                    {{lapor.Bulan}}
                </td>
                <td>
                    {{lapor.NamaBarang}}
                </td>
                
                <td>
                    {{lapor.TipeBarang}}
                </td>
                <td class="text-right">
                    {{lapor.JumlahPenjualan}}
                </td>
                
            </tr>
        </table>
        <tr>
            <td colspan="6" class="text-right">dicetak tanggal {{new Date(tanggal).toLocaleDateString("en-GB", { year: 'numeric', month: 'long', day: 'numeric'})}}</td>
        </tr>

            
            
            
        </table>
        <!-- <div class="container mt-5">
            <line-chart v-bind:tahunEvent='$route.params.id'></line-chart>
        </div> -->
        <tr>
            <td></td>
        </tr>
        <button id="printPageButton" type="button" class="btn btn-danger" @click="Print">Print <i class="fa fa-print"/></button>
        <router-link id="printPageButton" :to="{ name: 'laporan'}" ><button type="button" class="btn btn-success">Back</button></router-link>
    </div>
    </div>
</template>
<script>

import Controller from '../httpController'
// import LineChart from './ChartBulanan.vue'
export default {
    name: 'sparepartterlaris',
    data(){
       return{
          laporan: '',
          jumlah: '',
          tanggal: '',
          tampung: [],
          tahun:'',
       }
     
   },
//    components: { 
//        'line-chart':LineChart 
//     },
    
   created(){
      this.showTransaksi();
      this.dates()
   },
    methods: {
        async Print(){
            window.print();
        },
        async showTransaksi(){
            this.tampung = await Controller.getsparepartterlaris(this.$route.params.id);
            this.tahun = this.$route.params.id;
            this.laporan = this.tampung.data;
            this.jumlah=this.laporan.reduce((acc,item)=> acc+item.JumlahPenjualan,0);
            console.log(this.tahun)
        },
        async dates(){
            var n =  new Date();
            var y = n.getFullYear();
            var m = ("0"+(n.getMonth() + 1)).slice(-2);
            var d = ("0"+(n.getDate())).slice(-2);
            this.tanggal = y + "-" + m + "-" + d;
            //console.log(this.tanggal)
        },
        
    },
}
</script>

<style>
        .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }
    
    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }
    
    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }
    
    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }
    
    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }
    
    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }
    
    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }
    
    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }
    
    .invoice-box table tr.item.last td {
        border-bottom: none;
    }
    
    .invoice-box table tr.total td {
        border-top: 3px solid #eee;
        font-weight: bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }
        
        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }
    
    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }
    
    .rtl table {
        text-align: right;
    }
    
    .rtl table tr td:nth-child(2) {
        text-align: left;
    }
    @media print {
        #printPageButton {
            display: none;
        }   
        
    }
    @page {
        margin: 0;
    }
</style>