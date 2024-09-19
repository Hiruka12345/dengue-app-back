<x-app-layout>
    <div class="min-h-screen bg-gray-900 text-white">
        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                @if(request()->has('case_id') && request('case_id') == '12345')
                    <!-- Detailed View for Case ID 12345 -->
                    <h2 class="text-3xl font-semibold mb-6 flex items-center">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        {{ __('Case Details') }}
                    </h2>
                    <div class="bg-gray-800 rounded-lg shadow-md p-6">
                        <div class="mb-6">
                            <h3 class="text-xl font-semibold mb-2">{{ __('Case ID') }}: 12345</h3>
                            <p class="text-gray-400">{{ __('Location') }}: Downtown Area</p>
                        </div>
                        <div class="mb-6">
                            <h4 class="text-lg font-semibold flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                {{ __('Status') }}: <span class="text-red-400 ml-2">Active</span>
                            </h4>
                        </div>
                        <div class="mb-6">
                            <h4 class="text-lg font-semibold flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-6 16v2m4-2v2m-2-2V5"></path></svg>
                                {{ __('Submitted') }}: <span class="text-gray-400 ml-2">2 hours ago</span>
                            </h4>
                        </div>
                        <div class="mb-6">
                            <h4 class="text-lg font-semibold mb-2">{{ __('Description') }}</h4>
                            <p class="text-gray-400">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus imperdiet, nulla et dictum interdum, nisi lorem egestas odio, vitae scelerisque enim ligula venenatis dolor.</p>
                        </div>
                        <div class="mt-6">
                            <a href="{{ url()->previous() }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md transition duration-300 inline-flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                {{ __('Back to Active Cases') }}
                            </a>
                        </div>
                    </div>

                @elseif(request()->has('case_id') && request('case_id') == '12346')
                    <!-- Detailed View for Case ID 12346 -->
                    <h2 class="text-3xl font-semibold mb-6 flex items-center">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        {{ __('Case Details') }}
                    </h2>
                    <div class="bg-gray-800 rounded-lg shadow-md p-6">
                        <div class="mb-6">
                            <h3 class="text-xl font-semibold mb-2">{{ __('Case ID') }}: 12346</h3>
                            <p class="text-gray-400">{{ __('Location') }}: Suburban Area</p>
                        </div>
                        <div class="mb-6">
                            <h4 class="text-lg font-semibold flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                {{ __('Status') }}: <span class="text-red-400 ml-2">Active</span>
                            </h4>
                        </div>
                        <div class="mb-6">
                            <h4 class="text-lg font-semibold flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-6 16v2m4-2v2m-2-2V5"></path></svg>
                                {{ __('Submitted') }}: <span class="text-gray-400 ml-2">1 day ago</span>
                            </h4>
                        </div>
                        <div class="mb-6">
                            <h4 class="text-lg font-semibold mb-2">{{ __('Description') }}</h4>
                            <p class="text-gray-400">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        </div>
                        <div class="mt-6">
                            <a href="{{ url()->previous() }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md transition duration-300 inline-flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                {{ __('Back to Active Cases') }}
                            </a>
                        </div>
                    </div>

                @else
                    <h2 class="text-3xl font-semibold mb-6 flex items-center">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        {{ __('Active Cases') }}
                    </h2>

                    <!-- Filter and Statistics -->
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
                        <!-- Filter -->
                        <div class="bg-gray-800 rounded-lg shadow-md p-6">
                            <h3 class="text-lg font-semibold mb-4 flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-6 16v2m4-2v2m-2-2V5"></path></svg>
                                {{ __('Filter Active Cases') }}
                            </h3>
                            <form>
                                <div class="mb-4">
                                    <label for="location" class="block text-sm font-medium text-gray-400">{{ __('Location') }}</label>
                                    <input type="text" id="location" name="location" class="block w-full mt-1 bg-gray-700 text-white border-gray-600 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" placeholder="Enter location">
                                </div>
                                <div class="mb-4">
                                    <label for="date" class="block text-sm font-medium text-gray-400">{{ __('Date Range') }}</label>
                                    <input type="date" id="date" name="date" class="block w-full mt-1 bg-gray-700 text-white border-gray-600 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                                </div>
                                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md transition duration-300 inline-flex items-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                                    {{ __('Filter') }}
                                </button>
                            </form>
                        </div>

                        <!-- Statistics -->
                        <div class="bg-gray-800 rounded-lg shadow-md p-6 lg:col-span-2">
                            <h3 class="text-lg font-semibold mb-4 flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M9 16h.01M15 16h.01M9 20h6M4 6h16M4 10h16M4 14h16M4 18h16"></path></svg>
                                {{ __('Statistics') }}
                            </h3>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                <div class="bg-gradient-to-r from-blue-500 to-teal-500 rounded-lg shadow-lg p-6 text-center transform hover:scale-105 transition duration-200">
                                    <h4 class="text-lg font-semibold">Total Active Cases</h4>
                                    <p class="text-4xl font-bold mt-2">567</p>
                                    <span class="text-sm">-12 since last week</span>
                                </div>
                                <div class="bg-gradient-to-r from-green-500 to-lime-500 rounded-lg shadow-lg p-6 text-center transform hover:scale-105 transition duration-200">
                                    <h4 class="text-lg font-semibold">Resolved Cases</h4>
                                    <p class="text-4xl font-bold mt-2">345</p>
                                    <span class="text-sm">+20 since last week</span>
                                </div>
                                <div class="bg-gradient-to-r from-yellow-500 to-orange-500 rounded-lg shadow-lg p-6 text-center transform hover:scale-105 transition duration-200">
                                    <h4 class="text-lg font-semibold">Under Review</h4>
                                    <p class="text-4xl font-bold mt-2">56</p>
                                    <span class="text-sm">+5 since last week</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Active Cases Table -->
                    <div class="bg-gray-800 rounded-lg shadow-md p-6">
                        <h3 class="text-lg font-semibold mb-4 flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            {{ __('Recent Active Cases') }}
                        </h3>
                        <div class="overflow-x-auto">
                            <table class="min-w-full bg-gray-700 text-white">
                                <thead>
                                <tr class="bg-gray-600">
                                    <th class="px-6 py-3 border-b border-gray-600 text-left text-xs leading-4 font-medium uppercase tracking-wider">Case ID</th>
                                    <th class="px-6 py-3 border-b border-gray-600 text-left text-xs leading-4 font-medium uppercase tracking-wider">Location</th>
                                    <th class="px-6 py-3 border-b border-gray-600 text-left text-xs leading-4 font-medium uppercase tracking-wider">Status</th>
                                    <th class="px-6 py-3 border-b border-gray-600 text-left text-xs leading-4 font-medium uppercase tracking-wider">Submitted</th>
                                    <th class="px-6 py-3 border-b border-gray-600 text-left text-xs leading-4 font-medium uppercase tracking-wider">Actions</th>
                                </tr>
                                </thead>
                                <tbody class="bg-gray-700">
                                <tr>
                                    <td class="px-6 py-4 border-b border-gray-600">12345</td>
                                    <td class="px-6 py-4 border-b border-gray-600">Downtown Area</td>
                                    <td class="px-6 py-4 border-b border-gray-600 text-red-400">Active</td>
                                    <td class="px-6 py-4 border-b border-gray-600">2 hours ago</td>
                                    <td class="px-6 py-4 border-b border-gray-600 text-right">
                                        <a href="?case_id=12345" class="text-blue-400 hover:text-blue-600 inline-flex items-center">
                                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12H9m0 0l3 3m-3-3l3-3"></path></svg>
                                            View Details
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 border-b border-gray-600">12346</td>
                                    <td class="px-6 py-4 border-b border-gray-600">Suburban Area</td>
                                    <td class="px-6 py-4 border-b border-gray-600 text-red-400">Active</td>
                                    <td class="px-6 py-4 border-b border-gray-600">1 day ago</td>
                                    <td class="px-6 py-4 border-b border-gray-600 text-right">
                                        <a href="?case_id=12346" class="text-blue-400 hover:text-blue-600 inline-flex items-center">
                                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12H9m0 0l3 3m-3-3l3-3"></path></svg>
                                            View Details
                                        </a>
                                    </td>
                                </tr>
                                <!-- Additional rows as needed -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
