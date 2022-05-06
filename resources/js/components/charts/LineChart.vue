<template>
  <Line
    :chart-options="chartOptions"
    :chart-data="chartData"
    :chart-id="chartId"
    :dataset-id-key="datasetIdKey"
    :plugins="plugins"
    :css-classes="cssClasses"
    :styles="styles"
    :width="width"
    :height="height"
  />
</template>

<script>
import { Line } from 'vue-chartjs'
import { Chart as ChartJS, Title, LineController, Tooltip, Legend, LineElement, Filler, PointElement, CategoryScale, LinearScale } from 'chart.js'

ChartJS.register(Title, Tooltip, Legend, LineElement, CategoryScale, Filler, LinearScale, PointElement)

export default {
    name: 'LineChart',
    components: {
       Line
    },
    props: {
        chartId: {
            type: String,
            default: 'line-chart'
        },
        datasetIdKey: {
            type: String,
            default: 'label'
        },
        width: {
            type: Number,
            default: 400
        },
        height: {
            type: Number,
            default: 200
        },
        cssClasses: {
            default: '',
            type: String
        },
        styles: {
            type: Object,
            default: () => {}
        },
        plugins: {
            type: Object,
            default: () => {}
        }
    },
    setup(props){
        return {
            chartData: {
                // x axis labels
                labels: [ 'January', 'February', 'March', 'April' , 'May', 'June' ],
                datasets: [ 
                    { 
                        data: [40, 20, 12, 23, 100, 1],
                        borderColor: '#578399',
                        pointBackgroundColor: '#578399',
                        backgroundColor: 'rgba(87, 131, 153, 0.1)',
                        tension: 0.4,
                        fill: true
                    } 
                ],
            },
            chartOptions: {
                responsive: true,
            }
        }
    }
}
</script>
