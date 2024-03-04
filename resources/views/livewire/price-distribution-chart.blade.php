<div>
  <canvas id="priceDistributionChart"></canvas>
</div>

<script>
    var ctx = document.getElementById('priceDistributionChart');
    var chartDataResult = <?php echo json_encode($chartData); ?>;  
    
    var labels = chartDataResult.map(data => data.range);
    var counts = chartDataResult.map(data => data.count);

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Total Products',
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