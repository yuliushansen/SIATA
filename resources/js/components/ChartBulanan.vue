<script>
import { Bar } from 'vue-chartjs'

export default {
    props: ['tahunEvent'],
   extends: Bar,
   mounted() {
       console.log(this.tahunEvent)
         let uri = `laporanpendapatanpertahun/${this.tahunEvent}`;
         let service = new Array();
         let penjualan = new Array();
         let total = new Array();
         this.axios.get(uri).then((response) => {
            let data = response.data;
            console.log(response.data)  
            if(data) {
               data.forEach(element => {
               service.push(element.service);
               penjualan.push(element.penjualan);
               total.push(element.total);
               });
               this.renderChart({
               labels: ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'],
               
               datasets: [
                 {
                    label: 'Service',
                    backgroundColor: 
                    'rgba(255, 99, 132, 0.2)'
                    ,
                    data: service
                },
                 {
                    label: 'Penjualan',
                    backgroundColor: 
                    'rgba(54, 162, 235, 0.2)',
                    data: penjualan
                },
                 {
                    label: 'Total',
                    backgroundColor:            
                    'rgba(255, 206, 86, 0.2)',
                    data: total
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