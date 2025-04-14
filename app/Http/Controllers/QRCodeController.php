<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\Visitor; 
class QRCodeController extends Controller

{
    /**
     * Write code on Method
     * 
     *  @return response()
     */
    public function index(Request $request)
    {
        return view('qrcode');
    }
}
