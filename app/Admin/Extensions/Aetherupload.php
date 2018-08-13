<?php

namespace App\Admin\Extensions;

use Encore\Admin\Form\Field;
use http\Url;

class Aetherupload extends Field
{
    protected $view = 'admin.aetherupload';


    protected static $js = [
        'js/spark-md5.min.js',
        'js/aetherupload.js',
    ];

    public function render()
    {

        $name = $this->formatName($this->column);
        $this->script = <<<EOT
        
EOT;
        return parent::render();
    }
}