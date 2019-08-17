<script>
import { Bar } from 'vue-chartjs';

export default {
   extends: Bar,
   mounted() {
         let uri = 'https://spallina.dev/api/v1/difficulty/12';
         let Time = new Array();
         let Difficulty = new Array();
         this.axios.get(uri).then((response) => {
            let data = response.data;
            if(data) {
               data.forEach(element => {
               Time.push(new Date(element.block_time * 1000).toLocaleTimeString());
               Difficulty.push(element.difficulty);
               });
               this.renderChart({
               labels: Time,
               datasets: [{
                  label: 'Difficulty',
                  backgroundColor: '#FC2525',
                  data: Difficulty,
                  fill: true
                }]
              }, {
                  responsive: true,
                  maintainAspectRatio: false,
                  scales: {
                    yAxes: [
                      {
                        ticks: {
                          callback: function(label, index, labels) {
                            return label/1000000000+'bn';
                          }
                        },
                        scaleLabel: {
                          display: true,
                          labelString: '1bn = 1\'000\'000\'000'
                        }
                      }
                    ],
                    xAxes: [{
                      ticks: {
                        autoSkip: true,
                        maxTicksLimit: 15
                      }
                    }]
                  }
                });
              } else {
                console.log('No data');
              }
            });
          }
        }
</script>
