<?php
/**
 * (developer comment)
 *
 * @link http://www.mustafaunesi.com.tr/
 * @copyright Copyright (c) 2020 Polimorf IO
 * @product PhpStorm.
 * @author : Mustafa Hayri ÜNEŞİ <mhunesi@gmail.com>
 * @date: 2020-04-10
 * @time: 11:35
 */

namespace mhunesi\crontab\input\assets;

use Yii;
use yii\web\AssetBundle;

class CrontabInputAssets extends AssetBundle
{
    public function init()
    {
        $this->sourcePath = __DIR__ . '/_bundle';
        parent::init();
    }

    public $css = [
        'css/crontab-input.css',
    ];

    public $js = [
        'js/vue.min.js',
        'js/crontab-input.js',
    ];

    public $depends = [
        'mhunesi\crontab\input\assets\LastJsAssets',
        'mhunesi\crontab\input\assets\MomentJsAssets',
        'mhunesi\crontab\input\assets\CronstrueAssets',
    ];
}