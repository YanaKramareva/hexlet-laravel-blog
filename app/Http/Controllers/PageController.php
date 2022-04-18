<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about()
    {
        // Точка используется вместо /.
        // То есть шаблон находится по пути resources/views/page/about.blade.php
        return view('page.about');
    }

    public function team()
    {

        $team = [
            ['name' => 'Hodor', 'position' => 'programmer'],
            ['name' => 'Joker', 'position' => 'CEO'],
            ['name' => 'Elvis', 'position' => 'CTO'],
        ];
        return view('page.team', compact('team'));
    }
}
