<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EdulevelController extends Controller
{
    public function data()
    {
        $edulevels = DB::table('edulevels')->get();

        // untuk mengembalikan nilai
        // return $edulevels;
        // atau juga bisa di tampilkan dengan lebih detail dengan menggunakan dd
        // dd($edulevels);

        // menggunakan seperti array assosiatif
        // return view('edulevel.data', ['edulevels' => $edulevels]);
        // bisa juga menggunakan compact dengam syarat yang di lempar harus sama ['edulevels' => $edulevels]); ini harus sama
        // return view('edulevel.data', compact('edulevels'));
        // selain compact kita juga bisa memakai with
        return view('edulevel.data')->with('edulevels', $edulevels);
    }

    public function add()
    {
        return view('edulevel.add'); //maksud dari ('edulevel.add') adalah kita masuk ke bagian resourve folder edulevel lalu file add.blade.php
    }

    //add
    public function addProcess(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2|max:225',
            'desc' => 'required',
        ],
            [
                'name.required' => 'Nama tidak boleh kosong',
                'desc.required' => 'Deskripsi tidak boleh kosong',
            ]);

        DB::table('edulevels')->insert([
            'name' => $request->name,
            'desc' => $request->desc,
        ]);
        return redirect('edulevels')->with('status', 'Jenjang berhasil ditambah');
    }

    //edit
    public function edit($id)
    {
        $edulevel = DB::table('edulevels')->where('id', $id)->first();
        return view('edulevel/edit', compact('edulevel'));
    }

    public function editProcess(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:2|max:255',
            'desc' => 'required',
        ],
            [
                'name.required' => 'Nama tidak boleh kosong',
                'desc.required' => 'Deskripsi tidak boleh kosong',
            ]);

        DB::table('edulevels')->where('id', $id)
            ->update(
                [
                    'name' => $request->name,
                    'desc' => $request->desc,
                ]
            );
        return redirect('edulevels')->with('status', 'Jenjang berhasil diupdate!');
    }

    // delete
    public function delete($id)
    {
        DB::table('edulevels')->where('id', $id)->delete();
        return redirect('edulevels')->with('status', 'Jenjang berhasil dihapus!');
        // return 'delete';
    }
}