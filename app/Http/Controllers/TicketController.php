<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\Ticket;
use Illuminate\Http\Request;
use QrCode;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Crypt;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // $response["dni"] = Crypt::encryptString($query->id);
    // $id = Crypt::decryptString($id);
    public function index()
    {
        //
        $tickets=Ticket::with('estudiante')->get();
        //dd($est->first());
        return view('estudiante.index');
    }

    public function invitacion(Request $request)
    {
        if($request->id){
            $id = Crypt::decryptString($request->id);
            // dd($id);
            $ticket = Ticket::find($id);

            // return response()->json($ticket);
            return view('evento.invitacion', compact('ticket'));
        }
        return view('evento.invi_template');
    }

    public function qrinvitacion(Request $request)
    {
        $tickets = Ticket::all();
        // $id = '2';
        // $enlaces[] = false;
        // // dd($tickets);
        // for ($i=1; $i < 10; $i++) {
        // }

        // $pdf = Pdf::loadView('qr.qrpdf', ['enlace' => $enlace]);
        // return $pdf->stream();

        return view('qr.qrpdf', compact('tickets'));
    }
    public function qrcachibos(Request $request)
    {

        $tickets = Ticket::all();
        // $id = '2';
        // $enlaces[] = false;
        // // dd($tickets);
        // for ($i=1; $i < 10; $i++) {
        // }

        // $pdf = Pdf::loadView('qr.qrpdf', ['enlace' => $enlace]);
        // return $pdf->stream();

        return view('qr.qrpdf', compact('tickets'));
    }

    public function update_ticket(Request $request, $id)
    {
        $ticket = Ticket::find($id);
        $ticket->estado = 'Pagado';
        $ticket->save();

        $name = $request->input('name');
        $surname = $request->input('surname');
        $message = "tu nombre es ".$ticket->codigo."y tu apellido es ".$surname."";
        // dd($message);
        // return response()->json($message);
        return back()->withInput();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $estudiantesT = Ticket::with('estudiante')->get();
        $estudiantes = Estudiante::all();
        $tickets= Ticket::all();

        return view('ticket.create', compact('estudiantes','estudiantesT','tickets'));
    }
    public function obtenerall(){
        $estudiantesT = Ticket::with('estudiante')->get();

        return response()->json($estudiantesT);
    }
    public function obtenerest(){
        $estudiantesT = Estudiante::all();

        return response()->json($estudiantesT);
    }
    public function obtenertick(){
        $estudiantesT = Ticket::all();

        return response()->json($estudiantesT);
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


        $name = $request->input('name');
        $tickets = $request->input('surname');
//        $message = "tu nombre es ".$name."y tu apellido es ".$surname[1]."";
        $message = $tickets;

        return response()->json($message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
       /* $ticket = Ticket::find($id);
        $ticket->estado = 'Pagado';
        $ticket->save();

        $name = $request->input('name');*/
        $surname = $request->input('surname');
        $all = $request->all();
        /*Ticket::find($all[0]['id']);*/
        $cont=[];
        foreach($all as $s){
            $t=Ticket::find($s['id']);
            $t->estado=$s['estado'];
            $t->estudiante_id=$s['estudianteco'];
            $t->save();
            $cont[]=$s;
        }
//        $message = "tu nombre es ".$ticket->codigo."y tu apellido es ".$surname."";
        /*$message=$surname[0];*/

        return response()->json($cont);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}
