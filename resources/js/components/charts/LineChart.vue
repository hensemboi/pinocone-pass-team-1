<template>
  <Line :chart-data="chartData" :options="chartData.options" />
</template>

<script>
import { Line } from 'vue-chartjs'
import { Chart as ChartJS, Title, Tooltip, Legend, LineElement, CategoryScale, LinearScale, PointElement } from 'chart.js'
import { toRefs } from 'vue'

ChartJS.register(Title, Tooltip, Legend, LineElement, CategoryScale, LinearScale, PointElement)

export default {
  name: 'BarChart',
  components: { Line },
  props: ['data'],
  setup(props) {
    const {data} = toRefs(props)
    console.log(data.value)
    let x = [] 
    let y = []
    data.value.forEach(element => {
        x.push(element.year)
        y.push(element.totPrice)
    });
    console.log(y)
    const chartData = {
        labels: x,
        datasets: [
            {
                data: y,
                label: 'Yearly Revenue',

                tension: 0.4,
                fill: true,
                responsive: true,
                plugins: {
                  filler: {
                      propagate: true
                  }
                },
                pointBackgroundColor: 'rgba(254,213, 49, 0.5)',
                pointBorderColor: 'rgb(254,213, 49)', 
                backgroundColor: 'rgba(254,213, 49, 0.5)',
                borderColor: 'rgb(254,213, 49)',
            }
        ],
        options: {
          scales: {
              yAxes: [
                  {
                      ticks: {
                          beginAtZero: true
                      }
                  }]
          },
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            filler: {
                propagate: true
            }
        }
        }
    }

    return {
      chartData
    }
  }
}
</script>
