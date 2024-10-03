<?php

namespace App\Http\Controllers;

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
            return Ticket::all();
        } else {
            $tickets = Ticket::where('user_id', auth()->user()->id)->get();
        }

        return response()->json($tickets, Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Ticket $ticket)
    {
        $ticket = Ticket::create([
            'user_id' => auth()->user()->id,
            'departament_id' => $request->departament_id,
            'title' => $request->title,
            'observation' => $request->observation,
            'status' => 'open',
        ]);

        return response()->json(['message' => 'Chamado aberto com sucesso!', 'ticket' => $ticket], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        if (auth()->user()->id !== $ticket->user_id && auth()->user()->role !== 'admin') {
            return response()->json(['message' => 'Você não tem permissão para visualizar este ticket'], Response::HTTP_FORBIDDEN);
        }

        return response()->json(['ticket' => $ticket], Response::HTTP_OK);
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

        return response()->json(['message' => 'Chamado atualizado com sucesso!', 'ticket' => $ticket], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {

    }
}
