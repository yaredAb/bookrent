<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id = Auth::user()->id;
        $books = Books::latest()->where('user_id', $id)->get();
        return view('dashboard.book_list', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $id = Auth::user()->id;
        $user = User::findOrFail($id);
        $userStat = $user->status;
        // dd($userStat);
        return view('dashboard.create', ['status'=> $userStat]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Validation
        $validatedData = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'quantity' => 'required|numeric|gt:0',
            'category' => 'required',
            'price' => 'required',
            'cover' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        try {
            $path = null;
            if ($request->hasFile('cover')) {
                $path = Storage::disk('public')->put('BookImg', $request->cover);
            }
            $validatedData['cover']=$path;
            $validatedData['status'] = 'not approved';

            //books() is not an error
            Auth::user()->books()->create($validatedData);
            return redirect()->route('book-list');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error uploading image: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Books $books)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $book = Books::findOrFail($id);
        return view('dashboard.book_edit', ['book'=> $book]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $books = Books::findOrFail($id);
        $imageName = $books->cover;
        $bookValidate = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'quantity' => 'required',
            'category' => 'required',
            'price' => 'required',
            'cover' => 'image|max:2048'
        ]);
            if($request->cover){
                $imageName = $books->id . "." . $request->file('cover')->extension();
                Storage::disk('public')->delete($imageName);
                Storage::disk('public')->put(
                    $imageName,
                    file_get_contents($request->file('cover')->getRealPath())
                );
            }

            $books->update(['cover'=>$imageName,...$bookValidate]);

            return redirect('/book_list')->with('success', 'your book was updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $books = Books::findOrFail($id);
        Storage::disk('public')->delete($books->id);
        Books::destroy($id);
        return back();
    }
}
