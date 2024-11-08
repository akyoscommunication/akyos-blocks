<?php


namespace Akyos\Blocks\View\Components;

use Illuminate\View\Component;

class AkySlider extends Component
{
    public $name;
    public $per;
    public $per_xs;
    public $per_sm;
    public $per_md;
    public $navigation;

    public ?string $pagination;
    public $autoheight;
    public $gap;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $per, $persm, $permd, $perxs, $navigation, $pagination = null, $autoheight = false, $gap = 20)
    {
        $this->name = $name;
        $this->per = $per;
        $this->navigation = $navigation;
        $this->per_sm = $persm;
        $this->per_md = $permd;
        $this->per_xs = $perxs;
        $this->autoheight = $autoheight;
        $this->gap = $gap;
        $this->pagination = $pagination;
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
