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

class CronstrueAssets extends AssetBundle
{
    public $sourcePath = '@npm/cronstrue/dist';

    public $js = [
        'cronstrue.min.js',
        'cronstrue-i18n.min.js',
    ];

    public $depends = [
    ];
}