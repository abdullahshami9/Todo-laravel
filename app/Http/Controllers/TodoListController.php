<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\listItem;

class TodoListController extends Controller
{
    public function index(){
        // return all values
        // return view('welcome',['listitems' => listItem::all() ]);
        
        // return only conditional statements
        return view('welcome',['listitems' => listItem::where('is_complete',0)->get() ]);
    }

    public function markComplete($id){
        $li = listItem::find($id);
        $li->is_complete = 1;
        $li->save();
        return redirect('/');
    }

    public function markDelete($id){
        $li = listItem::find($id);
        $li->delete();
        return redirect('/');
    }

    public function saveItem(Request $request)
{
    // dd($request->listtag);
    if ($request->isMethod('post')) {
        $listItem = new listItem;
        $listItem->name = $request->listtag;
        $listItem->is_complete = 0;
        $listItem->save();

        return redirect('/');
    }
}

}
