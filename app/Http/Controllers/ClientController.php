<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
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
    public function create(Project $project)
    {
        return view('clients.create', ['project' => $project]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'min:3'],
            'phone_number' => ['required', 'min:9'],
        ]);


        $client = Client::create([
            'name' => $validated['name'],
            'phone_number' => $validated['phone_number'],
            'project_id' => $request->project_id,
            'user_id' => Auth::id(),
        ]);


        return redirect()->route('projects.clients.show', ['project' => $request->project_id, 'client' => $client->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project, Client $client)
    {

        return view('clients.show', ['client' => $client, 'project' => $project]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project, Client $client)
    {
        return view('clients.edit', ['project' => $project, 'client' => $client]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        $validated = $request->validate([
            'name' => ['required', 'min:3'],
            'phone_number' => ['required', 'min:9'],
        ]);

        $client->update([
            'name' => $validated['name'],
            'phone_number' => $validated['phone_number'],
        ]);

        return redirect()->route('projects.clients.show', ['project' => $request->project_id, 'client' => $client->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project, Client $client)
    {
        $client->delete();
        return redirect()->route('projects.show', ['project' => $project->id]);
    }
}
