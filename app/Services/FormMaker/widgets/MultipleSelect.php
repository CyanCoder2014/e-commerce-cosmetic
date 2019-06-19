<?php

namespace App\Services\FormMaker\widgets;

use App\Services\FormMaker\Widget;
use http\Exception\BadConversionException;

class MultipleSelect extends Widget
{
    protected $Options;

    public function Options($Options):self
    {

        $Options = $this->mustBeArray($Options);
        if (!is_array($Options))
            throw new BadConversionException($this->name.' options should be array or method that output array');

        $this->Options = $Options;
        return $this;
    }
    public function Value($Value):Widget
    {
        $Value = $this->mustBeArray($Value);
        if (!is_array($Value))
            throw new BadConversionException($this->name.' value should be array or function that return array');
        $this->values = $Value;
        return $this;
    }

    public function Field()
    {
        $field='<div class="col-sm-'.$this->getCol().' form-group '.$this->getName().'">
                <label for="'.$this->getName().'">'.$this->getSlug().'</label>
                <select name="'.$this->getName().'" id="'.$this->getName().'" class="form-control" multiple="multiple">';

        foreach($this->Options as $key => $val) {
            $field .= '<option value="' . $key . '" ';
            if (in_array( $key,$this->getValue()))
                $field .= ' selected="" ';
            $field .= '>' . $val . '</option>';
        }

        $field.='</select></div>';
        return $field;
    }
    public function JS()
    {
        return ['select2'];
    }
    public function Script()
    {
        $script = '$("#'.$this->getName().'").select2();';
        return $script;
    }
    public function Css()
    {
        return ['select2'];
    }


}