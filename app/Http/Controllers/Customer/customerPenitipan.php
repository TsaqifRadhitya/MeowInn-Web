<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class customerPenitipan extends Controller
{
    public function index()
    {
        return view('pages.customer.Penitipan.customerDaftarPenitipan');
    }

    public function create(){
        return view('pages.customer.Penitipan.customerPenitipanCreate');
    }
    public function update(){
        return view('pages.customer.Penitipan.customerPenitipanCreate');
    }

    public function show($id)
    {
        return view('pages.customer.Penitipan.customerDetailPenitipan');
    }

    public function riwayat($id)
    {
        return view('pages.customer.Penitipan.customerDaftarRiwayatPenitipan');
    }
}
