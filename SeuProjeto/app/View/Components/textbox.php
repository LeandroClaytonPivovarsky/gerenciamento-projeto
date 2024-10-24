<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

use function PHPUnit\Framework\isNull;

class textbox extends Component {

    public $name;
    public $label;
    public $type;
    public $value;
    public $disabled;
    public $id;

    
    public function __construct($name, $label, $type, $value, $disabled, $id) {
        $this->name = $name;
        $this->label = $label;
        $this->type = $type;
        $this->value = $value;
        $this->disabled = $disabled;
        $this->id = $id;

    }

    public function render() {
        return view('components.textbox');
    }
}
