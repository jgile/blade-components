<?php

namespace JGile\BladeComponents;

use Illuminate\Support\Facades\Blade;
use JGile\BladeComponents\View\Components\Code;
use JGile\BladeComponents\View\Components\Alert;
use JGile\BladeComponents\View\Components\Badge;
use JGile\BladeComponents\View\Components\Button;
use JGile\BladeComponents\View\Components\Card;
use JGile\BladeComponents\View\Components\Checkbox;
use JGile\BladeComponents\View\Components\Datepicker;
use JGile\BladeComponents\View\Components\Form;
use JGile\BladeComponents\View\Components\Html;
use JGile\BladeComponents\View\Components\Input;
use JGile\BladeComponents\View\Components\Error;
use JGile\BladeComponents\View\Components\FormGroup;
use JGile\BladeComponents\View\Components\Label;
use JGile\BladeComponents\View\Components\MediaItem;
use JGile\BladeComponents\View\Components\Modal;
use JGile\BladeComponents\View\Components\NumberStep;
use JGile\BladeComponents\View\Components\P;
use JGile\BladeComponents\View\Components\Quill;
use JGile\BladeComponents\View\Components\QuillContent;
use JGile\BladeComponents\View\Components\Radio;
use JGile\BladeComponents\View\Components\Select;
use JGile\BladeComponents\View\Components\Select2;
use JGile\BladeComponents\View\Components\SocialMeta;
use JGile\BladeComponents\View\Components\Spinner;
use JGile\BladeComponents\View\Components\Stack;
use JGile\BladeComponents\View\Components\StackItem;
use JGile\BladeComponents\View\Components\Table;
use JGile\BladeComponents\View\Components\Td;
use JGile\BladeComponents\View\Components\Th;
use JGile\BladeComponents\View\Components\Tr;
use JGile\BladeComponents\View\Components\Textarea;
use JGile\BladeComponents\View\Components\Toggle;
use JGile\BladeComponents\View\Components\ValidationErrors;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class BladeComponentsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $prefix = config('blade-components.prefix', '') ? config('blade-components.prefix', '') . '-' : '';

        $package->name('blade-components')
            ->hasViews()
            ->hasConfigFile()
            ->sharesDataWithAllViews('bladeComponentsPrefix', $prefix)
            ->hasViewComponents(config('blade-components.prefix', ''), ...[
                
                // Forms
                Form::class,
                FormGroup::class,
                Label::class,
                Input::class,
                Error::class,
                ValidationErrors::class,
                Textarea::class,
                Radio::class,
                Checkbox::class,
                Datepicker::class,
                Select::class,
                Select2::class,
                Toggle::class,
                Button::class,
                Quill::class,
                QuillContent::class,

                // Table
                Table::class,
                Tr::class,
                Th::class,
                Td::class,
                P::class,

                // Display
                Code::class,
                Card::class,
                Modal::class,
                Badge::class,
                Alert::class,
                Spinner::class,
                MediaItem::class,
                SocialMeta::class,

                // Layout
                Html::class,
                Stack::class,
                StackItem::class,

                // Other

            ]);
    }

    public function bootingPackage()
    {
        Blade::directive('variant', function ($expression) {
            return "<?php echo \JGile\BladeComponents\Component::make($expression); ?>";
        });
    }
}
