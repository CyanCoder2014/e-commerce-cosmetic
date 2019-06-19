<?php

namespace App\Services\FormMaker\widgets;

use App\Services\FormMaker\Widget;
use http\Exception\BadConversionException;

class Textarea extends Widget
{

    public function Field()
    {
        $field='<textarea  name="'.$this->getName().'" id="'.$this->getName().'" class="form-control">'.$this->getValue().'</textarea>';
        return $this->BaseField($field);
    }




}