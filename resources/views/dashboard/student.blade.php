@extends ('layout/main')
@section('header')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet" />
@endsection
@section('content')
    <div class="w-100 mt-4">
        <div class="row">
            <div class="col mb-4">
                <div class="card">
                    <div class="card-header">
                        <h4>I hvilken grad oplevede du at blive forstået af vejlederen?</h4>
                    </div>
                    <div class="card-inner ps-2">
                        <div class="chart-wrapper">
                            <div class="chartoptions" id="chart_question_1"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col mb-4">
                <div class="card">
                    <div class="card-header">
                        <h4>I hvilken grad er du blevet mere klar på hvad du skal gøre nu?</h4>
                    </div>
                    <div class="card-inner">
                        <div class="chart-wrapper">
                            <div class="chartoptions" id="chart_question_2"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4>Klik på årene for, at folde dem ud og se resultaterne</h4>
                    </div>
                    <div class="card-inner">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th width="25%">År / Spørgsmål</th>
                                    <th width="75%">Besvarelse</th>
                                </tr>
                            </thead>
                            @php
                                $identification = null;
                            @endphp
                            <tbody id="tablestructure">
                                @foreach ($dataset as $year => $questionArray)
                                    <tr class="parent" max-width="50%">
                                        <td class="showExtraRow" id="{{ $year }}"><i class="far fa-angle-right me-3"></i>{{ $year }}</td>
                                        <td></td>
                                    </tr>
                                    @if ($identification = $year)
                                        @foreach ($questionArray as $key => $data)
                                            <tr class="secondRow tablesorter-childRow connection_{{ $year }}">
                                                <td>{{ $data['title'] }}</td>
                                                <td class="chart_box">
                                                    <div class="chart_bar">
                                                        @foreach ($data['answers'] as $k => $amount)
                                                            <div class="bar" style="background-color:{{ $colors[$k] }}; width:{{ $amount }}%">
                                                                @if ($amount > 3)
                                                                    {{ $amount }}%
                                                                @endif
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    @php
                                        $identification = $year;
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>
                        <div class="labels">
                            @foreach ($labels as $labelKey => $labelValue)
                                <div class="label_item">
                                    <div class="label_color" style="background-color:{{ $colors[$labelKey] }};"></div>
                                    <p class="label_text">{{ $labelValue }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    <script src="{{ asset('js/hidden_rows.js') }}"></script>
    @foreach ($questionCharts as $key => $data)
        @include('charts.bar', [
            'name' => $key,
            'series' => $data['series'],
            'dataset' => $data['dataset'],
            'colors' => $data['colors'],
            'categories' => $data['categories'],
            'title' => 'Samlet andel',
            'type' => $data['type'],
            'procent' => $data['procent'],
            'distributed' => $data['distributed'],
        ]);
    @endforeach
@endsection
