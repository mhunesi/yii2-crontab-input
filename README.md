Yii2 Crontab Input
==================
Yii2 Crontab Input Extensions

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
composer require mhunesi/yii2-crontab-input "*"
```

or add

```
"mhunesi/yii2-crontab-input": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
<?= $form->field($model, 'cron')->widget('\mhunesi\crontab\input\CrontabInput',[
    'tab' => 'weekly',
    'tabs' => [
        'minutes' => false, //Minutes tab invisible
        'hourly' => false,  //Minutes tab invisible
        'daily' => false,   //Minutes tab invisible
        'weekly' => true,   //Minutes tab visible
        'monthly' => true,  //Minutes tab visible
        'yearly' => true,   //Minutes tab visible
        'advanced' => false,//Minutes tab invisible
    ]
]) ?>

```

Or  

```php
<?= \mhunesi\crontab\input\CrontabInput::widget([
        'name' => 'cron'
]) ?>
```