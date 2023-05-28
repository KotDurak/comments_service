<?php


namespace app\widgets;


use yii\base\Model;
use yii\base\Widget;

class DateFilter extends Widget
{
    public Model $model;
    public string $from = 'from';
    public string $to= 'to';
    public array $options = [];
    const  DEFAULT_OPTIONS  = [
        'convertFormat'=>true,
        'language'  => 'ru',
        'pluginOptions'=>[
            'timePickerIncrement'=>15,
            'format' => 'yyyy-MM-dd H:i',
            'singleDatePicker'=>true,
            'showDropdowns'=>true,
        ]
    ];

    public function run()
    {
        return $this->render('date/index', [
            'model'     => $this->model,
            'from'      => $this->from,
            'to'        => $this->to,
            'options'   => array_merge(self::DEFAULT_OPTIONS, $this->options),
        ]);
    }
}