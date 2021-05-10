<?php

namespace JGile\BladeComponents;

use BladeUIKit\Components\Markdown\Markdown;
use Closure;
use Illuminate\Support\Facades\Blade;
use JGile\BladeComponents\Views\Components\Alert;
use JGile\BladeComponents\Views\Components\Badge;
use JGile\BladeComponents\Views\Components\Button;
use JGile\BladeComponents\Views\Components\Card;
use JGile\BladeComponents\Views\Components\Checkbox;
use JGile\BladeComponents\Views\Components\DatePicker;
use JGile\BladeComponents\Views\Components\Input;
use JGile\BladeComponents\Views\Components\InputDescription;
use JGile\BladeComponents\Views\Components\InputError;
use JGile\BladeComponents\Views\Components\InputGroup;
use JGile\BladeComponents\Views\Components\Label;
use JGile\BladeComponents\Views\Components\MediaItem;
use JGile\BladeComponents\Views\Components\Modal;
use JGile\BladeComponents\Views\Components\NumberStep;
use JGile\BladeComponents\Views\Components\Quill;
use JGile\BladeComponents\Views\Components\QuillContent;
use JGile\BladeComponents\Views\Components\Radio;
use JGile\BladeComponents\Views\Components\Select;
use JGile\BladeComponents\Views\Components\Select2;
use JGile\BladeComponents\Views\Components\Spinner;
use JGile\BladeComponents\Views\Components\Stack;
use JGile\BladeComponents\Views\Components\StackItem;
use JGile\BladeComponents\Views\Components\Table;
use JGile\BladeComponents\Views\Components\Td;
use JGile\BladeComponents\Views\Components\Th;
use JGile\BladeComponents\Views\Components\Tr;
use JGile\BladeComponents\Views\Components\Textarea;
use JGile\BladeComponents\Views\Components\Toggle;
use JGile\BladeComponents\Views\Components\ValidationErrors;
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
                Modal::class,
                Alert::class,
                Spinner::class,
                Table::class,
                Tr::class,
                Th::class,
                Td::class,
                Card::class,
                Badge::class,
                Button::class,
                Checkbox::class,
                DatePicker::class,
                Input::class,
                InputGroup::class,
                InputError::class,
                Label::class,
                NumberStep::class,
                Radio::class,
                Select::class,
                Select2::class,
                Textarea::class,
                Toggle::class,
                ValidationErrors::class,
                InputDescription::class,
                Stack::class,
                MediaItem::class,
                StackItem::class,
                Quill::class,
                QuillContent::class,
            ]);
    }

    public function bootingPackage()
    {
        $this->app->singleton(Variant::class, function () {
            return new Variant();
        });

        Blade::directive('variant', function ($expression) {
            return "<?php echo app(\JGile\BladeComponents\Variant::class)->get($expression); ?>";
        });
    }
}
