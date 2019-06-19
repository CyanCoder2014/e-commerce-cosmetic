<?php

namespace App\Services\FormMaker\widgets;

use App\Services\FormMaker\Widget;
use http\Exception\BadConversionException;

class Filemanager extends Widget
{
    protected $type='file';

    public function Type(string $type){
        switch ($type){
            case 'image': $this->type = $type;break;
            case 'file': $this->type = $type;break;
        }
    }

    public function Field()
    {
        $field='<span class="input-group-btn">
     <a id="lfm'.$this->getName().'" data-input="'.$this->getName().'" data-preview="thumbnail'.$this->getName().'" class="btn btn-primary">
       <i class="fa fa-picture-o"></i> انتخاب
     </a>
   </span>
    <input id="'.$this->getName().'" class="form-control" type="text" name="'.$this->getName().'" value="'.$this->getValue().'">
    <img id="thumbnail'.$this->getName().'" style="margin-top:15px;max-height:100px;" src="'.$this->getValue().'">';
        return $this->BaseField($field);
    }
    public function JS()
    {
        return ['filemanager'];
    }
    public function Script()
    {
        $script = '$("'.$this->getName().'").filemanager("'.$this->type.'");';
        return $script;
    }


}