<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ToolsController extends Controller
{
    public function upload(Request $request)
    {
        $file = Storage::putFile('uploads', $request->file('file'));

        return $file;
    }
}
