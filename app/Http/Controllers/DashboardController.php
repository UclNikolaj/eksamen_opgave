<?php

namespace App\Http\Controllers;

use App\Models\OtherTopic;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $multiSeriesCharts = [
            'conversation' => [
                'series' => [
                    1 => [
                        'name' => '1 - 15 min',
                        'dataset' => [75, 10, 20, 45],
                    ],
                    2 => [
                        'name' => "16 - 30 min",
                        'dataset' => [25, 10, 12, 40],
                    ],
                    3 => [
                        'name' => '31 - 45 min',
                        'dataset' => [20, 14, 17, 20],
                    ],
                    4 => [
                        'name' => '46 - 60 min',
                        'dataset' => [11, 40, 10, 10],
                    ],
                    5 => [
                        'name' => '60+ min',
                        'dataset' => [4, 5, 7, 2],
                    ],
                ],
                'colors' => ['#a3dcd9', '#96b2b6', '#f4b2a4', '#fae76a', '#9b3c7d'],
                'procent' => true,
                'categories' => ['2022', '2021', '2020', '2019'],
                'stacked100' => true,
            ],
            'inquries' => [
                'series' => [
                    1 => [
                        'name' => 'Antal',
                        'dataset' => [34, 43, 36, 18],
                    ],
                ],
                'colors' => ['#a3dcd9', '#96b2b6', '#f4b2a4', '#fae76a', '#9b3c7d'],
                'procent' => false,
                'categories' => ['2022', '2021', '2020', '2019'],
                'stacked100' => false,
            ],
        ];

        $pieCharts = [
            'genderGroupData' => [
                'labels' => ['Kvinde', 'Mand', 'Gruppe'],
                'colors' => ['#a3dcd9', '#96b2b6', '#f4b2a4', '#fae76a', '#9b3c7d'],
                'dataset' => [425, 325, 102],
            ],
            'inquiry_type' => [
                'labels' => ['Person', 'Telefonisk', 'Virtuel'],
                'colors' => ['#fae76a', '#9b3c7d', '#f2cac1'],
                'dataset' => [284, 450, 118],
            ]
        ];

        $tableData = [
            'Datamatiker, Odense' => [
                'id' => 65,
                'data' => [2019 => 74, 2020 => 55, 2021 => 62, 2022 => 85],
            ],
            'Digital konceptudvikling' => [
                'id' => 67,
                'data' => [2019 => 43, 2020 => 23, 2021 => 50, 2022 => 45],
            ],
            'Multimediedesigner' => [
                'id' => 66,
                'data' => [2019 => 21, 2020 => 42, 2021 => 35, 2022 => 33],
            ],
            'Webudvikling' => [
                'id' => 69,
                'data' => [2019 => 18, 2020 => 10, 2021 => 17, 2022 => 15],
            ],
            'Total' => [
                'id' => 'total',
                'data' => [2019 => 156, 2020 => 130, 2021 => 164, 2022 => 178],
            ]
        ];

        return view('dashboard/index', [
            'tableData' => $tableData,
            'multiSeriesCharts' => $multiSeriesCharts,
            'pieCharts' => $pieCharts,
        ]);
    }
    public function topics()
    {
        $topics = OtherTopic::orderBy('created_at', 'DESC')->get();
        $persons_chart = [
            'series' => 'Antal',
            'type' => 'bar',
            'dataset' => [6, 9, 5],
            'colors' => ['#a3dcd9', '#96b2b6', '#f4b2a4'],
            'categories' => ['Josephine Jespersen', 'Nikolaj With Lauritsen', 'Morten Klark'],
        ];
        
        $topicCharts = [
            'topFive' => [
                'series' => 'Andel',
                'type' => 'bar',
                'dataset' => [
                    1 => [
                        'title' => 'Andel',
                        'dataset' => [10.4, 11.4, 14.5, 15.2, 18.3],
                    ],
                    2 => [
                        'title' => 'Antal',
                        'dataset' => [150, 161, 198, 211, 242]
                    ],
                ],
                'dataset_2' => [150, 161, 198, 211, 242],
                'colors' => ['#369c96', '#ace3e1'],
                'categories' => ['Eksamensangst', 'Barsel', 'Fastholde trivsel', 'Mistrivsel', 'Økonomi'],
                'procent' => true,
                'distributed' => "false",
            ],
            'lowFive' => [
                'series' => 'Andel',
                'type' => 'bar',
                'dataset' => [
                    1 => [
                        'title' => 'Andel',
                        'dataset' => [0.5, 1.4, 1.8, 2.1, 2.9]
                    ],
                    2 => [
                        'title' => 'Antal',
                        'dataset' => [150, 161, 198, 211, 242]
                    ],
                ],
                'colors' => ['#EE866F', '#f2cac1'],
                'categories' => ['Orlov', 'Undervisning', 'Andet', 'Praktik', 'SPS'],
                'procent' => true,
                'distributed' => "false",
            ],
        ];

        return view('dashboard/topics', [
            'topics' => $topics,
            'person_chart' => $persons_chart,
            'topicCharts' => $topicCharts,
        ]);
    }

    public function getRandomNumbers($amount)
    {
        $target = 100;
        while ($amount) {
            if (1 < $amount--) {
                $addend = rand(0, $target - ($amount - 1));
                $target -= $addend;
                $res[] = $addend;
            } else {
                $res[] = $target;
            }
        }
        return $res;
    }

    public function student()
    {
        $questionCharts = [
            'question_1' => [
                'series' => 'Andel',
                'type' => 'bar',
                // 'dataset' => [5, 15, 20, 40, 20],
                'dataset' => [
                    1 => [
                        'title' => 'Andel',
                        'dataset' => [5, 15, 20, 40, 20]
                    ],
                ],
                'colors' => ['#ee866f', '#f4b2a4', '#fae76a', '#a3dcd9', '#47b9b3'],
                'categories' => ['Slet ikke', 'Ikke meget', 'Delvist', 'Tilfreds', 'Meget Tilfreds'],
                'procent' => true,
                'distributed' => true,
            ],
            'question_2' => [
                'series' => 'Andel',
                'type' => 'bar',
                // 'dataset' => [15, 10, 27, 25, 23],
                'dataset' => [
                    1 => [
                        'title' => 'Andel',
                        'dataset' => [15, 10, 27, 25, 23],
                    ],
                ],
                'colors' => ['#ee866f', '#f4b2a4', '#fae76a', '#a3dcd9', '#47b9b3'],
                'categories' => ['Slet ikke', 'Ikke meget', 'Delvist', 'Tilfreds', 'Meget Tilfreds'],
                'procent' => true,
                'distributed' => true,
            ],
        ];
        $questions = ['I hvilken grad oplevede du at blive forstået af vejlederen?', 'I hvilken grad er du blevet mere klar på hvad du skal gøre nu?'];
        $years = [2022, 2021, 2020, 2019];
        $dataset = [];

        foreach($years as $year){
            if(!array_key_exists($year, $dataset)){
                $dataset[$year] = [];
            }
            foreach($questions as $que => $value){
                if(!array_key_exists($que, $dataset[$year])){
                    $dataset[$year][$que] = [
                        'title' => $value,
                        'answers' => $this->getRandomNumbers(5),
                    ];
                }
            }
        }
        $colors = array_reverse($questionCharts['question_1']['colors']);
        $labels = array_reverse($questionCharts['question_1']['categories']);

        return view('dashboard/student', [
            'questionCharts' => $questionCharts,
            'dataset' => $dataset,
            'colors' => $colors,
            'labels' => $labels,
        ]);
    }
}
