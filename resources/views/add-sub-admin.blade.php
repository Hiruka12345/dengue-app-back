<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Sub-Admin</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="bg-gray-900 text-white">
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-semibold mb-4">Add Sub-Admin</h1>
    @if(session('success'))
        <div class="bg-green-500 text-white p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{ route('addSubAdmin') }}" method="POST">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-300">Name</label>
                <input type="text" id="name" name="name" class="mt-1 block w-full bg-gray-700 text-white border-gray-600 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" required>
            </div>
            <div>
                <label for="email" class="block text-sm font-medium text-gray-300">Email</label>
                <input type="email" id="email" name="email" class="mt-1 block w-full bg-gray-700 text-white border-gray-600 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" required>
            </div>
            <div>
                <label for="location" class="block text-sm font-medium text-gray-300">Location</label>
                <input type="text" id="location" name="location" class="mt-1 block w-full bg-gray-700 text-white border-gray-600 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" required>
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-gray-300">Password</label>
                <input type="password" id="password" name="password" class="mt-1 block w-full bg-gray-700 text-white border-gray-600 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" required>
            </div>
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-300">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="mt-1 block w-full bg-gray-700 text-white border-gray-600 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" required>
            </div>
            <div class="md:col-span-2">
                <label for="permissions" class="block text-sm font-medium text-gray-300">Permissions</label>
                <select id="permissions" name="permissions" class="mt-1 block w-full bg-gray-700 text-white border-gray-600 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" multiple>
                    <option value="view_reports">View Reports</option>
                    <option value="manage_cases">Manage Cases</option>
                    <option value="edit_settings">Edit Settings</option>
                    <option value="view_users">View Users</option>
                </select>
            </div>
            <div class="md:col-span-2 text-right">
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md shadow-sm hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-500 focus:ring-opacity-50">Add Sub-Admin</button>
            </div>
        </div>
    </form>
</div>
</body>
</html>
