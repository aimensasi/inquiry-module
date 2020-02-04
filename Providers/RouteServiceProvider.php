<?php

namespace Modules\Inquiry\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider{

	/**
   * The module namespace to assume when generating URLs to actions for Browser.
   *
   * @var string
   */
  protected $browser_moduleNamespace = 'Modules\Inquiry\Http\Controllers\Browser';

	/**
   * The module namespace to assume when generating URLs to actions for API.
   *
   * @var string
   */
  protected $api_moduleNamespace = 'Modules\Inquiry\Http\Controllers\API';

  /**
   * Called before routes are registered.
   *
   * Register any model bindings or pattern based filters.
   *
   * @return void
   */
  public function boot(){
    parent::boot();
  }

  /**
   * Define the routes for the application.
   *
   * @return void
   */
  public function map(){
    $this->mapApiRoutes();
    $this->mapWebRoutes();
  }

  /**
   * Define the "web" routes for the application.
   *
   * These routes all receive session state, CSRF protection, etc.
   *
   * @return void
   */
  protected function mapWebRoutes(){
    Route::middleware('web')
			->domain($this->domain("admin"))
			->name('admin.')
      ->namespace($this->browser_moduleNamespace)
      ->group(module_path('Inquiry', '/Routes/web.php'));
  }

  /**
   * Define the "api" routes for the application.
   *
   * These routes are typically stateless.
   *
   * @return void
   */
  protected function mapApiRoutes(){
    Route::prefix('api')
      ->middleware('api')
      ->namespace($this->api_moduleNamespace)
      ->group(module_path('Inquiry', '/Routes/api.php'));
  }

	private function domain(string $subdomain = ''){
		if (strlen($subdomain) > 0) {
			$subdomain = "{$subdomain}.";
		}

		return config('app.domain_prefix') . $subdomain . config('app.domain');
	}
}
