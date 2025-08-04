<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user.user', [
            'title' => 'KKJSO - User', 
            'titleHeader' => 'User',
            'user' => User::Filter(request(['search']))->latest()->paginate(5)->withQueryString(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.user_create', [
            'title' => 'KKJSO - Customer Create',
            'titleHeader' => 'Customer Create',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8|max:50',
            'phone' => ['required','regex:/^(\+62|62|08)[0-9]{8,13}$/',],
            'level' => 'required'
        ]);
        $validatedData['status'] = 1;
        $validatedData['name'] = strtoupper($validatedData['name']);
        User::create($validatedData);
        return redirect('/user')->with('success', 'New User Created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $usr = User::findOrFail($id);

        // dd($cst->CstCode);
        return view('user.user_edit', [
            'title' => 'KKJSO - User Edit',
            'titleHeader' => 'User Edit',
            'usr' => $usr
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $usr)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:100',
            // 'email' => 'required|email:dns|unique:users',
            // 'password' => 'required|min:8|max:50',
            'phone' => ['required','regex:/^(\+62|62|08)[0-9]{8,13}$/',],
            'level' => 'required',
            'status' => 'required',
        ]);
        User::where('id', $usr->id)->update($validatedData);
        return redirect('/user')->with('success', 'User Updated!');
    }

    public function delete($id)
    {
        $usr = User::findOrFail($id);
        // dd($usr->usrCode);
        return view('user.user_delete', [
            'title' => 'KKJSO - User Delete',
            'titleHeader' => 'User Delete',
            'usr' => $usr
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $usr = User::findOrFail($id);
        $usr->delete();
        return redirect('/user')->with('success', 'User Deleted!');
    }
}
