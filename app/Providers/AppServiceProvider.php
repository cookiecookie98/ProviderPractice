<?php

namespace App\Providers;

use App\Helpers\ExternalApiHelper;
use Illuminate\Support\ServiceProvider;
use App\Helpers\Logger;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->bind(ExternalApiHelper::class, function()
        {
            return new ExternalApiHelper('Hello new app');
        });


        /*
            Bind a Singleton
            Giống như tên của nó, phương thức bind này khai báo với Laravel rằng khi khởi tạo class này thì chỉ một lần duy nhất,
            những yêu cầu khởi tạo kế tiếp trong cùng một request chỉ trả lại object đã tạo lần đầu.
        */
        $this->app->singleton(Logger::class, function(){
            return new Logger();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
