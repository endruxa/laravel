<?php
/**
 * Created by PhpStorm.
 * User: Anatoliy
 * Date: 12.11.17
 * Time: 16:36
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DBController extends Controller
{
    public function insert()
    {
        $data = [
            'slug'=>'Neo',
            'title'=>'today',
            'description'=>'one day',
        ];
        DB::table('articles')->insert($data);
        return view('db.index');
    }
    public function select()
    {
        $data = DB::table('test')
            // ->whereIn('username', ['Neo', 'Neo 3'])
            ->whereNotBetween('age', [30, 40])
            // ->whereColumn('username', 'age')
            ->get();
        \Debugbar::info($data);
        return view('db.index');
    }
}
