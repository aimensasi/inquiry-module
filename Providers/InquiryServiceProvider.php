<?php

namespace Modules\Inquiry\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;

class InquiryServiceProvider extends ServiceProvider{
  /**
   * Boot the application events.
   *
   * @return void
   */
  public function boot(){
    $this->registerTranslations();
    $this->registerConfig();
    $this->registerViews();
    $this->registerFactories();
    $this->loadMigrationsFrom(module_path('Inquiry', 'Database/Migrations'));
  }

  /**
   * Register the service provider.
   *
   * @return void
   */
  public function register(){
    $this->app->register(RouteServiceProvider::class);
  }

  /**
   * Register config.
   *
   * @return void
   */
  protected function registerConfig(){
    $this->publishes([
      module_path('Inquiry', 'Config/config.php') => config_path('inquiry.php'),
    ], 'config');
    $this->mergeConfigFrom(
      module_path('Inquiry', 'Config/config.php'), 'inquiry'
    );
  }

  /**
   * Register views.
   *
   * @return void
   */
  public function registerViews(){
    $viewPath = resource_path('views/modules/inquiry');

    $sourcePath = module_path('Inquiry', 'Resources/views');

    $this->publishes([
        $sourcePath => $viewPath
    ],'views');

    $this->loadViewsFrom(array_merge(array_map(function ($path) {
        return $path . '/modules/inquiry';
    }, \Config::get('view.paths')), [$sourcePath]), 'inquiry');
  }

  /**
   * Register translations.
   *
   * @return void
   */
  public function registerTranslations(){
    $langPath = resource_path('lang/modules/inquiry');

    if (is_dir($langPath)) {
      $this->loadTranslationsFrom($langPath, 'inquiry');
    } else {
      $this->loadTranslationsFrom(module_path('Inquiry', 'Resources/lang'), 'inquiry');
    }
  }

  /**
   * Register an additional directory of factories.
   *
   * @return void
   */
  public function registerFactories(){
    if (! app()->environment('production') && $this->app->runningInConsole()) {
      app(Factory::class)->load(module_path('Inquiry', 'Database/factories'));
    }
  }

  /**
   * Get the services provided by the provider.
   *
   * @return array
   */
  public function provides(){
    return [];
  }
}
