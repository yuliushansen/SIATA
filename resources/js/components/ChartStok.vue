<script>
import { Line } from 'vue-chartjs'

export default {
    props: ['tahunEvent','tipe'],
   extends: Line,
   mounted() {
         let uri = `laporanstok/${this.tahunEvent}/${this.tipe}`;
         let jumlah = new Array();
         this.axios.get(uri).then((response) => {
            let data = response.data;
            console.log(response.data)  
            if(data) {
               data.forEach(element => {
               jumlah.push(element.jumlah);
               });
               this.renderChart({
               labels: ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'],
               
               datasets: [
                 {
                    label: 'Sisa Stok',
                    backgroundColor: 
                    'rgba(255, 99, 132, 0.2)'
                    ,
                    data: jumlah
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