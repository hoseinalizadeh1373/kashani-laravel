<?php

namespace App\View\Components;

use Illuminate\View\Component;

class MultiOption extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

     public $param;
     public $answer;
     public $select_name;
     public $label;
    public function __construct($select_name,$param,$answer,$label)
    {
        $this->answer = $answer;
        $this->param = $param;
        $this->select_name = $select_name;
        $this->label= $label;
        
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
   
        return view('components.multi-option');
    }
}
