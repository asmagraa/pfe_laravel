<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tier;
use  App\Http\Resources\TierResource;

class TierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tier = Tier::paginate(10);
        return TierResource::collection($tier);
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
        $tier = new Tier(); 
        $tier->name = $request->name;
        $tier->Surname = $request->surname;
        $tier->email = $request->email;
        $tier->user_id = $request->user_id;
        
        if($tier->save())
        {
            return new TierResource($tier);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tier = Tier::findOrFail($id);
        return new TierResource($tier);
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
        $tier = Tier::findOrFail($id);
        $tier->name = $request->name;
        $tier->Surname = $request->surname;
        $tier->email = $request->email;
        $tier->user_id = $request->user_id;
        
        if($tier->save())
        {
            return new TierResource($tier);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tier = Tier::findOrFail($id);
        if($tier->delete())
        {
            return new TierResource($tier);
        }

    }
}
