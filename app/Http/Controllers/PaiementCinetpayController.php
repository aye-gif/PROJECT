<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaiementCinetpayController extends Controller
{
    //
    public function cinetpay(){

        return view('client.CinetPay');
    }
}
