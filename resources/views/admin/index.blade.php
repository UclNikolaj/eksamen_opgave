@extends ('layout/main')
@section('header')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet" />
@endsection
@section('content')
    <div class="w-100 mt-4">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4>Ret, slet eller opret emner</h4>
                        <label><span class="me-2 label_title">Opret emne</span>
                            <button title="Opret emne" class="btn btn-sm btn-light" data-bs-toggle="modal" data-bs-target="#modalCreateTopic"><i class="fa-solid fa-plus-large"></i></button>
                        </label>
                    </div>
                    <div class="card-inner">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th width="25%">Titel</th>
                                    <th width="50%">Beskrivelse</th>
                                    <th>Antal henvendelser</th>
                                    <th>Rediger</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $javascriptId = 0;
                                    $loop = 0;
                                @endphp
                                @foreach ($topics as $topic)
                                    @php
                                        $number = mt_rand(0, 50);
                                    @endphp
                                    <tr id="{{ $javascriptId }}">
                                        <td>{{ $topic->title }}</td>
                                        <td>{{ $topic->description }}</td>
                                        <td id="num_for_{{ $javascriptId }}">{{ $number }}</td>
                                        <td><button title="Rediger eller slet emnet '{{ $topic->title }}'" class="btn btn-secondary" id="{{ $topic->id }}" data-bs-toggle="modal" data-bs-target="#modalWithContent" onClick="loadModalContent({{ $javascriptId }})">Rediger</button></td>
                                    </tr>
                                    @php
                                        $loop++;
                                        $javascriptId++;
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal with javascript loaded content -->
    <div class="modal fade" id="modalWithContent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title fs-5" id="modal_title"></h2>
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
                    <a role="button" href="{{ route(Route::currentRouteName()) }}" class="btn btn-danger load" id="delete_button">Slet emne</a>
                    <p id="cantDeleteTopic">Du kan ikke slette emnet, da der er henvendelser tilknyttet</p>
                    <a role="button" href="{{ route(Route::currentRouteName()) }}" class="btn btn-primary btn_submit load">Gem ændringer</a>
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
    <script>
        // declaring variables
        const modalTitle = document.getElementById('modal_title'),
            title = document.getElementById('topic_title'),
            description = document.getElementById('topic_description'),
            content = {!! json_encode($topics) !!};
            
        // when click on a button, load content into modal
        function loadModalContent(id) {
            // check to see, if the amount of inquires above '0'
            let amountOfInquires = document.getElementById('num_for_' + id);
            document.getElementById('cantDeleteTopic').style.display = "none";
            document.getElementById('delete_button').style.display = "inline-block";
            if (amountOfInquires.innerHTML > 0) {
                document.getElementById('cantDeleteTopic').style.display = "inline-block";
                document.getElementById('delete_button').style.display = "none";
            }
            // change values of h2 title and input fields
            modalTitle.textContent = content[id]['title'];
            title.defaultValue = content[id]['title'];
            description.defaultValue = content[id]['description'];
        }
    </script>
    <script src="{{ asset('js/tooltip.js') }}"></script>
@endsection
