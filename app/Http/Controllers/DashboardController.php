<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //displayed for owners
    public function listOfBooks()
    {
        $currentDate = time();
        $customFormat = date('l, F jS, Y', $currentDate);
        $id = Auth::user()->id;

        $books = Books::where('status', '=', 'approved')->where('user_id', '=', $id)->latest()->get();
        return view('dashboard.ownerDashboard', ['books' => $books, 'date' => $customFormat]);
    }

    public function adminDashboard()
    {
        $currentDate = time();
        $customFormat = date('l, F jS, Y', $currentDate);
        $users = User::where('status', '=', 'approved')->latest()->get();

        return view('dashboard.adminDashboard', ['users' => $users, 'date' => $customFormat]);
    }

    public function deleteUser($id)
    {
        User::destroy($id);
        return back();
    }

    public function listAllUsers()
    {
        $users = User::where('privilage', '=', 'owner')->latest()->get();
        return view('Dashboard.adminUsersList', ['users' => $users]);
    }

    //approving users
    public function userApproval($id)
    {
        $user = User::findOrFail($id);
        $user->update(['status' => 'approved']);
        return back();
    }

    //taking users approval
    public function userDeny($id)
    {
        $user = User::findOrFail($id);
        $user->update(['status' => 'not approved']);
        return back();
    }

    //all books list
    public function listAllBooks()
    {
        $books = Books::latest()->get();
        return view('Dashboard.adminBooksList', ['books' => $books]);
    }

    //approving books
    public function bookApproval($id)
    {
        $book = Books::findOrFail($id);
        $book->update(['status' => 'approved']);
        return back();
    }

    //taking users approval
    public function bookDeny($id)
    {
        $book = Books::findOrFail($id);
        $book->update(['status' => 'not approved']);
        return back();
    }

    public function deleteBook($id)
    {
        Books::destroy($id);
        return back();
    }
}
