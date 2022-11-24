<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BMIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('bmi');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //hitung bmi
        $a = new konsultasi($request->tb, $request->bb);
        $data = [
            'bmi' => $a->bmi(),
            'statusbb' => $a->statusbb(),
            'resultkonsul' => $a->resultkonsul(),
        ];
        return view('layouts/bmi', compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

class Hitung
{
    public function __construct($tb, $bb)
    {
        $this->tb = $tb / 100;
        $this->bb = $bb;
    }

    public function bmi()
    {
        return $this->bb / ($this->tb * $this->tb);
    }
}

class Konsultasi extends Hitung
{
    public function statusbb()
    {
        $dbmi = $this->bmi();
        if ($dbmi < 18.5) {
            return 'kurus';
        } elseif ($dbmi >= 18.5 && $dbmi <= 22.9) {
            return 'Normal';
        } elseif ($dbmi > 22.9 && $dbmi <= 29.9) {
            return 'Gemuk';
        } elseif ($dbmi > 30) {
            return 'Obesitas';
        } else {
            return 'tidak terdaftar';
        }
    }

    public function hitungumur(){

    }

    public function resultkonsul()
    {
        $dkonsul = $this->statusbb();
        if ($dkonsul == 'Obesitas') {
            return 'Anda bisa mendapatkan Konsultasi gratis';
        } else {
            return 'Anda tidak bisa mendapatkan Konsultasi gratis';
        }
    }
}
