<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pizza;

class PizzaController extends Controller
{
    //
    function showPizza(Request $request){
        $pizza = Pizza::where('name', 'like', "%$request->keyword%")->paginate(6);
        $pizza->appends($request->only('keyword'));
        return view('home', compact('pizza'));
    }

    function showPizzaDetail($id){
        $pizza = Pizza::where('id', '=', $id)->first();
        return view('pizza', compact('pizza'));
    }

    function showAdd(){
        return view('add');
    }

    function showUpdate($id){
        $pizza = Pizza::where('id', '=', $id)->first();
        return view('update', compact('pizza'));
    }

    function showDelete($id){
        $pizza = Pizza::where('id', '=', $id)->first();
        return view('delete', compact('pizza'));
    }

    function addPizza(Request $request){
        $pizza = new Pizza();

        $this->validate($request, [
            'name' => 'required|max:20',
            'description' => 'required|min:20',
            'price' => 'required|integer|min:1000',
            'image' => 'required|image'
        ]);


        $pizza->name = $request->name;
        $pizza->description = $request->description;
        $pizza->price = $request->price;
        $file = $request->file('image');
        if($file != null){
            $contents = $file->openFile()->fread($file->getSize());
            $pizza->image = $contents;
            $pizza->save();
        }

        return redirect('/');
    }
    function updatePizza(Request $request){
        $pizza = Pizza::where('id', '=', $request->id)->first();
        
        $this->validate($request, [
            'name' => 'required|max:20',
            'description' => 'required|min:20',
            'price' => 'required|integer|min:1000',
            'image' => 'required|image'
        ]);

        $pizza->name = $request->name;
        $pizza->description = $request->description;
        $pizza->price = $request->price;
        $file = $request->file('image');
        if($file != null){
            $contents = $file->openFile()->fread($file->getSize());
            $pizza->image = $contents;
            $pizza->save();
        }

        return redirect('/');
    }

    function deletePizza(Request $request){
        Pizza::find($request->id)->delete();

        return redirect('/');
    }

} 
