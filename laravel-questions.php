<?php

/**
 * Laravel Assessment Questions
 * Answer each question by writing actual Laravel code below.
 */

// ============================================================
// Question 1 — Eloquent Query
// ============================================================
// Write an Eloquent query to get all users whose status is 'active',
// ordered by created_at in descending order.
// Expected Output: Only the query code snippet.

// Answer:

// $usersActive = User::where('status', 'active')
//     ->orderBy('created_at', 'desc')
//     ->get();

// ============================================================
// Question 2 — Routing
// ============================================================
// Write a Laravel route in web.php that points /dashboard to
// DashboardController@index and is only accessible to authenticated users.
// Bonus: Mention which middleware you used and why.

// Answer:

// use App\Http\Controllers\DashboardController;

// Route::get('/dashboard', [DashboardController::class, 'index'])
//     ->middleware('auth');

// Bonus: I used the 'auth' middleware because it checks if the user is authenticated
// before allowing access to the route. If the user is not logged in, they will be
// redirected to the login page. This ensures that only authenticated users can
// access the /dashboard route.

// ============================================================
// Question 3 — Controller Function
// ============================================================
// Create a controller method called storeClientDetails() that:
//
// - Accepts a Request with the following fields:
//     - name → required, max 255 characters
//     - email → required, valid email format, unique in the clients table
//     - status → required, must be 'active' or 'inactive'
//
// - Uses a repository to save the client in the clients table.
//
// - Returns a JSON response with:
//   {
//     "status": "success",
//     "client": { ...client_data_here... }
//   }
//
// Hint: Implement a ClientRepository class with a create($data) method
// for saving the record.

// Answer:

// ClientController.php
// namespace App\Http\Controllers;

// use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
// use App\Repositories\ClientRepository;

// class ClientController extends Controller
// {
//     protected $clientRepository;

//     public function __construct(ClientRepository $clientRepository)
//     {
//         $this->clientRepository = $clientRepository;
//     }

//     public function storeClient(Request $request)
//     {
//         $validatedData = $request->validate([
//             'name' => 'required|max:255',
//             'email' => 'required|email|unique:clients,email',
//             'status' => 'required|in:active,inactive'
//         ]);

//         $client = $this->clientRepository->create($validatedData);

//         return response()->json([
//             'status' => 'success',
//             'client' => $client
//         ]);
//     }
// }

// ClientRepository.php
// namespace App\Repositories;

// use App\Models\Client;

// class ClientRepository
// {
//     public function create($data)
//     {
//         return Client::create($data);
//     }
// }