<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Film;
use App\Models\Booking;

use App\Exports\BookingExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

use PDF;

class BookingController extends Controller
{
    public function index(){
        $bookings=Booking::all()->where('user_id',Auth::user()->id);
        return view('booking',compact(['bookings']));
    }

    public function create(){
        $films=Film::all();
        return view('form_booking',compact(['films']));
    }

    public function store(Request $request){
        Booking::create([
            'name'=>$request->name,
            'date'=>$request->date,
            'film_id'=>$request->film,
            'user_id'=>Auth::user()->id,
            'amount'=>$request->amount
        ]);
        return redirect('booking');
    }

    public function edit($id){
        $edit=Booking::find($id);
        $films=Film::all();
        return view('form_booking',compact(['edit','films']));
    }

    public function update(Request $request,$id){
        $booking=Booking::find($id);

        $booking->name=$request->name;
        $booking->date=$request->date;
        $booking->film_id=$request->film;
        $booking->amount=$request->amount;
        $booking->save();

        return redirect('booking');
    }

    public function delete($id){
        $booking=Booking::find($id);

        $booking->delete();

        return redirect('booking');
    }

    public function export_excel(){
        return Excel::download(new BookingExport, 'booking.xlsx');
    }

    public function export_pdf (){
        $bookings = Booking::all()->where('user_id',Auth::user()->id);

    	$pdf = PDF::loadview('exports.booking',['bookings'=>$bookings]);
    	return $pdf->download('recap-booking-pdf.pdf');
    }
}
