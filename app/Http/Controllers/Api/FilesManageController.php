<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use function MongoDB\BSON\toJSON;

class FilesManageController extends Controller
{

    public function getTemplateFiles(){
        $path = base_path('resources/views/pc/home/sub-template');
        $files = scandir($path);
        foreach ($files as $file) {

            $file = preg_replace('/\.blade.php$/','',$file);

            if ($file != '.' && $file != '..') {
                if (is_dir($path . '/' . $file)) {
                    return $path . '/' . $file;
                } else {
                    $result[$file] = basename($file);
                }
            }
        }
        return $result;
    }
}
