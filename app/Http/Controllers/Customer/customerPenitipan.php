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

    public function daftarReports($id)
    {
        return view('pages.customer.Penitipan.customerDaftarReportsPenitipan');
    }


    public function detailReports($id)
    {
        return view('pages.customer.Penitipan.customerDetailReportsPenitipan');
    }

    public function detailPenitipan($id)
    {
        return view('pages.customer.Penitipan.customerDetailPenitipan');
    }

    public function riwayatPenitipan($id)
    {
        return view('pages.customer.Penitipan.customerDaftarRiwayatPenitipan');
    }
}
