<?php

namespace App\Http\Controllers;

use App\Button;
use Illuminate\Http\Request;

class ButtonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $x = Button::all();
//$x = Button::select('button_id');
        return response()->json($x, 200);
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Button $button
     * @return \Illuminate\Http\Response
     */
    public function show(Button $button)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Button $button
     * @return \Illuminate\Http\Response
     */
    public function edit(Button $button)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Button $button
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Button $button)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Button $button
     * @return \Illuminate\Http\Response
     */
    public function destroy(Button $button)
    {
        //
    }
}
