<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Topic;
use App\Models\Education;
use App\Models\Campus;

class FrontpageController extends Controller
{
    public function getTopics()
    {
        $topics = [
            'user' => [],
            'topics' => [],
        ];
        $allTopics = Topic::get();
        // first 6 topics is the users latest picked ones
        foreach ($allTopics->skip(0)->take(6) as $topic) {
            if (!array_key_exists($topic->id, $topics['user'])) {
                $topics['user'][$topic->id] = [
                    'title' => $topic->title,
                    'description' => $topic->description,
                ];
            }
        }
        // skip the first 6 (since they're in the users array)
        foreach ($allTopics->skip(6) as $topic) {
            if (!array_key_exists($topic->id, $topics['topics'])) {
                $topics['topics'][$topic->id] = [
                    'title' => $topic->title,
                    'description' => $topic->description,
                ];
            }
        }
        return $topics;
    }
    public function getCampus()
    {
        $res = [];
        $allCampus = Campus::get();
        foreach ($allCampus as $campus) {
            if (!in_array($campus->campus, $res)) {
                $res[$campus->id] = $campus->campus;
            }
        }
        return $res;
    }
    public function getEducations()
    {
        $res = [
            'user' => [],
            'educations' => [],
        ];
        $educations = Education::get();
        foreach ($educations->skip(0)->take(3) as $education) {
            if (!in_array($education->name, $res['user'])) {
                $res['user'][] = $education->name;
            }
        }
        foreach ($educations->skip(3) as $education) {
            if (!in_array($education->name, $res['educations'])) {
                $res['educations'][] = $education->name;
            }
        }
        return $res;
    }

    public function index()
    {
        $topics = $this->getTopics();
        $allCampus = $this->getCampus();
        $educations = $this->getEducations();
        $da_months = [
            1 => 'Januar', 2 => 'Februar', 3 => 'Marts',
            4 => 'April', 5 => 'Maj', 6 => 'Juni',
            7 => 'Juli', 8 => 'August', 9 => 'Oktober',
            10 => 'September', 11 => 'November', 12 => 'December'
        ];


        for ($i = 1; $i <= date('m'); $i++) {
            $months[$i] = $da_months[$i];
        }

        $convoDurations = [
            '1-15 min',
            '16-30 min',
            '31-45 min',
            '46-60 min',
            'mere end 60 min',
        ];
        $selectBoxes = [
            'Vælg måned' => [
                'errorMsg' => 'Vælg en måned',
                'icon' => 'fa-calendar-days',
                'name' => 'choose_month',
                'options' => $months,
                'selected' => date('m'),
            ],
            'Vælg campus' => [
                'errorMsg' => 'Vælg et campus',
                'icon' => ' fa-location-dot',
                'name' => 'choose_campus',
                'options' => $allCampus,
                'selected' => 2,
            ],
            'Samtalens varighed' => [
                'errorMsg' => 'Vælg en tids horisont',
                'icon' => 'fa-clock',
                'name' => 'convo_duration',
                'options' => $convoDurations,

            ],
            
        ];

        $radioBoxes = [
            1 => [
                'title' => 'Henvendelsestype',
                'name' => 'inquire_type',
                'errorMsg' => 'Du skal vælge en henvendelsestype',
                'options' => [
                    1 => [
                        'icon' => 'fa-handshake',
                        'id' => 'inquiry_type_1',
                        'title' => 'Personlig',
                    ],
                    2 => [
                        'icon' => 'fa-phone',
                        'id' => 'inquiry_type_2',
                        'title' => 'Telefonisk',
                    ],
                    3 => [
                        'icon' => 'fa-headset',
                        'id' => 'inquiry_type_3',
                        'title' => 'Virtuel',
                    ],
                ]
            ],
            2 => [
                'title' => 'Hvem blev vejledt?',
                'name' => 'person_or_group',
                'errorMsg' => 'Vælg én af mulighederne',
                'options' => [
                    1 => [
                        'icon' => 'fa-person-dress',
                        'id' => 'person_or_group_1',
                        'title' => 'Kvinde',
                    ],
                    2 => [
                        'icon' => 'fa-person',
                        'id' => 'person_or_group_2',
                        'title' => 'Mand',
                    ],
                    3 => [
                        'icon' => 'fa-people-group',
                        'id' => 'person_or_group_3',
                        'title' => 'Gruppe',
                    ],
                ]
            ],
            3 => [
                'title' => 'Nuværende studerende?',
                'name' => 'student_or_not',
                'errorMsg' => 'Vælg én af mulighederne',
                'options' => [
                    1 => [
                        'icon' => 'fa-check',
                        'id' => 'student_or_not_1',
                        'title' => 'Ja',
                    ],
                    2 => [
                        'icon' => 'fa-xmark',
                        'id' => 'student_or_not_2',
                        'title' => 'Nej',
                    ],
                ]
            ],
        ];

        return view('frontpage/index', [
            'topics' => $topics,
            'allCampus' => $allCampus,
            'educations' => $educations,
            'selectBoxes' => $selectBoxes,
            'radioBoxes' => $radioBoxes,
        ]);
    }
}
