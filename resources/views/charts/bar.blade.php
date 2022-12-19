<script>
    var options_{{ $name }} = {
        colors: [
            @foreach ($colors as $color)
                '{{ $color }}',
            @endforeach
        ],
        series: [
            @foreach ($dataset as $key => $data)
                {
                    name: "{{ $data['title'] }}",
                    data: [{{ implode(',', $data['dataset']) }}],
                },
            @endforeach
        ],
        chart: {
            type: '{{ $type }}',
            height: 430,
            zoom: {
                enabled: false
            }
        },
        xaxis: {
            type: 'category',
            categories: [
                @foreach ($categories as $cat)
                    '{{ $cat }}',
                @endforeach
            ],
        },
        plotOptions: {
            bar: {
                dataLabels: {
                    enabled: true,
                    position: 'top',
                },
                distributed: {{ $distributed }},
            },
            stroke: {
                show: true,
                width: 5,
                colors: ['#fff']
            },
        },
        dataLabels: {
            offsetY: -20,
            style: {
                fontSize: '12px',
                colors: ["#000"],
            },

            @if ($procent)
                formatter: function(val, series) {
                    if(series.seriesIndex === 0){
                        return val + "%";
                    }else{
                        return val;
                    }

                },
            @endif
        },
        yaxis: [{
                show: true,
                showAlways: true,
                showForNullSeries: true,
                title: {
                    @if(isset($title))
                        text: "{{$title}}",
                    @else
                        text: "Andel",
                    @endif

                },
                @if ($procent)
                    tickAmount: 5,
                    max: 100,
                @endif
                labels: {
                    show: true,
                    @if ($procent)
                        formatter: function(val) {
                            return val + "%";
                        }
                    @endif
                },
            },
            @if(count($dataset) > 1)
            {
                opposite: true,
                title: {
                    text: "Antal",
                },
                labels: {
                    show: true,
                    formatter: function(val) {
                        return val;
                    }
                },
            },
            @endif
        ],
    };
    var chart_{{ $name }} = new ApexCharts(document.querySelector("#chart_{{ $name }}"), options_{{ $name }});
    chart_{{ $name }}.render();
</script>
