<?php

namespace App\Http\Controllers;

use App\Models\Books;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;


class HomePageController extends Controller{
    public function index(){
        $books = Books::where('quantity', '>', 0)->where('status','=','approved')->latest()->get();
        return view('user', ['books'=>$books]);
    }

    public function rent($id){
        $book = Books::findOrFail($id);
        $quantity = $book->quantity;
        $quantity -= 1;
        $book->update(["quantity"=>$quantity]);
        return back()->with("success", "Rented");
    }
}
