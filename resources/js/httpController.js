import Http from './http'
import http from './http';
// import store from './store'
// import Cookie from 'js-cookie'
// import Session from 'vue-session'

export default {
    
    register (id_pegawai,username,password) {
        return new Promise((resolve, reject) => {
            const payload = {
                id_pegawai,
                username,
                password
            }

            const successCallback = (res) => {
                const akun = res.data
                resolve(res.data)

            }

            const errorCallback = (err) => {
                reject(err)
    
            }

            Http.post('/akun', payload, successCallback, errorCallback)
        })
    },
    // Sparepart
    getSparepart (idsearch) {return Http.get(`/sparepart?search=${idsearch}`)},
    getsparepart () {return Http.get(`/sparepartall`)},
    getHargaDESC () {return Http.get(`/sparepartbyhargadesc`)},
    getHargaASC () {return Http.get(`/sparepartbyhargaasc`)},
    getStokDESC () {return Http.get(`/sparepartbystokdesc`)},
    getStokASC () {return Http.get(`/sparepartbystokasc`)},
    getDetSparepart (idsearch) {return Http.get(`/sparepart/${idsearch}`)},
    insertSparepart (sparepart) {return Http.post('/sparepart',sparepart)},
    editSparepart (id_sparepart, sparepart) {return Http.put(`/sparepart/${id_sparepart}`, sparepart)},
    deleteSparepart(id_sparepart){return Http.delete(`/sparepart/${id_sparepart}`)},
    // Jasa Service
    insertJasa (jasa) {return Http.post('/jasaservice',jasa)},
    getJasa (idsearch) {return Http.get(`/jasaservice?search=${idsearch}`)},
    getjasa () {return Http.get(`/jasaserviceall`)},
    getJasabyID (idsearch) {return Http.get(`/jasaservice/${idsearch}`)},
    editJasa (id_jasa, jasa) {return Http.put(`/jasaservice/${id_jasa}`, jasa)},
    deleteJasa(id_jasa){return Http.delete(`/jasaservice/${id_jasa}`)},
    // Supplier
    getsupplier (idsearch) {return Http.get(`${idsearch}`)},
    insertSupplier (supplier) {return Http.post('/supplier',supplier)},
    getSupplier (idsearch) {return Http.get(`/supplier?search=${idsearch}`)},
    getSupplierAll () {return Http.get(`/supplierAll`)},
    editSupplier (id_supplier, supplier) {return Http.put(`/supplier/${id_supplier}`, supplier)},
    deleteSupplier(id_supplier){return Http.delete(`/supplier/${id_supplier}`)},
    
    // Pegawai 
    getpegawai (idsearch) {return Http.get(`${idsearch}`)},
    getPegawai (idsearch) {return Http.get(`/pegawai?search=${idsearch}`)},
    getPegawaiAll () {return Http.get(`/pegawaiAll`)},
    getbyRole (idsearch) {return Http.get(`/pegawaibyrole/${idsearch}`)},
    getPegawaibyID (idsearch) {return Http.get(`/pegawai/${idsearch}`)},
    insertPegawai (pegawai) {return Http.post('/pegawai',pegawai)},
    editPegawai (id_pegawai,pegawai) {return Http.put(`/pegawai/${id_pegawai}`, pegawai)},
    deletePegawai(id_pegawai){return Http.delete(`/pegawai/${id_pegawai}`)},
    // Cabang 
    getCabang (idsearch) {return Http.get(`/cabang?search=${idsearch}`)},
    getCabangAll () {return Http.get(`/cabangAll`)},
    getCabangbyid (idsearch) {return Http.get(`/cabang/${idsearch}`)},
    insertCabang (pegawai) {return Http.post('/cabang',pegawai)},
    editCabang (id_pegawai,pegawai) {return Http.put(`/cabang/${id_pegawai}`, pegawai)},
    deleteCabang (id_pegawai){return Http.delete(`/cabang/${id_pegawai}`)},
    // Pelanggan
    getPelanggan (idsearch) {return Http.get(`/pelanggan?search=${idsearch}`)},
    getPelangganAll () {return Http.get(`/pelangganAll`)},
    insertPelanggan (pelanggan) {return Http.post('/pelanggan',pelanggan)},
    editPelanggan (id_pelanggan,pelanggan) {return Http.put(`/pelanggan/${id_pelanggan}`, pelanggan)},
    deletePelanggan (id_pelanggan){return Http.delete(`/pelanggan/${id_pelanggan}`)},
    // Transaksi 
    getPenjualanbyID (idsearch) {return Http.get(`/transaksipenjualan/${idsearch}`)},
    getTransaksibyID (idsearch) {return Http.get(`/transaksi/${idsearch}`)},
    getPenjualanbyMotor (idsearch,search) {return Http.get(`/penjualanbymotor/${idsearch}/${search}`)},
    getServicebyMotor (idsearch,search) {return Http.get(`/servicebymotor/${idsearch}/${search}`)},
    getTransaksiLengkap (idsearch) {return Http.get(`/transaksilengkap/${idsearch}`)},
    editTransaksi (id_pegawai,pegawai) {return Http.put(`/transaksi/${id_pegawai}`, pegawai)},
    editpenjualan (id_pegawai,pegawai) {return Http.put(`/transaksipenjualan/${id_pegawai}`, pegawai)},
    editservice (id_pegawai,pegawai) {return Http.put(`/transaksiservice/${id_pegawai}`, pegawai)},
    gettransaksi (idsearch) {return Http.get(`${idsearch}`)},
    getTransaksi (idsearch) {return Http.get(`/transaksi?search=${idsearch}`)},
    getLast () {return Http.get(`/transaksilast`)},
    ServiceLast () {return Http.get(`/transaksiservicelast`)},
    PenjualanLast () {return Http.get(`/transaksipenjualanlast`)},
    detailLast () {return Http.get(`/detaillast`)},
    insertTransaksi (transaksi_add) {return Http.post('/transaksi',transaksi_add)},
    getDetail (transaksi) {return Http.get(`/detailmotor/${transaksi}`)},
    getdetail (transaksi,motor) {return Http.get(`/detailmotors/${transaksi}/${motor}`)},
    postdetail (transaksi,motor) {return Http.post(`/detailmotors/${transaksi}/${motor}`)},
    postservice (service) {return Http.post(`/transaksiservice`,service)},
    postservicebaru (service) {return Http.post(`/transaksiservicebaru`,service)},
    postpenjualan (penjualan) {return Http.post(`/transaksipenjualan`,penjualan)},
    deleteService(id_pegawai){return Http.delete(`/transaksiservice/${id_pegawai}`)},
    deletePenjualan(id_pegawai){return Http.delete(`/transaksipenjualan/${id_pegawai}`)},
    deleteDetail(id_pegawai){return Http.delete(`/detailmotor/${id_pegawai}`)},
    deleteTransaksi(id_pegawai){return Http.delete(`/transaksi/${id_pegawai}`)},
    getPembayaran (idsearch) {return Http.get(`/pembayaran/${idsearch}`)},
    postPembayaran (bayar) {return Http.post(`/pembayaran`,bayar)},
    // Akun 
    getakun (idsearch) {return Http.get(`${idsearch}`)},
    getAkun (idsearch) {return Http.get(`/akun?search=${idsearch}`)},
    postMotor (bayar) {return Http.post(`/motor`,bayar)},
    editAkun (id_akun, akun) {return Http.put(`/akun/${id_akun}`, akun)},
    deleteAkun(id_akun){return Http.delete(`/akun/${id_akun}`)},
    // Motor
    getMotorPelanggan (idsearch) {return Http.get(`/motorpelanggan/${idsearch}`)},
    getMotorLanjut (idsearch) {return Http.get(`${idsearch}`)},
    getMotorR (idsearch) {return Http.get(`/motormain?search=${idsearch}`)},
    editMotor (id_akun, akun) {return Http.put(`/motor/${id_akun}`, akun)},
    deleteMotor(id_akun){return Http.delete(`/motor/${id_akun}`)},
    // Pengadaan
    getlaporanstok (idsearch,idsearch2) {return Http.get(`/laporanstok/${idsearch}/${idsearch2}`)},
    getlaporanjasa (idsearch,idsearch2) {return Http.get(`/laporanjasa/${idsearch}/${idsearch2}`)},
    getsparepartterlaris (idsearch) {return Http.get(`/laporansparepartterlaris/${idsearch}`)},
    getpengeluaran (idsearch) {return Http.get(`/laporanpengeluaran/${idsearch}`)},
    getpendapatanbulanan (idsearch) {return Http.get(`/laporanpendapatanpertahun/${idsearch}`)},
    getlaporanpendapatanpertahunbycabang () {return Http.get(`/laporanpendapatanpertahunbycabang`)},
    getTampilService (idsearch) {return Http.get(`/tampilservice?search=${idsearch}`)},
    getPengadaan (idsearch) {return Http.get(`/pengadaan?search=${idsearch}`)},
    getPengadaanLengkap (idsearch) {return Http.get(`/pengadaanlengkap/${idsearch}`)},
    getHistoryPengadaan (idsearch) {return Http.get(`/pengadaans?search=${idsearch}`)},
    getpengadaan(idsearch) {return Http.get(`${idsearch}`)},
    getLastPengadaan () {return Http.get(`/pengadaanlatest`)},
    postDetailPengadaan (pengadaan) {return Http.post(`/detailpengadaan`,pengadaan)},
    insertPengadaan (pengadaan) {return Http.post('/transaksipengadaan',pengadaan)},
    deletePengadaan(id_akun){return Http.delete(`/transaksipengadaan/${id_akun}`)},
    deleteDetailPengadaan(id_akun){return Http.delete(`/detailpengadaan/${id_akun}`)},
    editPengadaan (id_pengadaan, pengadaan) {return Http.put(`/transaksipengadaan/${id_pengadaan}`, pengadaan)},
    editDetailPengadaan (id_pengadaan, pengadaan) {return Http.put(`/detailpengadaan/${id_pengadaan}`, pengadaan)},
    posthis (pengadaan) {return Http.post(`/history`,pengadaan)},

}