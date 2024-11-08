<?php


namespace Akyos\Blocks\View\Components;

use Illuminate\View\Component;

class AkySlider extends Component
{
    public $name;
    public $per;
    public $perxs;
    public ?string $persm;
    public $permd;
    public $navigation;

    public ?string $pagination;
    public $autoheight;
    public $gap;
    public $sliderid;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $per, $persm, $permd, $perxs, $navigation, $sliderid, $pagination = null, $autoheight = false, $gap = 20)
    {
        $this->name = $name;
        $this->per = $per;
        $this->navigation = $navigation;
        $this->persm = $persm;
        $this->permd = $permd;
        $this->perxs = $perxs;
        $this->autoheight = $autoheight;
        $this->gap = $gap;
        $this->pagination = $pagination;
        $this->slider_id = $slider_id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('akyos-blocks::components.aky-slider');
    }
}
