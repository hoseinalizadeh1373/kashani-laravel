<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Select extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

     public $value;
     public $options;
     public $name;
     public $label;
     public $attribute;
    public function __construct($name,$value,$options,$label,$attribute)
    {
        $this->options = $options;
        $this->value = $value;
        $this->name = $name;
        $this->label= $label;
        $this->attribute =$attribute;
        
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.select');
    }
}
