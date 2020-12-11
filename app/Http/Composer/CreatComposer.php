<?php
namespace App\Http\Composer;

use Illuminate\View\View;

class CreatComposer
{
  public function compose(View $view)
  {
    // view_message変数名に、2引数を入れる
    $view->with('view_message', 'this view is "'. $view->getName() . '"!!');
  }
 
}
?>