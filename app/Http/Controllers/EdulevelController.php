<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EdulevelController extends Controller
{
    public function data()
    {
        $edulevels = DB::table('edulavels')->get();
        //dd ($edulevels);
        //return $edulevels;
        return view('edulevel.data', ['edulavels'=>$edulevels]);
    }

    public function add()
    {
        return view('edulevel.add');
    }

    public function addProcess(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2',
            'desc' => 'required',
        ]);

        DB::table('edulavels')->insert([
            'name' => $request->name, 
            'desc' => $request->desc
        ], [
            'name.required' => 'Nama Jenjang tidak boleh kosong'
        ]);
        return redirect('edulevels')->with('status', 'Jenjang Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $edulevel = DB::table('edulavels')->where('id', $id)->first();
        //dd($edulevel);
        return view('edulevel/edit', compact('edulevel'));
    }

    public function editProcess(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:2',
            'desc' => 'required',
        ]);
        DB::table('edulavels')->where('id', $id)
            ->update([
                'name' => $request->name, 
                'desc' => $request->desc
            ]);
            return redirect('edulevels')->with('status', 'Edit Jenjang Berhasil');
    }

    public function delete($id)
    {
        DB::table('edulavels')->where('id',$id)->delete();
        return redirect('edulevels')->with('status', 'Delete Jenjang Berhasil');
    }
}
