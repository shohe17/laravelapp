<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CreatMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    //1はreqest情報を管理するインスタンス取得、2でclosureクラスのインスタンスを取得
    public function handle($request, Closure $next)
    {
        //ミドルウェアからのレスポンスが$responseに代入される
        $response = $next($request);
        //左に requestのcontentを代入
        // responseのcontentメソッドでresponseに設定されてるcontentが取得できる
        $content = $response->content();

        // patternのテキストをreplaceのテキストに置き換える
        $pattern = '/<middleware>(.*)<\/middleware>/i';
        $replace = '<a href="http://$1">$1</a>';
        $content = preg_replace($pattern, $replace, $content);
        // レスポンスのコンテンツ設定を実行
        $response->setContent($content);
        // responseをhandleが実行された場所に返す
        return $response;
    }
}
