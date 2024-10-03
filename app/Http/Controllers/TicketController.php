<?php

namespace App\Http\Controllers;

use App\Http\Resources\TicketResource;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->role == 'admin') {
            $tickets = Ticket::all();
        } else {
            $tickets = Ticket::where('user_id', auth()->user()->id)->get();
        }

        return TicketResource::collection($tickets);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ticket = Ticket::create([
            'user_id' => auth()->user()->id,
            'departament_id' => $request->departament_id,
            'title' => $request->title,
            'observation' => $request->observation,
            'status' => 'open',
        ]);

        return  new TicketResource($ticket);
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        if (auth()->user()->id !== $ticket->user_id && auth()->user()->role !== 'admin') {
            return response()->json(['message' => 'Você não tem permissão para visualizar este ticket'], Response::HTTP_FORBIDDEN);
        }

        return  new TicketResource($ticket);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ticket $ticket)
    {
        if (auth()->user()->id !== $ticket->user_id && auth()->user()->role !== 'admin') {
            return response()->json(['message' => 'Você não tem permissão para atualizar este ticket'], Response::HTTP_FORBIDDEN);
        }

        $ticket->update($request->all());

        return  new TicketResource($ticket);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {

    }
}
