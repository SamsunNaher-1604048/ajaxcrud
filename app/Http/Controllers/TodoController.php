<?php

namespace App\Http\Controllers;
use App\Models\Todo;

use Illuminate\Http\Request;

class TodoController extends Controller
{
    function index(){

        $todos = Todo::orderBy('id','DESC')->get();
        return view('welcome',['todos'=>$todos]);
    }

    function storedata(Request $req){
        $todo = new Todo();
        $todo->name = $req->name;
        $todo->save();
        return response()->json(['success'=>'Form is successfully submitted!']);
    }

    function deletedata($id){

        $todo = Todo::find($id)->first();
        $todo->delete();
        return response()->json(['message'=>'delete data']);
    }
}
