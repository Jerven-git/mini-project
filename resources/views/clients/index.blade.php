<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Management</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen py-10 px-4">
    <div class="max-w-3xl mx-auto">
        <h1 class="text-3xl font-bold mb-6">Client Management</h1>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">{{ session('success') }}</div>
        @endif

        @if($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-white p-6 rounded shadow mb-6">
            <h2 class="text-xl font-semibold mb-4">Add New Client</h2>
            <form action="{{ route('clients.store') }}" method="POST" class="flex flex-wrap gap-3 items-end">
                @csrf
                <input type="text" name="name" placeholder="Name" value="{{ old('name') }}" required
                    class="border rounded px-3 py-2 flex-1 min-w-37.5">
                <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required
                    class="border rounded px-3 py-2 flex-1 min-w-37.5">
                <select name="status" required class="border rounded px-3 py-2">
                    <option value="">-- Status --</option>
                    <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Add Client</button>
            </form>
        </div>

        <div class="bg-white p-6 rounded shadow">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-semibold">Client List</h2>
                <form action="{{ route('clients.index') }}" method="GET">
                    <select name="status" onchange="this.form.submit()" class="border rounded px-3 py-2">
                        <option value="">All Status</option>
                        <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </form>
            </div>

            <table class="w-full text-left">
                <thead>
                    <tr class="border-b bg-gray-50">
                        <th class="py-3 px-4">Name</th>
                        <th class="py-3 px-4">Email</th>
                        <th class="py-3 px-4">Status</th>
                        <th class="py-3 px-4">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($clients as $client)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-3 px-4">{{ $client->name }}</td>
                            <td class="py-3 px-4">{{ $client->email }}</td>
                            <td class="py-3 px-4">
                                <span class="px-2 py-1 rounded text-sm {{ $client->status == 'active' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                    {{ ucfirst($client->status) }}
                                </span>
                            </td>
                            <td class="py-3 px-4">
                                <form action="{{ route('clients.destroy', $client->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded text-sm hover:bg-red-600" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="py-6 text-center text-gray-500">No clients found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
