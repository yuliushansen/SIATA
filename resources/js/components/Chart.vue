<script>
import { Bar } from 'vue-chartjs'

export default {
   extends: Bar,
   mounted() {
         let uri = 'laporanpendapatanpertahunbycabang';
         let tahun = new Array();
         let nama_cabang = new Array();
         let total_harga = new Array();
         this.axios.get(uri).then((response) => {
            let data = response.data;
            if(data) {
               data.forEach(element => {
               tahun.push(element.tahun + ' ' +element.nama_cabang);
               nama_cabang.push(element.nama_cabang);
               total_harga.push(element.total_harga);
               });
               this.renderChart({
               labels: tahun,
               
               datasets: [
                 {
                  backgroundColor: [
                  'rgba(255, 99, 132, 0.2)',
                  'rgba(54, 162, 235, 0.2)',
                  'rgba(255, 206, 86, 0.2)',
                  
                  ],
                  data: total_harga
                 },
            ]
         }, {responsive: true, maintainAspectRatio: false})
       }
       else {
          console.log('No data');
       }
      });            
   }
}
</script>