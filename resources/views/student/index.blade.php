@extends ('layout/main')
@section('header')
    <link href="{{ asset('css/registration.css') }}" rel="stylesheet" />
@endsection
@section('content')
    <div class="container-fluid mt-4">
        <form method="GET" name="registrationForm" onsubmit="return validateForm()">
            <div class="mx-auto my-auto text-center regis_content student_regis_content">
                <section class="border-bottom border-primary required">
                    <p class="student_regis_label_title mb-1">Vælg en uddannelse</p>
                    <select class="form-select" name="education" id="education_select_box">
                        @foreach ($educations as $education)
                            <option value="{{ $education->id }}">{{ $education->name }}</option>
                        @endforeach
                        <option value="Ekstern/Andet">Ekstern/Andet</option>
                    </select>
                </section>
                @foreach ($radioBoxes as $rowNum => $rowData)
                    <section class="border-bottom border-primary required">
                        <div class="row mx-auto my-auto text-center">
                            <p class="student_regis_label_title mb-1">{{ $rowData['title'] }}</p>
                            <p class="text-danger d-none error_msg" id="{{ $rowData['name'] }}_error_msg">{{ $rowData['errorMsg'] }}</p>
                            <div class="d-flex flex-row mb-3 text-center student_list_container p-0">
                                @foreach ($rowData['options'] as $key => $optionData)
                                    <input type="radio" id="{{ $optionData['id'] }}" name="{{ $rowData['name'] }}" value="{{ $optionData['title'] }}" class="custom_control_input">
                                    <label for="{{ $optionData['id'] }}" class="custom_control_label mx-auto flex-fill">
                                        <i class="fa-solid {{ $optionData['icon'] }} display-6 mb-1"></i>
                                        <p class="display-7">{{ $optionData['title'] }}</p>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    </section>
                @endforeach
                <section>
                    <div class="d-flex flex-row">
                        <input type="reset" class="p-0 btn me-auto btn-reset" value="Ryd indtastning">
                        <div class="mx-auto text-center success_flash" id="success_flash">
                            <p>Tak for din feedback!</p>
                        </div>
                        <input type="submit" class="ms-auto btn btn-primary load" value="Registrer">
                    </div>
                </section>
            </div>
        </form>
    </div>
@endsection
@section('footer')
    <script src="{{ asset('js/tooltip.js') }}"></script>
    <script src="{{ asset('js/student_registration.js') }}"></script>
@endsection
