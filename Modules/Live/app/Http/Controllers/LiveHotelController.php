<?php

namespace Modules\Live\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Live\Models\Hotel;
use Spatie\QueryBuilder\QueryBuilder;

class LiveHotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Collection
    {
        return QueryBuilder::for(Hotel::class)
            ->allowedFilters(['title'])
            ->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('live::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return Hotel::where('id',$id)
            ->with('roomCategories')
            ->first();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('live::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
