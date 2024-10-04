<?php

namespace App\Http\Controllers;

use App\Http\Requests\TicketStoreRequest;
use App\Http\Requests\TicketUpdateRequest;
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
        if ($this->authorize('viewAny', Ticket::class)) {
            $tickets = Ticket::all();
        } else {
            $tickets = Ticket::where('user_id', auth()->user()->id)->get();
        }

        return TicketResource::collection($tickets);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TicketStoreRequest $request, Ticket $ticket)
    {

        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        $data['status'] = 'open';

        $result = $ticket->create($data);

        return  new TicketResource($result);
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        $this->authorize('view', $ticket);

        return  new TicketResource($ticket);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TicketUpdateRequest $request, Ticket $ticket)
    {
        $this->authorize('update', $ticket);

        $ticket->update($request->validated());

        return  new TicketResource($ticket);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {

    }
}
