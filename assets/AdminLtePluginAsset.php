<?php
/**
 * Created by PhpStorm.
 * User: faizmalek
 * Date: 12/10/2018
 * Time: 9:33 AM
 */

use yii\web\AssetBundle;


class AdminLtePluginAsset extends AssetBundle
{
    public $sourcePath = '@vendor/almasaeed2010/adminlte/plugins';
    public $js = [
        'datatables/dataTables.bootstrap.min.js',
// more plugin Js here
    ];
    public $css = [
        'datatables/dataTables.bootstrap.css',
// more plugin CSS here
    ];
    public $depends = [
        'dmstr\web\AdminLteAsset',
    ];
}