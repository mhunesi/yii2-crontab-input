<?php

namespace mhunesi\crontab\input;

use Yii;
use yii\helpers\Html;
use yii\web\View;
use yii\helpers\Json;
use yii\web\JsExpression;
use yii\helpers\ArrayHelper;
use yii\widgets\InputWidget;
use mhunesi\crontab\input\assets\CrontabInputAssets;

/**
 * This is just an example.
 */
class CrontabInput extends InputWidget
{
    public $el = 'crontab-input-card';

    /**
     * @var string
     * Default app language
     */
    public $language;

    /**
     * @var string
     * Default Tab
     */
    public $tab = 'minutes';

    /**
     * @var array
     * Visible Tabs
     */
    public $tabs = [
        'minutes' => true,
        'hourly' => true,
        'daily' => true,
        'weekly' => true,
        'monthly' => true,
        'yearly' => true,
        'advanced' => true,
    ];

    /**
     * @var array
     * Vue JS Data
     */
    private $data =  [
        'type' => 'minutes',
        'description' => '',
        'cronExpression' => '* * * * *',
        'minutes' => [
            'minuteInterval' => 1
        ],
        'hourly' => [
            'radio' => 'every',
            'minuteInterval' => 30,
            'hourInterval' => 12,
            'everyHourInterval' => 12
        ],
        'daily' => [
            'radio' => 'every-day',
            'dayInterval' => 1,
            'hourInterval' => 12,
            'minuteInterval' => 30
        ],
        'weekly' => [
            'minutes' => 0,
            'hours' => 12,
            'days' => [
                'MON'
            ]
        ],
        'monthly' => [
            'radio' => 'day',
            'rank' => 1,
            'day' => 1,
            'dayName' => 'MON',
            'month' => 1,
            'hours' => 12,
            'minutes' => 30
        ],
        'yearly' => [
            'radio' => 'every',
            'rank' => 1,
            'day' => 1,
            'dayName' => 'MON',
            'month' => 1,
            'hours' => 12,
            'minutes' => 30
        ],
        'advanced' => [
            'manuelExp' => '* * * * *'
        ],
        'nextDates' => [
        ]
    ];

    /**
     * Initializes the widget.
     * If you override this method, make sure you call the parent implementation first.
     */
    public function init()
    {
        parent::init();
        $this->setLanguage();
        $this->registerTranslations();
    }

    /**
     * Executes the widget.
     */
    public function run()
    {
        $this->el = $this->id . '_' . $this->el;

        $this->registerClientScript();

        $this->renderInput();
    }

    /**
     * Default app language
     * Yii::$app->language
     */
    public function setLanguage()
    {
        if(!$this->language){
            $this->language = substr(Yii::$app->language,0,2);
        }

        $this->data = ArrayHelper::merge($this->data,
            [
                'language' => $this->language,
                'tabs' => $this->tabs,
                'type' => $this->tab
            ]
        );
    }

    public function renderInput()
    {
        echo $this->view->render('@vendor/mhunesi/yii2-crontab-input/src/views/_input',['el' => $this->el]);

        echo $this->renderInputHtml('hidden');
    }

    public function registerClientScript()
    {
        if($this->hasModel()){
            $inputID = Html::getInputId($this->model,$this->attribute);
        }else{
            $inputID = $this->id;
        }

        CrontabInputAssets::register($this->view);

        $vueData = Json::encode([
            'el' => '#'.$this->el,
            'data' => $this->data,
            'language' => $this->language,
            'computed' => [
                'generateDescription' => new JsExpression('CronTabInput.generateDescription')

            ],
            'methods' => [
                'setInputValue' => new JsExpression("function(){
                   document.querySelector('#{$inputID}').value = this.cronExpression;
                }"),
            ]
        ]);

        $this->view->registerJs("var crontabInput_{$this->id} =new Vue($vueData);",View::POS_END);
    }

    public function registerTranslations()
    {
        $i18n = Yii::$app->i18n;
        $i18n->translations['crontab-input'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'sourceLanguage' => 'en-US',
            'basePath' => '@vendor/mhunesi/yii2-crontab-input/src/messages',
        ];
    }

    public static function t($message, $params = [], $language = null)
    {
        return Yii::t('crontab-input', $message, $params, $language);
    }
}
