<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreShortLinksRequest;
use App\Http\Requests\UpdateShortLinksRequest;
use App\Models\ShortLinks;

class ShortLinksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreShortLinksRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ShortLinks $shortLinks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ShortLinks $shortLinks)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateShortLinksRequest $request, ShortLinks $shortLinks)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ShortLinks $shortLinks)
    {
        //
    }
}
