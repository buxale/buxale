<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrCodeController extends Controller
{
    public function generate(Request $request)
    {
        $code = base64_encode(QrCode::format('png')->size(500)->generate($request->code));

        $raw_image_string = base64_decode($code);

        return response($raw_image_string)->header('Content-Type', 'image/png');
    }
}
