
<script>
    var options_{{ $name }} = {
        legend: {
            show: true,
            position: 'bottom',
            showForSingleSeries: true,
        },
        series: [
            @foreach($series as $key => $val)
            {
                name:"{{ $val['name'] }}",
                data:[{{ implode(',', $val['dataset']) }}],
            },
            @endforeach
        ],
        chart: {
            type: 'bar',
            @if($stacked100)
                stacked: true,
                stackType: '100%',
            @endif
            height: 430,
        },
        colors: [@foreach($colors as $color)'{{ $color }}',@endforeach],
        plotOptions: {
            bar: {
                horizontal: true,
                dataLabels: {
                    position: 'center',
                    textAnchor: 'middle',
                    rangeBarOverlap: true,
                    hideOverflowingLabels: true,
                },
            },
        },
        dataLabels: {
            enabled: true,
            @if($procent === true)
            formatter: function(val, opt) {
                if (val >= 3) {
                    return Math.round(val).toString() + "%";
                }
            },
            @endif
            offsetX: 0,
            offsetY: 0,
            style: {
                fontSize: '11px',
                colors: ['#000']
            },
        },
        stroke: {
            show: true,
            width: 1,
            colors: ['#fff']
        },
        tooltip: {
            shared: true,
            intersect: false
        },
        xaxis: {
            labels: {
                show: true,
            },
            categories: [@foreach($categories as $cat)'{{$cat}}',@endforeach],
        },
        tooltip: {
            enabled: true,
            followCursor: false,
            intersect: true,
            theme: 'light',
            onDatasetHover: {
                highlightDataSeries: true,
            },
            marker: {
                show: true,
            },
            fixed: {
                enabled: false,
                position: 'topRight',
                offsetX: 0,
                offsetY: 0,
            },
        },
    };
    var chart_{{ $name }} = new ApexCharts(document.querySelector("#chart_{{ $name }}"), options_{{ $name }});
    chart_{{ $name }}.render();
</script>