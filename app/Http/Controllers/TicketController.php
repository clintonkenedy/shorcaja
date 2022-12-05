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
        $ticket = Ticket::find($id);
        $ticket->estado = 'Pagado';
        $ticket->save();

        $name = $request->input('name');
        $surname = $request->input('surname');
        $message = "tu nombre es ".$ticket->codigo."y tu apellido es ".$surname."";
        return response()->json($message);
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
