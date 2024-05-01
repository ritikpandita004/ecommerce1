<?php

namespace App\Http\Controllers;
use App\Models\Shipment;
use Illuminate\Http\Request;

class ShipmentShow extends Controller
{
    public function shipmentShowToUser(){

        $shipementDetails = Shipment::all();
        
        return view('users/orders',compact('shipementDetails'));

    }
}
