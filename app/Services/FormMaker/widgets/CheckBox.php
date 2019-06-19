<?php

namespace App\Services\FormMaker\widgets;

use App\Services\FormMaker\Widget;
use http\Exception\BadConversionException;

class CheckBox extends Widget
{

    public function Field()
    {
        $field='<input type="checkbox" name="'.$this->getName().'" id="'.$this->getName().'" value="'.$this->getValue().'"';
        if ($this->getValue() == true or $this->getValue() == 1 )
            $field .= ' checked';
        $field .= ' >';
        return $this->BaseField($field);
    }



}