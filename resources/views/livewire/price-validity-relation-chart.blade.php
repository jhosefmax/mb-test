<div>
    <canvas id="priceValidityRelationChart"></canvas>
</div>

<script>
    var ctx = document.getElementById('priceValidityRelationChart');
    var chartDataResult = <?php echo json_encode($chartData); ?>;  
    
    var labels = chartDataResult.map(data => data.month);
    var counts = chartDataResult.map(data => data.count);

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Total expiring',
                data: counts,
                borderWidth: 1
            }]
        },
        options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
        }
    });
</script>