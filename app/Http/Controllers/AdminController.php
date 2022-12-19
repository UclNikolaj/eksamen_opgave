<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;

class AdminController extends Controller
{
    public function index()
    {
        $topics = Topic::get();
        return view('admin/index', [
            'topics' => $topics,
        ]);
    }
}
