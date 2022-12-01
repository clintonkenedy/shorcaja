<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\Ticket;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
//        $estudiantes = Estudiante::all();
        $estudiantes = Ticket::with('estudiante')->get();

        return view('estudiante.index', compact('estudiantes'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function show(Estudiante $estudiante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function edit(Estudiante $estudiante)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $est = Estudiante::find($id);
        $name = $request->input('name');
        $surname = $request->input('surname');
        $message = "tu nombre es ".$est->nombre."y tu apellido es ".$surname."";
        return response()->json($message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estudiante $estudiante)
    {
        //
    }
    public function est(){
        $est=Estudiante::all();
        return response()->json($est);
    }
    public function gaa(request $request){
        $name = $request->input('name');
        $surname = $request->input('surname');
        $message = "tu nombre es ".$name."y tu apellido es ".$surname."";
        return response()->json($message);
    }
}
