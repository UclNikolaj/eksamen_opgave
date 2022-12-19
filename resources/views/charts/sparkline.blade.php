<script>
    var options_sparkline_{{ $name }} = {
        series: [{
            data: [{{ implode(',', $dataset) }}]
        }],
        colors: ['{{ $color }}'],
        stroke: {
            show: true,
            width: 2,
        },
        chart: {
            type: '{{ $type }}',
            width: {{ $width }},
            height: {{$height}},
            sparkline: {
                enabled: true
            }
        },
        tooltip: {
            enabled: {{$tooltip}},
        }
    };
    var chart_sparkline_{{ $name }} = new ApexCharts(document.querySelector("#chart_sparkline_{{ $name }}"), options_sparkline_{{ $name }});
    chart_sparkline_{{ $name }}.render();
</script>