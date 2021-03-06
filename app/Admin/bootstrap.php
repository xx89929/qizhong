<?php

/**
 * Laravel-admin - admin builder based on Laravel.
 * @author z-song <https://github.com/z-song>
 *
 * Bootstraper for Admin.
 *
 * Here you can remove builtin form field:
 * Encore\Admin\Form::forget(['map', 'editor']);
 *
 * Or extend custom form field:
 * Encore\Admin\Form::extend('php', PHPEditor::class);
 *
 * Or require js and css assets:
 * Admin::css('/packages/prettydocs/css/styles.css');
 * Admin::js('/packages/prettydocs/js/main.js');
 *
 */

use App\Admin\Extensions\WangEditor;
use Encore\Admin\Form;
use App\Admin\Extensions\Column\UrlWrapper;
use Encore\Admin\Grid\Column;
use Encore\Admin\Facades\Admin;
use App\Admin\Extensions\UEditor;
use App\Admin\Extensions\Aetherupload;

Encore\Admin\Form::forget(['map', 'editor']);

Admin::js('/vendor/clipboard/dist/clipboard.js');


Form::extend('editor', WangEditor::class);
Form::extend('ueditor', UEditor::class);
Form::extend('bigdata', Aetherupload::class);
Column::extend('urlWrapper', UrlWrapper::class);

