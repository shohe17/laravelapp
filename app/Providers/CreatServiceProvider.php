<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class CreatServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // 第一引数でビューコンポーザーを割り当てるビューを選択、2では実行するクラスか処理を書く
        view::composer('posts.creat', 'App\Http\Composer\CreatComposer'
        );
    }
}
