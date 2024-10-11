<?php

namespace App\Providers;


use Illuminate\Http\Response;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {


        Response::macro('success', function ($data,$message,$status_code=200) {
            return response()->json([
                'message' => $message,
                'data' => $data,
            ], $status_code);
        });

        Response::macro('error', function ($error,$message,$status_code=400) {
            return response()->json([
                'message' => $message,
                'error' => $error,
            ], $status_code);
        });

    }
}
