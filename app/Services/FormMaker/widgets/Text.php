<?php

namespace App\Services\FormMaker\widgets;

use App\Services\FormMaker\Widget;
use http\Exception\BadConversionException;

class Text extends Widget
{

    public function Field()
    {
        $field='<input type="text" name="'.$this->getName().'" id="'.$this->getName().'" value="'.$this->getValue().'" class="form-control">';
        return $this->BaseField($field);
    }



}