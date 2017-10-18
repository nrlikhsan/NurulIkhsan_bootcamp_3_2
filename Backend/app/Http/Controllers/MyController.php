<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
use App\Transaction;

class MyController extends Controller
{
    
function BookingRoom(Request $req){
        DB::beginTransaction();
        try{
            $this->validate($req, [
                'customerId' => 'required',
                'roomId' => 'required',
                'checkIn' => 'required',
                'checkOut' => 'required',
                'transaction' => 'required'
            ]);
            $roomId = $req->input('room_id');
            $book = new Transaction;
            $book->customer_id = $req->input('customer_id');
            $book->room_id = $roomId;
            $book->check_in_date = $req->input('check_in_date');
            $book->check_out_date = $req->input('check_out_date');
            $book->payment = $req->input('payment');
            $book->status = "booked";
            $book->save();
            DB::table('rooms')
            ->where('id', $roomId)
            ->update(['availability' => false]);
            DB::commit();
            return response()->json(['message'=>'Success'], 200);
        

}
        catch(\Exception $e){
            DB::rollback();
            return response()->json(['message'=>'Failed to book, exception:' + $e], 500);
        }
    }
}