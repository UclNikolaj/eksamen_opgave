@extends ('layout/main')
@section('header')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
@endsection
@section('content')
    <div class="w-100 mt-4">
        <div class="row row-cols-md-1 row-cols-xl-1 row-cols-xxl-2">
            <div class="col mb-4">
                <div class="card" tabindex="1">
                    <div class="card-header">
                        <h4 tabindex="3">Samtalevarighed pr. år</h4>
                    </div>
                    <div class="card-inner ps-2" tabindex="4">
                        <div class="chart-wrapper">
                            <div class="chartoptions" id="chart_conversation"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col mb-4">
                <div class="card">
                    <div class="card-header">
                        <h4>Henvendelser pr. år</h4>
                    </div>
                    <div class="card-inner">
                        <div class="chart-wrapper">
                            <div class="chartoptions" id="chart_inquries"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row row-cols-md-1 row-cols-xl-1 row-cols-xxl-2">
            <div class="col mb-4">
                <div class="card" tabindex="1">
                    <div class="card-header">
                        <h4 tabindex="3">Totale henvendelser fordelt på køn/gruppe</h4>
                    </div>
                    <div class="card-inner ps-2">
                        <div class="chart-wrapper">
                            <div class="chartoptions piechart mx-auto my-auto" id="chart_genderGroupData"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col mb-4">
                <div class="card">
                    <div class="card-header">
                        <h4>Totale henvendelser fordelt på type</h4>
                    </div>
                    <div class="card-inner">
                        <div class="chart-wrapper">
                            <div class="chartoptions piechart" id="chart_inquiry_type"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4>Henvendelser fordelt på uddannelser</h4>
                    </div>
                    <div class="card-inner">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Uddannelse</th>
                                    <th>2019</th>
                                    <th>2020</th>
                                    <th>2021</th>
                                    <th>2022</th>
                                    <th>Tendens</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tableData as $key => $values)
                                    <tr @if ($key === array_key_last($tableData)) class="total_row" @endif>
                                        <td>{{ $key }}</td>
                                        @foreach ($tableData[$key]['data'] as $year => $value)
                                            <td>{{ $value }}</td>
                                        @endforeach
                                        <td><span id="chart_sparkline_{{ $tableData[$key]['id'] }}"></span></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    <!-- top row charts - conversation and inquires -->
    @foreach ($multiSeriesCharts as $key => $data)
        @include('charts.horizontal_bar', [
            'name' => $key,
            'series' => $data['series'],
            'colors' => $data['colors'],
            'procent' => $data['procent'],
            'categories' => $data['categories'],
            'stacked100' => $data['stacked100'],
        ]);
    @endforeach

    <!-- Middle row charts - topics, top five and low five -->
    @foreach ($pieCharts as $key => $data)
        @include('charts.pie', [
            'name' => $key,
            'dataset' => $data['dataset'],
            'labels' => $data['labels'],
            'colors' => $data['colors'],
        ]);
    @endforeach

    <!-- Javascript for sparklines in table -->
    @foreach ($tableData as $key => $values)
        @include('charts.sparkline', [
            'name' => $tableData[$key]['id'],
            'dataset' => $tableData[$key]['data'],
            'color' => '#47b9b3',
            'type' => 'area',
            'width' => 75,
            'height' => 30,
            'tooltip' => 'false',
        ]);
    @endforeach
@endsection
