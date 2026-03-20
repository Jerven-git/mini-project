<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Repositories\ClientRepository;

class ClientController extends Controller
{
    protected $clientRepository;

    public function __construct(ClientRepository $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }

    public function index(Request $request)
    {
        $clients = $this->clientRepository->index($request->status);

        return view('clients.index', compact('clients'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:clients,email',
            'status' => 'required|in:active,inactive'
        ]);

        $this->clientRepository->create($validatedData);

        return redirect()->route('clients.index')->with('success', 'Client added successfully.');
    }
    
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:clients,email,' . $id, //preventing to fail unique validation when updating the same record
            'status' => 'required|in:active,inactive'
        ]);

        $client = Client::findOrFail($id);
        $this->clientRepository->update($client, $validatedData);

        return redirect()->route('clients.index')->with('success', 'Client updated successfully.');
    }

    public function destroy($id)
    {
        $this->clientRepository->delete($id);

        return redirect()->route('clients.index')->with('success', 'Client deleted successfully.');
    }
}
