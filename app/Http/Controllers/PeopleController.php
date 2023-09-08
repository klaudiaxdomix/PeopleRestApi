<?php

namespace App\Http\Controllers;

use App\Models\People;
use App\Http\Requests\StorePeopleRequest;
use App\Http\Requests\UpdatePeopleRequest;
use Illuminate\Http\Request;

class PeopleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return People::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePeopleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $person = new People($data);
        $person->save();

        return response()->json(['message' => 'Person created successfully', 'data' => $person], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\People  $people
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $person = People::find($id);

        if (!$person) {
            return response()->json(['message' => 'Person not found'], 404);
        }

        return $person;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePeopleRequest  $request
     * @param  \App\Models\People  $people
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $person = People::find($id);

        if (!$person) {
            return response()->json(['message' => 'Person not found'], 404);
        }

        $person->update($data);

        return response()->json(['message' => 'Person updated successfully', 'data' => $person]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\People  $people
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $person = People::find($id);

        if (!$person) {
            return response()->json(['message' => 'Person not found'], 404);
        }

        $person->delete();

        return response()->json(['message' => 'Person deleted successfully']);
    }
}