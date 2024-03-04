<div class="chart-container">
    <canvas id="productsPerCategoryChart" height="400vw" width="800vw"></canvas>
</div>



<script>
    var ctx = document.getElementById('productsPerCategoryChart');
    var chartDataResult = <?php echo json_encode($chartData); ?>;  
    
    var labels = [];
    var data = [];

    chartDataResult.forEach(function(item) {
        labels.push(item.category);
        data.push(item.total);
    });

    new Chart(ctx, {
        type: 'pie',
        data: {
            labels: labels,
            datasets: [{
                label: 'Total',
                data: data,
                borderWidth: 1
            }]
        },
        options: {}
    });
</script>