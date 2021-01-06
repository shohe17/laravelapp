<?php

namespace Database\Seeders;

use App\Models\Restdata;
use Illuminate\Database\Seeder;

class RestdataTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $param = [
        'message' => 'G J',
        'url' => 'https://www.google.co.jp',
      ];
      $resetdata = new Restdata();
      $resetdata->fill($param)->save();

      $param = [
        'message' => 'YJ',
        'url' => 'https://www.yahoo.co.jp',
      ];
      $resetdata = new Restdata();
      $resetdata->fill($param)->save();
      
      $param = [
        'message' => 'MJ',
        'url' => 'https://www.msn.com/ja-jp',
      ];
      $resetdata = new Restdata();
      $resetdata->fill($param)->save();
    }
}
