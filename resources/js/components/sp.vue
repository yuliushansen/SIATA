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
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr >
                <td class="text-center" colspan="6"><h3>Surat Pemesanan</h3></td>
            
            </tr>
            <tr class="total">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            
            <tr class="information">
                <td colspan="6">
                    <table>
                        <tr>
                            <td>
                                Kepada Yth: <br>
                                PT. {{Pengadaan.data.supplier.nama_supplier}}<br>
                                {{Pengadaan.data.supplier.alamat}}<br>
                                {{Pengadaan.data.supplier.nomor_sales}}<br>
                                <!-- Sunnyville, CA 12345 -->
                            </td>
                            <td>
                                No : {{Pengadaan.data.id_transaksi_pengadaan}}<br>
                                <p>Tanggal: {{new Date(Pengadaan.data.tanggal).toLocaleDateString("en-GB", {weekday: 'long', year: 'numeric', month: 'long', day: 'numeric'})}}</p><br>
                                
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <!-- Penjualan -->
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td class="text-left">Mohon untuk disediakan barang-barang berikut :</td>
            </tr>
            <tr class="total" >
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr class="heading" >
                <td>
                    No
                </td>
                <td >
                    Nama Barang
                </td>
                <td >
                    Merk
                </td>
                <td >
                    Tipe Barang
                </td>
                <td>
                    Satuan
                </td>
                <td>
                    Jumlah
                </td>
            </tr>
            
            <tr class="details" v-for="(trans,index) of Pengadaan.data.pengadaan" v-bind:key="trans['key']">
                <td>
                    {{index+1}}
                </td>
                <td>
                    {{trans.sparepart.nama_sparepart}}
                </td>
                <td class="">
                    {{trans.sparepart.merk_sparepart}}
                </td>
                <td class="">
                    {{trans.sparepart.tipe_sparepart}}
                </td>
                <td class="">
                    {{trans.sparepart.satuan_sparepart}}
                </td>
                <td class="">
                    {{trans.jumlah}}
                </td>
            </tr>
            <tr class="total" >
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <table>
                <tr>
                    <td></td>
                    <td></td>
                    <td>Hormat Kami</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>({{Pengadaan.data.cs.nama}})</td>
                </tr>
            </table>
        </table>
        <tr>
            <td></td>
        </tr>
        <button id="printPageButton" type="button" class="btn btn-danger" @click="Print">Print <i class="fa fa-print"/></button>
        <router-link id="printPageButton" :to="{ name: 'pengadaan'}" ><button type="button" class="btn btn-success">Back</button></router-link>
    </div>
    </div>
</template>
<script>
import Controller from '../httpController'
export default {
    name: 'spk',
    data(){
       return{
          Pengadaan: '',
          jumlah: '',
          jumlahs: '',
          tampung: []
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
            this.tampung = await Controller.getPengadaanLengkap(this.$route.params.id);
            //alert("Register berhasil !!")
            this.Pengadaan = this.tampung.data;
            console.log(this.Pengadaan)
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