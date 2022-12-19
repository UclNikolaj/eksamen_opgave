<script>
    var options_{{ $name }} = {
        series: [{{ implode(',', $dataset) }}],
        chart: {
            width: 500,
            type: 'pie',
        },
        colors:[@foreach($colors as $color)'{{ $color }}',@endforeach],
        labels: [@foreach($labels as $label)'{{ $label }}',@endforeach],
        responsive: [{
            breakpoint: 1200,
            options: {
                chart: {
                    width: 400
                },
                legend: {
                    position: 'bottom'
                }
            }
        }],
        legend: {
            show: true,
            position: "bottom",
        },
        plotOptions: {
            pie: {
                customScale: 1,
            }
        },
    };
    var chart_{{ $name }} = new ApexCharts(document.querySelector("#chart_{{ $name }}"), options_{{ $name }});
    chart_{{ $name }}.render();
</script>
