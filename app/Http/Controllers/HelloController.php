<?php
//クラスを階層的に整理するための仕組み
namespace App\Http\Controllers;
//クラスのインポート
use Illuminate\Http\Request;

class HelloController extends Controller
{
  public function index($id = 'shosho', $pass = 1234)
  {
    $html = <<<EOF
<html>
<body>
<h2>以下は渡されている必須パラメーター</h2>
<h2>{$id}</h2>
<h2>{$pass}</h2>
</body>
</html>
EOF;
 return $html;
  }
}
