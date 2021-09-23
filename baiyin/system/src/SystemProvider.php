<?php
/**
 * Created by 百映.
 * @author : 屈靖文
 * @date : 2021/5/20
 * @time : 9:47
 */
namespace baiyin\system;
use Illuminate\Support\ServiceProvider;

class SystemProvider extends ServiceProvider
{
    public function boot()
    {
        // 发布配置文件
        $this->publishes([
            __DIR__.'/config/avatar.php' => config_path('system.php'),
        ]);
    }
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('system', function ($app) {
            return new System($app['config']);
        });
    }
}




