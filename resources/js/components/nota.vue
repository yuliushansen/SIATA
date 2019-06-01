<template>
    <div>
        
        <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="7">
                    <table>
                        <tr>
                            <td class="title">
                                <img :src="'public/gambar/AtmaAuto.jpg'" style="width:100%; max-width:300px;">
                            </td>
                            
                            
                            <td>
                                Transaksi : {{transaksi.data.jenis_transaksi}}-{{transaksi.data.tanggal}}-{{transaksi.data.id_transaksi}}<br>
                                <p>Tanggal: {{new Date(transaksi.data.tanggal).toLocaleDateString("en-GB", {weekday: 'long', year: 'numeric', month: 'long', day: 'numeric'})}}</p><br>
                                
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="total">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr >
                <td></td>
                <td></td>
                <td></td>
                <td class="text-center"><h3>Nota Lunas</h3></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr class="total">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            
            <tr class="information">
                <td colspan="7">
                    <table>
                        <tr>
                            <td>
                                Customer: {{transaksi.data.pelanggan.nama_pelanggan}}<br>
                                Telepon: {{transaksi.data.pelanggan.nomor_pelanggan}}<br>
                                <!-- Sunnyville, CA 12345 -->
                            </td>
                            
                            <td>
                                CS: {{transaksi.data.cs.nama}}<br>
                                Kasir: {{transaksi.data.kasir.nama}}<br>
                                <!-- john@example.com -->
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <!-- Penjualan -->
            <tr class="total" v-if="transaksi.data.jenis_transaksi ==='SP' || transaksi.data.jenis_transaksi ==='SS'">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr v-if="transaksi.data.jenis_transaksi ==='SP' || transaksi.data.jenis_transaksi ==='SS'">
                <td></td>
                <td></td>
                <td></td>
                <td class="text-center"><h3>Sparepart</h3></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr class="total" v-if="transaksi.data.jenis_transaksi ==='SP' || transaksi.data.jenis_transaksi ==='SS'">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr class="heading" v-if="transaksi.data.jenis_transaksi ==='SP' || transaksi.data.jenis_transaksi ==='SS'">
                <td>
                    Kode
                </td>
                <td class="text-left">
                    Nama
                </td>
                <td class="text-left">
                    Merk
                </td>
                <td class="text-left">
                    Rak
                </td>
                <td class="text-left">
                    Harga
                </td>
                <td>
                    Jumlah
                </td>
                <td>
                    Sub Total
                </td>
            </tr>
            
            <tr class="details" v-if="transaksi.data.jenis_transaksi ==='SP' || transaksi.data.jenis_transaksi ==='SS'" v-for="(trans) of transaksi.data.penjualan" v-bind:key="trans['key']">
                <td>
                    {{trans.sparepart.kode_sparepart}}
                </td>
                <td class="text-left">
                    {{trans.sparepart.nama_sparepart}}
                </td>
                <td class="text-left">
                    {{trans.sparepart.merk_sparepart}}
                </td>
                <td class="text-left">
                    {{trans.sparepart.lokasi_sparepart}}
                </td>
                <td class="text-left">
                    Rp.{{trans.sparepart.harga_jual}}
                </td>
                <td class="text-right">
                    {{trans.jumlah_sparepart}}
                </td>
                <td class="text-right">
                    Rp.{{trans.sub_total}}
                </td>
            </tr>
            <tr class="total" v-if="transaksi.data.jenis_transaksi ==='SP' || transaksi.data.jenis_transaksi ==='SS'">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td class="text-right">
                   Rp.{{jumlahs}}
                </td>
            </tr>
            <!-- Service -->
            <tr class="total" v-if="transaksi.data.jenis_transaksi ==='SV' || transaksi.data.jenis_transaksi ==='SS'">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr v-if="transaksi.data.jenis_transaksi ==='SV' || transaksi.data.jenis_transaksi ==='SS'">
                <td></td>
                <td></td>
                <td></td>
                <td class="text-center"><h3>Service</h3></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr class="total" v-if="transaksi.data.jenis_transaksi ==='SV' || transaksi.data.jenis_transaksi ==='SS'">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr class="heading" v-if="transaksi.data.jenis_transaksi ==='SV' || transaksi.data.jenis_transaksi ==='SS'">
                <td>
                    Kode
                </td>
                <td class="text-left">
                    Nama Montir
                </td>
                <td class="text-left">
                    Plat Nomor
                </td>
                <td class="text-left">
                    Nama Service
                </td>
                <td class="text-left">
                    Harga Service
                </td>
                <td class="text-left">
                    Jumlah
                </td>
                <td class="text-center">
                    Sub Total
                </td>
            </tr>
            
            <tr v-if="transaksi.data.jenis_transaksi ==='SV' || transaksi.data.jenis_transaksi ==='SS'" class="details" v-for="(trans) of transaksi.data.service" v-bind:key="trans['key']">
                <td>
                    00{{trans.id_transaksi_service}}
                </td>
                <td class="text-left">
                    {{trans.montir.nama}}
                </td>
                <td class="text-left">
                    {{trans.detail.motor.nomor_polisi}}
                </td>
                <td class="text-left">
                    {{trans.jasa.nama_jasa}}
                </td>
                <td class="text-left">
                    Rp.{{trans.jasa.harga_jasa}}
                </td>
                <td class="text-right">
                    {{trans.jumlah_jasa}}
                </td>
                <td class="text-right">
                    Rp.{{trans.sub_total}}
                </td>
            </tr>
            <tr class="total" v-if="transaksi.data.jenis_transaksi ==='SV' || transaksi.data.jenis_transaksi ==='SS'">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                   Rp.{{jumlah}}
                </td>
            </tr>
            <tr class="total" v-if="transaksi.data.jenis_transaksi ==='SV' || transaksi.data.jenis_transaksi ==='SS'">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr class="information">
                <td colspan="7">
                    <table>
                        <tr>
                            <td>
                                <tr>
                                    <td>Customer</td>
                                </tr>
                                <tr>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>({{transaksi.data.pelanggan.nama_pelanggan}})</td>
                                </tr>                                
                                <!-- Sunnyville, CA 12345 -->
                            </td>
                            
                            <td class="text-left">
                                <tr>
                                    <td>Kasir</td>
                                </tr>
                                <tr>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>({{transaksi.data.kasir.nama}})</td>
                                </tr> 
                                <!-- john@example.com -->
                            </td>

                            <td class="float-right">
                                <table>
                                    <tr>
                                        <td>Sub Total:</td>
                                        <td v-if="transaksi.data.jenis_transaksi ==='SS'">Rp.{{total}}</td>
                                        <td v-if="transaksi.data.jenis_transaksi ==='SV'">Rp.{{jumlah}}</td>
                                        <td v-if="transaksi.data.jenis_transaksi ==='SP'">Rp.{{jumlahs}}</td>
                                    </tr>
                                    <tr class="float">
                                        <td>Diskon:</td>
                                        <td>Rp.{{pembayaran[0].discount}}</td>
                                    </tr>
                                    <tr>
                                        <td>TOTAL:</td>
                                        <td>Rp.{{supertotal}}</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <button id="printPageButton" type="button" class="btn btn-danger" @click="Print">Print <i class="fa fa-print"/></button>
        <router-link id="printPageButton" :to="{ name: 'pembayaran'}" ><button type="button" class="btn btn-success">Back</button></router-link>
    </div>
    </div>
</template>
<script>
import Controller from '../httpController'
export default {
    name: 'nota',
    data(){
       return{
          transaksi: '',
          pembayaran: '',
          jumlah: '',
          jumlahs: '',
          tampung: [],
          total:'',
          supertotal:'',
       }
   },
   created(){
      this.showTransaksi();
   },
    methods: {
        async Print(){
            window.print();
        },
        async showTransaksi(){
            this.tampung = await Controller.getTransaksiLengkap(this.$route.params.id);
            //alert("Register berhasil !!")
            this.transaksi = this.tampung.data;
            this.tampung = await Controller.getPembayaran(this.$route.params.id);
            this.pembayaran = this.tampung.data;
            if(this.transaksi.data.jenis_transaksi ==='SV' || this.transaksi.data.jenis_transaksi ==='SS'){
            this.jumlah=this.transaksi.data.service.reduce((acc,item)=> acc+item.sub_total,0);}
            if(this.transaksi.data.jenis_transaksi ==='SP' || this.transaksi.data.jenis_transaksi ==='SS'){
            this.jumlahs=this.transaksi.data.penjualan.reduce((acc,item)=> acc+item.sub_total,0);}
            
            
            this.total=this.jumlah + this.jumlahs
            this.supertotal = this.total - this.pembayaran[0].discount
            console.log(this.pembayaran[0].discount)
        }
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