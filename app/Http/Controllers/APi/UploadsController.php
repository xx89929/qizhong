<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class UploadsController extends Controller
{


    public function editUploads(Request $request){

        $path['errno'] = 0;
//        $file = $request->file('wang_file');
//        $extension = $file->extension();
//        $store_result = $file->store('images');
//        $output = [
//            'extension' => $extension,
//            'store_result' => $store_result
//        ];
//        $res['data'] = $output;

        $path_img = $request->file('wang_file')->store('public');

        $path['data'] = [env('APP_URL').Storage::url($path_img)];
        return $path;
    }
}
