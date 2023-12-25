<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DownloadController extends Controller
{
    public function download($filename)
    {
        return response()->download($filename, 'exported.pdf');
    }
}
