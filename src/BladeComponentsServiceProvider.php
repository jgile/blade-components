<?php

namespace JGile\BladeComponents;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;

class BladeComponentsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'blade-components');

        $this->callAfterResolving(BladeCompiler::class, function (BladeCompiler $blade) {
            $prefix = config('blade-components.prefix', '');
            foreach (config('blade-components.components') as $alias => $component) {
                $blade->component($component, $alias, $prefix);
            }
        });

        Collection::macro('putIf', function ($condition, $key, $value, $elseValue = null) {
            if ($condition) {
                $this->put($key, $value);
            } elseif ($elseValue) {
                $this->put($key, $elseValue);
            }

            return $this;
        });

        Collection::macro('pushIf', function ($condition, $value, $elseValue = null) {
            if ($condition) {
                $this->push($value);
            } elseif ($elseValue) {
                $this->push($elseValue);
            }

            return $this;
        });

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/blade-components.php' => $this->app->configPath('blade-components.php'),
            ], 'blade-components-config');

            $this->publishes([
                __DIR__ . '/../resources/css' => $this->app->resourcePath('resources/css/blade-components'),
            ], 'blade-components-css');

            $this->publishes([
                __DIR__ . '/../resources/views' => $this->app->resourcePath('views/vendor/blade-components'),
            ], 'blade-components-views');
        }
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/blade-components.php', 'blade-components');
    }
}
