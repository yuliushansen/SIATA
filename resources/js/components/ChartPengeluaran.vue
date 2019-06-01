<script>
import { Pie } from 'vue-chartjs'

export default {
    props: ['tahunEvent'],
   extends: Pie,
   mounted() {
       console.log(this.tahunEvent)
         let uri = `laporanpengeluaran/${this.tahunEvent}`;
         let bulan = new Array();
         let total = new Array();
         this.axios.get(uri).then((response) => {
            let data = response.data;
            console.log(response.data)  
            if(data) {
               data.forEach(element => {
               bulan.push(element.bulan);
               total.push(element.total);
               });
               this.renderChart({
               labels: ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'],
               
               datasets: [
                 {
                     
                    backgroundColor: 
                    [
                  '#b206b0',
                  '#e41749',
                  '#f5587b',
                  '#ff8a5c',
                  '#f3c1c6',
                  '#f0f69f',
                  '#b0e0a8',
                  '#d8eff0',
                  '#bfcd7e',
                  '#ee7777',
                  '#8e2e6a',
                  '#311054',
                  
                  ],
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