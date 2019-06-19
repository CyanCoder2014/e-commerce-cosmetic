<?php

namespace App\Services\FormMaker\widgets;

use App\Services\FormMaker\Widget;
use http\Exception\BadConversionException;

class Date extends Widget
{
    use \persian_date;
    public function Value($value):Widget
    {


        if (!$this->isDate($value))
            throw new BadConversionException($this->name.' value should be date or timestamp');
        $value = new \DateTime($value);
        $this->values = implode('/',$this->gregorian_to_persian($value->format("Y"),$value->format("m"),$value->format("d")));
        return $this;
    }

    public function Field()
    {
        $field='<input type="text" name="'.$this->getName().'" id="'.$this->getName().'" value="'.$this->getValue().'" class="form-control">';
        return $this->BaseField($field);
    }
    public function JS()
    {

        return ['datepicker'];
    }
    public function Script()
    {
        $script = '$("#'.$this->getName().'").MdPersianDateTimePicker({
            targetTextSelector: "'.$this->getName().'"
        });';
        return $script;
    }
    public function Css()
    {
        return ['datepicker'];
    }


}