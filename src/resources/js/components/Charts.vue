<style lang="scss">
  .chart-container {
    position: relative;
    margin: auto;
    height: 50vh;
    width: 75vw;
  }
</style>

<template>
    <div class="row">
      <div class="col-lg-12">
        <div class="mb-3 card">
              <div class="card-header-tab card-header">
                  <div class="card-header-title">
                      <i class="header-icon lnr-rocket icon-gradient bg-tempting-azure"> </i>
                      <div id="chart_title">Difficulty [last 12 hours]</div>
                  </div>
                  <div class="btn-actions-pane-right">
                      <div class="nav">
                          <a href="javascript:void(0);" class="border-0 btn-pill btn-wide btn-transition active btn btn-outline-alternate">Difficulty</a>
                          <a href="javascript:void(0);" class="ml-1 btn-pill btn-wide border-0 btn-transition  btn btn-outline-alternate second-tab-toggle-alt">Block Size</a>
                      </div>
                  </div>
              </div>
              <div class="tab-content">
                  <div class="tab-pane fade active show">
                      <div class="chart-container">
                        <canvas id="chart_body"></canvas>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </div>
</template>

<script>
import { Bar } from 'vue-chartjs';

export default {

   methods: {
     renderChart() {
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
             new Chart(document.getElementById('chart_body').getContext('2d'), {
               type: 'bar',
               data: {
                 labels: Time,
                 datasets: [{
                    label: 'Difficulty',
                    backgroundColor: '#FC2525',
                    data: Difficulty,
                    fill: true
                    }]
               },
               options: {
                 responsive: true,
                 maintainAspectRatio: false,
                 onResize: () => {
                   console.log('ciao');
                 },
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
               }
             });
            } else {
              console.log('No data');
            }
          });
     }
   },
   mounted() {
     this.renderChart();
   }
}
</script>
