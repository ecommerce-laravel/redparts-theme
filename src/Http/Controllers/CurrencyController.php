<?php

namespace Wjurry\RedParts\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class CurrencyController extends Controller
{
    public function switch($currency)
    {
        Session::put('selected_currency', $currency);

        return response(status: Response::HTTP_NO_CONTENT);
    }
}