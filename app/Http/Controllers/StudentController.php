<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Education;

class StudentController extends Controller
{
    public function index()
    {
        $radioBoxes = [
            1 => [
                'title' => 'I hvilken grad oplevede du at blive forstået af vejlederen? *',
                'name' => 'understandment_measure',
                'errorMsg' => 'Du skal udfylde dette',
                'options' => [
                    1 => [
                        'icon' => 'fa-face-frown',
                        'id' => 'understand_1',
                        'title' => 'Slet ikke',
                    ],
                    2 => [
                        'icon' => 'fa-face-diagonal-mouth',
                        'id' => 'understand_2',
                        'title' => 'Ikke meget',
                    ],
                    3 => [
                        'icon' => 'fa-face-meh-blank',
                        'id' => 'understand_3',
                        'title' => 'Delvist',
                    ],
                    4 => [
                        'icon' => 'fa-face-smile',
                        'id' => 'understand_4',
                        'title' => 'Tilfreds',
                    ],
                    5 => [
                        'icon' => 'fa-face-laugh',
                        'id' => 'understand_5',
                        'title' => 'Meget tilfreds',
                    ],
                ]
            ],
            2 => [
                'title' => 'I hvilken grad er du blevet mere klar på hvad du skal gøre nu?',
                'name' => 'readyment',
                'errorMsg' => 'Vælg én af mulighederne',
                'options' => [
                    1 => [
                        'icon' => 'fa-face-frown',
                        'id' => 'readyment_1',
                        'title' => 'Slet ikke',
                    ],
                    2 => [
                        'icon' => 'fa-face-diagonal-mouth',
                        'id' => 'readyment_2',
                        'title' => 'Ikke meget',
                    ],
                    3 => [
                        'icon' => 'fa-face-meh-blank',
                        'id' => 'readyment_3',
                        'title' => 'Delvist',
                    ],
                    4 => [
                        'icon' => 'fa-face-smile',
                        'id' => 'readyment_4',
                        'title' => 'Tilfreds',
                    ],
                    5 => [
                        'icon' => 'fa-face-laugh',
                        'id' => 'readyment_5',
                        'title' => 'Meget tilfreds',
                    ],
                ]
            ],
        ];

        $educations = Education::orderBy('name')->get();

        return view('student/index', [
            'radioBoxes' => $radioBoxes,
            'educations' => $educations,
        ]);
    }
}
