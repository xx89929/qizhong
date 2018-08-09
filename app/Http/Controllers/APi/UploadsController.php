<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class UploadsController extends Controller
{


    public function editUploads(Request $request){

        $path['errno'] = 0;
        $path_img = $request->file('wang_file')->store('public');

        $path['data'] = [env('APP_URL').Storage::url($path_img)];
        return $path;
    }
}
