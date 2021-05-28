<?php

use JGile\BladeComponents\View\Components;

return [
    /*
     |--------------------------------------------------------------------------
     | Components Prefix
     |--------------------------------------------------------------------------
     |
     | This value will set a prefix for all components.
     | By default it's empty. This is useful if you want to avoid
     | collision with components from other libraries.
     |
     | If set with "buk", for example, you can reference components like:
     |
     | <x-buk-easy-mde />
     |
     */
    'prefix' => '',

    /*
     |--------------------------------------------------------------------------
     | Components
     |--------------------------------------------------------------------------
     */
    'components' => [
        'cc-icon' => 'blade-components::cc-icon',
        'carbon' => Components\Carbon::class,
        'form' => Components\Form::class,
        'form-group' => Components\FormGroup::class,
        'label' => Components\Label::class,
        'input' => Components\Input::class,
        'error' => Components\Error::class,
        'validation-errors' => Components\ValidationErrors::class,
        'textarea' => Components\Textarea::class,
        'radio' => Components\Radio::class,
        'checkbox' => Components\Checkbox::class,
        'datepicker' => Components\Datepicker::class,
        'select2' => Components\Select2::class,
        'select' => Components\Select::class,
        'button' => Components\Button::class,
        'quill' => Components\Quill::class,
        'quill-content' => Components\QuillContent::class,
        'table' => Components\Table::class,
        'tr' => Components\Tr::class,
        'th' => Components\Th::class,
        'td' => Components\Td::class,
        'p' => Components\Paragraph::class,
        'code' => Components\Code::class,
        'card' => Components\Card::class,
        'modal' => Components\Modal::class,
        'badge' => Components\Badge::class,
        'spinner' => Components\Spinner::class,
        'social-meta' => Components\SocialMeta::class,
        'html' => Components\Html::class,
        'stack' => Components\Stack::class,
        'stack-item' => Components\StackItem::class,
        'alert' => Components\Alert::class,
        'carbon' => Components\Carbon::class,
        'countdown' => Components\Countdown::class,
        'tabs' => Components\Tabs::class,
        'tab' => Components\Tab::class,
    ]
];