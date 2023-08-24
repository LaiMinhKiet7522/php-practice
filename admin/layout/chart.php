<script src="<?php echo BASE_URL; ?>dist-admin/js/chart.min.js"></script>

<script>
    // Graphs
    const ctx = document.getElementById('myChart');
    const myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [
                'Jan',
                'Feb',
                'Mar',
                'Apr',
                'May',
                'Jun',
                'Jul',
                'Aug',
                'Sep',
                'Oct',
                'Nov',
                'Dec'
            ],
            datasets: [{
                data: [
                    1237,
                    1002,
                    1343,
                    1557,
                    1142,
                    1134,
                    1190,
                    1512,
                    889,
                    1606,
                    1370,
                    1275
                ],
                lineTension: 0,
                backgroundColor: 'transparent',
                borderColor: '#007bff',
                borderWidth: 4,
                pointStyle: 'circle',
                pointBackgroundColor: '#007bff',
            }]
        },
        options: {
            responsive: true,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        callback: function(value, index, values) {
                            return '$' + value;
                        }
                    }
                }]
            },
            legend: {
                display: false
            }
        }
    });
</script>