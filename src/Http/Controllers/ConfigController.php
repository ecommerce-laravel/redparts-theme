<?php

namespace Wjurry\RedParts\Http\Controllers;

use Illuminate\Routing\Controller;

class ConfigController extends Controller
{
    public function index()
    {
        return response()->file(public_path('redparts/config.json'));
    }
}