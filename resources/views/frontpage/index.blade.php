@extends ('layout/main')
@section('header')
    <link href="{{ asset('css/registration.css') }}" rel="stylesheet"/>
@endsection
@section('content')
    <div class="container-fluid mt-4">
        <form action="#" name="registrationForm" onsubmit="return validateForm()">
            <div class="row">
                <div class="mx-auto my-auto regis_content position-relative">
                    <!-- CHOOSE EDUCATION -->
                    <section class="pb-4 mb-4 border-bottom border-primary required">
                        <div class="mb-4">
                            <h2>Vælg uddannelse</h2>
                            <h3>Vist herunder, er de uddannelser som du er tilknyttet</h3>
                            <p class="text-danger d-none error_msg" id="education_error_msg">Du skal vælge en uddannelse</p>
                        </div>
                        <div class="row grid row-cols-1 row-cols-md-2 row-cols-lg-3 mb-3">
                            @foreach ($educations['user'] as $id => $education)
                                <div class="mb-2 box-sizing-content">
                                    <label class="custom-checkbox-container me-4 label_title">{{ $education }}
                                        <input type="radio" id="filter-{{ $id }}" name="education">
                                        <span class="checkmark radio"></span>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        <button class="btn btn-sm btn-secondary" type="button" id="see_educations">Se alle uddannelser</button>
                        <!-- div with hidden education -->
                        <div id="hidden_educations" class="mt-3">
                            <div class="input-group mb-3 search_box">
                                <span class="input-group-text" id="basic-addon1"><i class="w-100 text-center fa-solid fa-magnifying-glass"></i></span>
                                <input class="form-control" id="education_box_search" type="text" onkeyup="searchList('#education_box')" name="search" placeholder="Søg" title="Søg" autofocus>
                            </div>
                            <div class="row grid row-cols-1 row-cols-md-2 row-cols-lg-2" id="education_box">
                                @foreach ($educations['educations'] as $id => $education)
                                    <div class="mb-2 box-sizing-content">
                                        <label class="custom-checkbox-container me-4 label_title">{{ $education }}
                                            <input type="radio" id="filter-{{ $id }}" name="education">
                                            <span class="checkmark radio"></span>
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </section>

                    <!-- CHOOSE TOPIC -->
                    <section class="pb-4 mb-4 border-bottom border-primary">
                        <div class="mb-3">
                            <h2>Vælg emne</h2>
                            <h3>Vist herunder, er de 6 seneste emner du har valgt. Hold musen over emner med et i-symbol for, at læse mere</h3>
                            <p class="text-danger d-none error_msg"id="topic_error_msg">Du skal vælge mindst ét emne, eller udfylde "andet" feltet</p>
                        </div>

                            <div class="row row-cols-2 row-cols-lg-3 mb-3">
                                @foreach ($topics['user'] as $id => $topic)
                                    <div class="col @if (array_key_first($topics['user']) == $id) ms-0 @endif mb-2">
                                        <label class="custom-checkbox-container me-4 label_title" for="{{ $id }}"
                                            @if (!empty($topic['description'])) data-bs-toggle="tooltip" data-bs-placement="left" data-bs-custom-class="custom-tooltip" data-bs-title="{{ $topic['description'] }}" @endif>{{ $topic['title'] }} @if(!empty($topic['description']))<sup><i class="fa-solid fa-info"></i></sup>@endif
                                            <input type="checkbox" id="{{ $id }}" name="topic[]" value="{{ $id }}">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                @endforeach
                            </div>
 
                        <button class="btn btn-sm btn-secondary" id="see_topics">Se alle emner</button>

                        <!-- div with hidden topics -->
                        <div id="hidden_topics" class="mt-3">
                            <div class="input-group mb-3 search_box">
                                <span class="input-group-text" id="basic-addon1"><i class="w-100 text-center fa-solid fa-magnifying-glass"></i></span>
                                <input class="form-control" id="topics_box_search" type="text" onkeyup="searchList('#topics_box')" name="search" placeholder="Søg" title="Søg">
                            </div>
                            <div class="row row-cols-1 row-cols-md-1 row-cols-lg-2" id="topics_box">
                                @foreach ($topics['topics'] as $id => $topic)
                                    <div class="mb-2">
                                        <label class="custom-checkbox-container me-4 label_title" for="{{ $id }}"
                                        @if (!empty($topic['description'])) data-bs-toggle="tooltip" data-bs-placement="left" data-bs-custom-class="custom-tooltip" data-bs-title="{{ $topic['description'] }}" @endif>{{ $topic['title'] }} @if(!empty($topic['description']))<sup><i class="fa-solid fa-info"></i></sup>@endif
                                            <input type="checkbox" id="{{ $id }}" name="topic[]" value="{{ $id }}">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-12 mt-4 mb-2">
                            <label class="me-2 w-100 sub_section_title" for="something_else">Andet</label>
                            <input type="text" class="form-control w-100 py-3" id="something_else" name="something_else" placeholder="Hvis ingen af emnerne passer til henvendelsen, angiv det her">
                        </div>
                    </section>

                    <!-- CHOOSE OTHER INFORMATION -->
                    <section class="pb-4 mb-4 border-bottom border-primary">
                        <div class="mb-4">
                            <h2>Ydeligere information</h2>
                            {{-- <h3>Alle felterne skal udfyldes</h3> --}}
                        </div>
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 mb-3">
                            <div class="col">
                                @foreach ($radioBoxes as $rowNum => $rowData)
                                    <div class="row">
                                        <p class="sub_section_title mb-1">{{ $rowData['title'] }}</p>
                                        <p class="text-danger d-none error_msg" id="{{$rowData['name']}}_error_msg">{{ $rowData['errorMsg'] }}</p>
                                        <div class="d-flex flex-row mb-3 text-center square_list_container">
                                            @foreach ($rowData['options'] as $key => $optionData)
                                                <input type="radio" id="{{ $optionData['id'] }}" name="{{ $rowData['name'] }}" value="{{ $optionData['title'] }}" class="custom_control_input">
                                                <label for="{{ $optionData['id'] }}" class="custom_control_label px-2 py-2 me-3 flex-fill">
                                                    <i class="fa-solid {{ $optionData['icon'] }} display-6 mb-1"></i>
                                                    <p class="display-7">{{ $optionData['title'] }}</p>
                                                </label>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="col">
                                @foreach ($selectBoxes as $title => $data)
                                    <div class="row mb-1">
                                        <p class="sub_section_title mb-1">{{ $title }}</p>
                                        <p class="text-danger d-none error_msg" id="{{$data['name']}}_error_msg">{{ $data['errorMsg'] }}</p>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i class="w-100 text-center fa-solid {{ $data['icon'] }}"></i></span>
                                            <select class="form-select" name="{{ $data['name'] }}" aria-label="{{ $data['name'] }}" aria-describedby="basic-addon1">
                                                @foreach ($data['options'] as $key => $option)
                                                    <option value="{{ $key }}" @if (isset($data['selected']) && $key == $data['selected']) selected @endif>{{ $option }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </section>
                    <section class="mb-4">
                        <div class="d-flex flex-row">
                            <input type="reset" class="p-0 btn me-auto btn-reset" value="Ryd indtastning">
                            <div class="mx-auto text-center success_flash" id="success_flash">
                                <p>Din henvendelse er registeret</p>
                            </div>
                            <input type="submit" class="ms-auto btn btn-primary btn_submit load" value="Registrer">
                        </div>
                    </section>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('footer')
    <script src="{{ asset('js/tooltip.js') }}"></script>
    <script src="{{ asset('js/registration.js') }}"></script>
@endsection
