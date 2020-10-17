<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppController
{
    public function __invoke(Request $request)
    {
        return view('app.pages.index');
    }
}
