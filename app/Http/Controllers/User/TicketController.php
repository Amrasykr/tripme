<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\View;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $reservation = Reservation::where('user_id', auth()->id())->where('status', 'confirmed')->get();
        $pending_reservation = Reservation::where('user_id', auth()->id())->where('status', 'paid and pending')->count();
        $confirmed_reservation = Reservation::where('user_id', auth()->id())->where('status', 'confirmed')->count();
        $finished_reservation = Reservation::where('user_id', auth()->id())->where('status', 'finished')->count();
        return view('user.dashboard.ticket.index', compact('reservation', 'pending_reservation', 'confirmed_reservation', 'finished_reservation'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function download(string $id)
    {
        $reservation = Reservation::findOrFail($id);
    
        // Load view into Dompdf
        $pdf = new Dompdf();
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
        $pdf->setOptions($options);
    
        $view = View::make('user.dashboard.ticket.pdf', compact('reservation'))->render();
        $pdf->loadHtml($view);
    
        // Render PDF (optional: set paper size, orientation and title)
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();
    
        // Download PDF file
        return $pdf->stream('ticket-' . $reservation->id . '.pdf');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
