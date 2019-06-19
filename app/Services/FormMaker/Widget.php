<?php


namespace App\Services\FormMaker;




abstract class Widget
{
    protected $name;
    protected $slug;
    protected $col;
    protected $value;
    protected $show;

    public function __construct($name, $col=null, $slug='')
    {
        $this->name=$name;
        $this->col=$col;
        $this->slug=$slug;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function Name($name):self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    protected function getCol()
    {
        return $this->col;
    }

    /**
     * @param mixed $col
     */
    public function Col($col):self
    {
        $this->col = $col;
        return $this;
    }

    /**
     * @return mixed
     */
    protected function getValue()
    {
        return $this->value??null;
    }

    /**
     * @param mixed $values
     */
    public function Value( $value):self
    {
        $this->value = $value;
        return $this;
    }



    /**
     * @return mixed
     */
    public function getShow()
    {
        return $this->show;
    }

    /**
     * @param mixed $show
     */
    public function ShowIf($widgetName,$method):self
    {
        $array = $this->mustBeArray($method);
        if (!is_array($array))
            throw new \Exception($this->name.'ShowIf method should be array or function have array output ');

        if (count($array) < 1)
            throw new \Exception($this->name.'ShowIf method is Empty');


        $if = ' if(';
        foreach ($array as $key => $value){
            $if .='$("#'.$widgetName.'").val() == '.$value;
            if(isset($array[$key+1]))
                $if .=' || ';
        }
        $if .= ")
            $('.".$this->getName()."').show();
        else
            $('.".$this->getName()."').hide();
        ";
        $this->show = $if."$('#".$widgetName."').on('change',function(){".$if."});";

        return $this;
    }


    public function Field(){
        return '';
    }
    protected function BaseField($input){
        return '<div class="col-sm-'.$this->getCol().' form-group '.$this->getName().'">
            <label for="'.$this->getName().'">'.$this->getSlug().'</label>'.$input.'</div>';
    }

    public function Script(){
        return '';
    }
    public function Css(){
        return [];
    }

    public function JS(){
        return [];
    }

    /**
     * @return mixed
     */
    public function getSlug()
    {
        return $this->slug??$this->name;
    }

    /**
     * @param mixed $slug
     */
    public function setSlug(string $slug):self
    {
        $this->slug = $slug;
        return $this;
    }

    protected function mustBeArray($values){
        if (is_array($values))
            return $values;
        elseif(is_callable($values)) {
            $val = $values();
            if (is_array($val))
                return $val;
            else
                return false;
        }
        else
            return false;
    }
    function isDate($value)
    {
        if (!$value) {
            return false;
        }

        try {
            new \DateTime($value);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }





}
