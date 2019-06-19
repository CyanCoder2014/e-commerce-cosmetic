<?php

namespace App\Services\FormMaker\widgets;

use App\Services\FormMaker\Widget;

class Select extends Widget
{
    protected $Options;

    public function Options($Options):self
    {

        $Options = $this->mustBeArray($Options);
        if (!is_array($Options))
            throw new \Exception($this->name.' options should be array or method that output array');

        $this->Options = $Options;
        return $this;
    }

    public function Field()
    {
        $field='<select name="'.$this->getName().'" id="'.$this->getName().'" class="form-control">';

            foreach($this->Options as $key => $val){
                $field.='<option value="'.$key.'" ';
                if ($this->getValue() == $key)
                    $field.=' selected="" ';
                $field.='>'.$val.'</option>';

            }

        $field.='</select>';
        return $this->BaseField($field);
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