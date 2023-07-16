<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\listItem;

class TodoListController extends Controller
{
    public function saveItem(Request $request)
{
    // dd($request->listtag);
    if ($request->isMethod('post')) {
        $listItem = new listItem;
        $listItem->name = $request->listtag;
        $listItem->is_complete = 0;
        $listItem->save();
        return view('welcome');
    }
}

}
