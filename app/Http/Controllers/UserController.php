<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = User::get();
        return view('administrator.pengguna.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Tambah User";
        return view('administrator.pengguna.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'usertype' => $request->usertype,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->to('administrator/pengguna/index')->with('message', 'Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $edit = User::find($id);
        $title = "Edit Data" . $edit->name;
        return view('administrator.pengguna.edit', compact('edit', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $edit = User::find($id);
        $title = "Edit Data" . $edit->name;
        return view('administrator.pengguna.edit', compact('edit', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $edit = User::find($id);
        if ($request->password) {
            $password = Hash::make($request->password);
        } else {
            $password = $edit->password;
        }

        User::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'usertype' =>$request->usertype,
            'password' => $password,
        ]);

        return redirect()->to('pengguna')->with('message', 'User berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::where('id', $id)->delete();
        return redirect()->to('pengguna')->with('message', 'Data berhasil dihapus');
    }
}
