<?php

namespace App\Repositories;

use App\Models\Client;

class ClientRepository
{
    public function index($status = null)
    {
        if ($status) {
            return Client::where('status', $status)->get();
        }

        return Client::all();
    }

    public function create($data)
    {
        return Client::create($data);
    }

    public function update($client, $data)
    {
        $client->update($data);
        return $client;
    }

    public function delete($id)
    {
        $client = Client::findOrFail($id);
        $client->delete();
    }
}