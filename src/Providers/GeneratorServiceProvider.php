<?php

namespace Leizhishang\Modules\Providers;

use Illuminate\Support\ServiceProvider;

class GeneratorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $generators = [
            'command.make.module'            => \Leizhishang\Modules\Console\Generators\MakeModuleCommand::class,
            'command.make.module.controller' => \Leizhishang\Modules\Console\Generators\MakeControllerCommand::class,
            'command.make.module.middleware' => \Leizhishang\Modules\Console\Generators\MakeMiddlewareCommand::class,
            'command.make.module.migration'  => \Leizhishang\Modules\Console\Generators\MakeMigrationCommand::class,
            'command.make.module.model'      => \Leizhishang\Modules\Console\Generators\MakeModelCommand::class,
            'command.make.module.policy'     => \Leizhishang\Modules\Console\Generators\MakePolicyCommand::class,
            'command.make.module.provider'   => \Leizhishang\Modules\Console\Generators\MakeProviderCommand::class,
            'command.make.module.request'    => \Leizhishang\Modules\Console\Generators\MakeRequestCommand::class,
            'command.make.module.seeder'     => \Leizhishang\Modules\Console\Generators\MakeSeederCommand::class,
            'command.make.module.test'       => \Leizhishang\Modules\Console\Generators\MakeTestCommand::class,
        ];

        foreach ($generators as $slug => $class) {
            $this->app->singleton($slug, function ($app) use ($slug, $class) {
                return $app[$class];
            });

            $this->commands($slug);
        }
    }
}
