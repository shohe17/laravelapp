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
    public function handle(Request $request, Closure $next)
    {
        // dataに連想配列の形で値を代入
        $data = [
          ['name' => 'miki', 'mail' => 'mi@mm'],
          ['name' => 'moki', 'mail' => 'mo@mm'],
          ['name' => 'maki', 'mail' => 'ma@mm'],
        ];
        // mergeはフォーム送信などで送られる値に、新たな値を追加するメソッド
        //requestのmerge
        $request->merge(['data' => $data]);
        return $next($request);
    }
}
