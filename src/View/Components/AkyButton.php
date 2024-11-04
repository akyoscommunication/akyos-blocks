<?php

namespace Akyos\Blocks\View\Components;

use Illuminate\View\Component;

class AkyButton extends Component
{
    public $appearance;
    public $icon;
    public $iconposition;
    public $borderradius;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($appearance = null, $icon = null, $iconposition = null, $borderradius = null)
    {
        $this->appearance = $appearance;
        $this->icon = $icon;
        $this->iconposition = $iconposition;
        $this->borderradius = $borderradius;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('akyos-blocks::components.aky-button');
    }
}
