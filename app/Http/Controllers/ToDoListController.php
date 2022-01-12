<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ListItem; //model

class ToDoListController extends Controller
{
    public function index(){
        return view('home', ['listItems' => ListItem::where('is_complete', 0)->get()]);
    }

    public function markComplete($id){
        $listitem = ListItem::find($id);
        $listitem->is_complete = 1;
        $listitem->save();
        return redirect('/home');
    }

    public function saveItem(Request $request){
        $newListItem = new ListItem;
        $newListItem->name = $request->listItem;
        $newListItem->is_complete = 0;
        $newListItem->save();
        return redirect('/home');
    }

    public function deleteItem($id){
        $listitem = ListItem::find($id);
        $listitem->delete();
        return redirect('/home');
    }

    public function updateItem(Request $request){
        $id = $request->id;
        $listitem = ListItem::find($id);
        $listitem->name = $request->listItemUpdate;
        $listitem->save();
        return redirect('/home');
    }

}
