<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider{
    
    public const HOME = '/dashboard';
    public const STUDENT = '/student/dashboard';
    public const TEACHER = '/teacher/dashboard';
    public const GARDIAN = '/gardian/dashboard';

    public function boot(): void{
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));
                
            Route::middleware('web')
                ->group(base_path('routes/web.php'));
            
            Route::middleware('web')
                ->group(base_path('routes/student.php'));
            
            Route::middleware('web')
                ->group(base_path('routes/gardian.php'));
            
            Route::middleware('web')
                ->group(base_path('routes/teacher.php'));
        });
    }
}