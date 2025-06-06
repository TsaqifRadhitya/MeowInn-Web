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

    public function riwayat($id)
    {
        return view('pages.customer.Penitipan.customerDaftarRiwayatPenitipan');
    }

    public function show($id)
    {
        return view('pages.customer.Penitipan.customerDetailPenitipan');
    }

    public function create()
    {
        return view('pages.customer.Penitipan.customerPenitipanCreate');
    }

    public function store($id)
    {

    }

    public function update($id)
    {

    }

    public function destroy($id)
    {

    }
}
