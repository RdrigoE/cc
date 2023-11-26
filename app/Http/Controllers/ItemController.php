<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Item;
use App\Models\Project;
use Illuminate\Http\Request;

class ItemController extends Controller
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
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => "required|min:1",
            'unit_price' => "required|numeric",
            'quantity' => "required|numeric",
        ]);


        $item = Item::create([
            'name' => $validated['name'],
            'unit_price' => $validated['unit_price'],
            'quantity' => $validated['quantity'],
            'client_id' => $request->client_id,
        ]);

        return redirect()->route('projects.clients.show', ['project' => $request->project_id, 'client' => $request->client_id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project, Client $client, Item $item)
    {
        return view('items.edit', ['item' => $item, 'client' => $client, 'project' => $project]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project, Client $client, Item $item)
    {
        $validated = $request->validate([
            'name' => ['required', 'min:1'],
            'unit_price' => ['required', 'numeric'],
            'quantity' => ['required', 'numeric'],
        ]);
        $item->update([
            'name' => $validated['name'],
            'unit_price' => $validated['unit_price'],
            'quantity' => $validated['quantity'],
        ]);
        return redirect()->route('projects.clients.show', ['project' => $item->client->project_id, 'client' => $item->client_id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project, Client $client, Item $item)
    {
        $item->delete();
        return redirect()->route('projects.clients.show', ['project' => $item->client->project_id, 'client' => $item->client_id]);
    }
}
