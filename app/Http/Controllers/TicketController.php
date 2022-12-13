<?php

namespace App\Http\Controllers;


use Auth;
use App\Models\Estudiante;
use App\Models\User;
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
            $ticket->increment("contador");

            // return response()->json($ticket);
            // return view('evento.invitacion', compact('ticket'));
            return view('evento.invi_prueba', compact('ticket'));
        }
        return view('evento.invi_prueba');
    }

    public function qrcreate(Request $request)
    {
        return view('qr.qrcreate');
    }

    public function ticket_entregados(Request $request)
    {
        // dd("asd");
        $tickets = Ticket::where("user_id", Auth::user()->id)->get();
        // dd($tickets);
        return view('ticket.entregados', compact("tickets"));
    }


    public function qrinvitacion(Request $request)
    {
        if ($request->desde > $request->hasta) {
            return "Ingrese bien los números";
        }

        try {
            $tickets = Ticket::all()->where('id','>=',$request->desde)->where('id','<=',$request->hasta);
        } catch (\Throwable $th) {
            return "Fuera de Limite";
        }

        return view('qr.qrpdf', compact('tickets'));
    }

    public function tickets_total()
    {
        $tickets = Ticket::where("estado", "!=", "Libre")->get();
        // dd($tickets);

        // return view('qr.qrpdf', compact('tickets'));
        return response()->json([
            'status' => 'ok',
            'total_tickets' => count($tickets),
        ]);
    }

    public function pagar_ticket(Request $request, $id)
    {
        // dd(Auth::user()->id);
        $ticket = Ticket::find($id);
        $ticket->estado = 'Pagado';
        $ticket->user_id = Auth::user()->id;
        $ticket->save();



        // $name = $request->input('name');
        // $surname = $request->input('surname');
        // $message = "tu nombre es ".$ticket->codigo."y tu apellido es ".$surname."";
        // dd($message);
        // return response()->json($message);
        return back()->withInput();
    }
    public function buscar()
    {
        return view("ticket.buscar");
    }

    public function buscar_ticket(Request $request, $codigo)
    {
        $ticket = Ticket::where('codigo', $codigo)->first();
        if (isset($ticket)) {

            $user_id = User::find($ticket->user_id);
            return response()->json([
                'status' => 'ok',
                'ticket' => $ticket->codigo,
                'estado' => $ticket->estado,
                'estudiante' => isset($ticket->estudiante->nombre) ? $ticket->estudiante->nombre." ".$ticket->estudiante->apellidop." ".$ticket->estudiante->apellidom : "no hay",
                'est_promo22' => isset($user_id->name) ? $user_id->name : "Sin asignar",
            ]);
        }
        return response()->json([
            'status' => 'error',
            'message' => 'Intente con otro ticket',
        ]);
    }

    public function entregar_ticket(Request $request, $id)
    {
        $ticket = Ticket::find($id);
        $ticket->estado = 'Entregado';
        $ticket->user_id = Auth::user()->id;
        $ticket->save();

        // $name = $request->input('name');
        // $surname = $request->input('surname');
        // $message = "tu nombre es ".$ticket->codigo."y tu apellido es ".$surname."";
        // dd($message);
        // return response()->json($message);
        return back()->withInput();
    }
    public function usar_ticket(Request $request, $id)
    {
        $ticket = Ticket::find($id);
        $ticket->estado = 'Usado';
        $ticket->user_id = Auth::user()->id;
        $ticket->save();

        // $name = $request->input('name');
        // $surname = $request->input('surname');
        // $message = "tu nombre es ".$ticket->codigo."y tu apellido es ".$surname."";
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
        // dd($all[0]['estudianteco']['id']);
        $cont=[];
        foreach($all as $s){
            $t=Ticket::find($s['id']);
            $t->estado=$s['estado'];
            if($s['estudianteco']!=''){
                $t->estudiante_id=$s['estudianteco']['id'];
            }

            $t->user_id = Auth::user()->id;
            $t->save();
            $cont[]=$s;
        }
//        $message = "tu nombre es ".$ticket->codigo."y tu apellido es ".$surname."";
        /*$message=$surname[0];*/

        return response()->json($cont);
    }
    public function actualizar_ticket(Request $request,  $id){
        $all = $request->all();
        foreach($all as $s){
            $t=Ticket::find($s['id']);
            $t->estado=$s['estado'];
            /*$t->estudiante_id=$s['estudianteco']['id'];*/
            $t->user_id = Auth::user()->id;
            $t->save();

        }
        return response()->json($all);
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
