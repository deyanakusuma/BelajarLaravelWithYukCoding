<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Edulavel;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$programs = Program::all();
        $programs = Program::withTrashed()->get(); //menampilkan data softdelete dan tidak dihapus
        //return $programs;
        return view('program/index', compact('programs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $edulavels = Edulavel::all();
        return view('program/create', compact('edulavels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'edulevel_id' => 'required',
        ]);
        //return $request;

        //cara 1
        //$program = new Program;
        //$program->name = $request->name;
        //$program->edulevel_id = $request->edulevel_id;
        //$program->student_price = $request->student_price;
        //$program->student_max = $request->student_max;
        //$program->info = $request->info;
        //$program->save();

        //cara 2 : mass assigment
        //Program::create([
        //    'name' => $request->name,
        //    'edulevel_id' => $request->edulevel_id,
        //    'student_price' => $request->student_price,
        //    'student_max' => $request->student_max,
        //    'info' => $request->info,
        //]);

        //cara 3 : quick mass assigment -> syarat : field table dan name inputan harus sama
        //Program::create($request->all());

        //cara 4 : gabungan 
        $program = new Program([
            'name' => $request->name,
            'edulevel_id' => $request->edulevel_id,
            'student_price' => $request->student_price,
            'student_max' => $request->student_max,
            'info' => $request->info,
        ]);
        $program->save();

        return redirect('programs')->with('status', 'Program berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function show(Program $program)
    {
        //$program = Program::find($id); pakai parameter $id
        //$program = Program::where('id', $id)->get(); sama saja tp hasil array
        $program->makeHidden('edulevel_id');
        //return $program;
        return view('program/show', compact('program'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function edit(Program $program)
    {
        $edulavels = Edulavel::all();
        return view('program/edit', compact('program','edulavels'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Program $program)
    {
        $request->validate([
            'name' => 'required|min:3',
            'edulevel_id' => 'required',
        ]);
        //return $program;

        //cara 1
        //$program = new Program;
        //$program->name = $request->name;
        //$program->edulevel_id = $request->edulevel_id;
        //$program->student_price = $request->student_price;
        //$program->student_max = $request->student_max;
        //$program->info = $request->info;
        //$program->save();

        //cara 2 : mass assigment
        Program::where('id', $program->id)
          ->update([
                'name' => $request->name,
                'edulevel_id' => $request->edulevel_id,
                'student_price' => $request->student_price,
                'student_max' => $request->student_max,
                'info' => $request->info,
          ]);

        return redirect('programs')->with('status', 'Program berhasil diupdate');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function destroy(Program $program)
    {
        //cara 1
        //$program->delete();

        //cara 2
        //Program::destroy($program->id);

        //cara 3
        Program::where('id', $program->id)->delete();

        return redirect('programs')->with('status', 'Berhasil Dihapus');

    }
}
