<?php


namespace App\Services\FormMaker;


use http\Exception\BadMessageException;
use Illuminate\Support\Facades\Config;
/**
 * @method  bool has($key)
 * @method static mixed get($key, $default = null)
 * @method static array all()
 * @method static void set($key, $value = null)
 * @method static void prepend($key, $value)
 * @method static void push($key, $value)
 *
 * @see \Illuminate\Config\Repository
 */
class FormMaker
{
    private  $css=[
        'select2' => "https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css",
        'datepicker' => "/widgets/datepicker/jquery.md.bootstrap.datetimepicker.style.css",
        'datetimepicker' => "/widgets/datepicker/jquery.md.bootstrap.datetimepicker.style.css",
    ];
    private  $js=[
        'select2' => "https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js",
        'ckeditor' => "/assets/plugins/ckeditor/ckeditor.js",
        'datepicker' => "/widgets/datepicker/jquery.md.bootstrap.datetimepicker.js",
        'datetimepicker' => "/widgets/datepicker/jquery.md.bootstrap.datetimepicker.js",
        'filemanager' => "/vendor/laravel-filemanager/js/lfm.js",
    ];
    private  $attributes=[];
    private  $method='get';
    private  $url='';
    public function add(Widget $widget){
        if(isset($this->attributes[$widget->getName()]))
            throw new BadMessageException('widgets with that name exist');
        $this->attributes[] = $widget;
    }
    public function values($values){
        foreach ($this->attributes as $key => $attribute)
            if (isset($values->$key))
                $attribute->Value($values->$key);
            elseif(isset($values[$key]))
                $attribute->Value($values[$key]);
    }

    public function Form(){
        $form='';
        foreach ($this->attributes as $key => $attribute)
            $form .= $attribute->Field();
        return $this->FormLayout($form);
    }

    protected function JsArray(){
        $scripts=[];
        foreach ($this->attributes as $key => $attribute)
            foreach ($attribute->JS() as $key)
                if(!isset($scripts[$key]) && isset($this->js[$key]))
                    $scripts[$key] = $this->js[$key];
        return $scripts;
    }
    public function Js(){
        $scripts='';
        foreach ($this->JsArray() as $key => $js)
            $scripts .= '<script src="'.$js.'"></script>';

        return $scripts;
    }
    protected function CssArray(){
        $links=[];
        foreach ($this->attributes as $key => $attribute)
            foreach ($attribute->Css() as $key)
                if(!isset($links[$key]) && isset($this->css[$key]))
                    $links[$key] = $this->css[$key];
        return $links;
    }
    public function Css(){
        $links='';
        foreach ($this->CssArray() as $key => $link)
            $links .= '<link href="'.$link.'" rel="stylesheet" />';

        return $links;
    }
    public function Script(){
        $scripts='';
        foreach ($this->attributes as $key => $attribute)
            $scripts .= $attribute->Script().$attribute->getShow();

        return $scripts;
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * @param string $method
     */
    public function setMethod(string $method)
    {
        $this->method = $method;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url)
    {
        $this->url = $url;
    }
    private function FormLayout($form){
        return '<form method="'.$this->getMethod().'" action="'.$this->getUrl().'">'.$form.'<div class="col-sm-12"><button class="btn btn-success">ثبت</button></div></div></form>';
    }



}