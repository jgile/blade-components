<?php

namespace JGile\BladeComponents\Views\Components;

use DBlackborough\Quill\Render;
use Exception;
use Illuminate\View\Component;

class QuillContent extends Component
{
    public $html;

    public function __construct($content)
    {
        try {
            $quill = new Render(is_array($content) ? json_encode($content) : $content);
            $this->html = $quill->render();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function render()
    {
        return view("blade-components::components.quill-content");
    }
}