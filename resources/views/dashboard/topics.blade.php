@extends ('layout/main')
@section('header')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    {{-- <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet" /> --}}
@endsection
@section('content')
    <div class="w-100 mt-4">
        <div class="row">
            <div class="col mb-4">
                <div class="card">
                    <div class="card-header">
                        <h4>Top 5 emner</h4>
                    </div>
                    <div class="card-inner ps-2">
                        <div class="chart-wrapper">
                            <div class="chartoptions" id="chart_topFive"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col mb-4">
                <div class="card">
                    <div class="card-header">
                        <h4>Laveste 5 emner</h4>
                    </div>
                    <div class="card-inner">
                        <div class="chart-wrapper">
                            <div class="chartoptions" id="chart_lowFive"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4>Emner oprettet under "andet"</h4>
                        <label><span class="me-2 label_title">Opret emne</span>
                            <button title="Opret emne" class="btn btn-sm btn-light" data-bs-toggle="modal" data-bs-target="#modalCreateTopic"><i class="fa-solid fa-plus-large"></i></button>
                        </label>
                    </div>
                    <div class="card-inner">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Titel</th>
                                    <th>Oprettet af</th>
                                    <th>Oprettelsesdato</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($topics as $topic)
                                    <tr>
                                        <td>{{ $topic->title }}</td>
                                        <td>{{ $topic->medarbejder_navn }}</td>
                                        <td>{{ date('d/m/Y', strtotime($topic->created_at)) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- Modal with 'creating at topic' content -->
        <div class="modal fade" id="modalCreateTopic" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title fs-5" id="modal_title">Opret emne</h2>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-4">
                            <label class="w-100" for="topic_title">Titel</label>
                            <input class="form-control" type="text" name="topic_title" id="topic_title">
                        </div>
                        <div>
                            <label class="w-100" for="topic_description">Beskrivelse</label>
                            <textarea class="form-control" name="topic_description" id="topic_description"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button class="btn btn-light" data-bs-dismiss="modal">Luk ned</button>
                        <a role="button" href="{{ route(Route::currentRouteName()) }}" class="btn btn-primary load">Opret</a>
                    </div>
                </div>
            </div>
        </div>
@endsection
@section('footer')
    @foreach ($topicCharts as $key => $data)
        @include('charts.bar', [
            'name' => $key,
            'series' => $data['series'],
            'dataset' => $data['dataset'],
            'colors' => $data['colors'],
            'categories' => $data['categories'],
            'type' => $data['type'],
            'procent' => $data['procent'],
            'distributed' => $data['distributed'],
        ]);
    @endforeach

@endsection
