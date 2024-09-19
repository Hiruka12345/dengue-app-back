<x-app-layout>
    <!-- Include Leaflet.js CSS and JavaScript -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', async () => {
            try {
                // Fetch the reports from the backend API
                const response = await fetch('/api/reports');
                const reports = await response.json();

                // Calculate and update the dashboard statistics
                const totalReports = reports.length;
                const activeCases = reports.filter(report => report.status === 'Active').length;
                const resolvedCases = reports.filter(report => report.status === 'Resolved').length;
                const underReview = reports.filter(report => report.status === 'Under Review').length;

                document.getElementById('total-reports').textContent = totalReports;
                document.getElementById('active-cases').textContent = activeCases;
                document.getElementById('resolved-cases').textContent = resolvedCases;
                document.getElementById('under-review').textContent = underReview;

                // Populate the recent reports table
                const recentReportsContainer = document.getElementById('recent-reports');
                recentReportsContainer.innerHTML = reports.map(report => `
                    <tr>
                        <td class="px-6 py-4 border-b border-gray-600">${report.id}</td>
                        <td class="px-6 py-4 border-b border-gray-600">${report.location_details}</td>
                        <td class="px-6 py-4 border-b border-gray-600 text-${report.status === 'Active' ? 'red' : report.status === 'Resolved' ? 'green' : 'yellow'}-400">${report.status}</td>
                        <td class="px-6 py-4 border-b border-gray-600">${new Date(report.created_at).toLocaleString()}</td>
                        <td class="px-6 py-4 border-b border-gray-600">${report.longitude || 'N/A'}</td>
                        <td class="px-6 py-4 border-b border-gray-600">${report.latitude || 'N/A'}</td>
                        <td class="px-6 py-4 border-b border-gray-600 text-right">
                            <a href="#" class="text-blue-400 hover:text-blue-600" onclick="viewReportDetails('${report.id}', event)">View Details</a>
                        </td>
                    </tr>
                `).join('');

                // Initialize and populate the map with report locations
                const map = L.map('sri-lanka-map').setView([6.9271, 79.8612], 12);
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                }).addTo(map);

                // Place markers on the map for each report with coordinates
                const markerIcon = L.icon({
            iconUrl: 'https://unpkg.com/leaflet@1.7.1/dist/images/marker-icon.png',
            iconSize: [25, 41],
            iconAnchor: [12, 41],
            popupAnchor: [1, -34],
            shadowUrl: 'https://unpkg.com/leaflet@1.7.1/dist/images/marker-shadow.png',
            shadowSize: [41, 41]
        });

        // Function to format the report details into HTML
        function formatReportDetails(report) {
    return `
        <div>
    <h4>${report.area}</h4>
    <p>${report.location_details}</p>
    ${report.image_url ? `<img src="${report.image_url}" alt="Report Image" style="max-width: 100%; height: auto;">` : '<p>No image available</p>'}
    <p><strong>Description:</strong> ${report.infestation_details}</p>
</div>
    `;
}


        // Fetch reports from the server
        async function fetchReports() {
            try {
                const response = await fetch('/api/reports'); // Adjust the endpoint URL as needed
                const reports = await response.json();

                // Place markers on the map for each report
                reports.forEach(report => {
                    if (report.latitude && report.longitude) {
                        const marker = L.marker([report.latitude, report.longitude], { icon: markerIcon }).addTo(map);
                        marker.bindPopup(formatReportDetails(report));
                    }
                });
            } catch (error) {
                console.error('Error fetching reports:', error);
            }
        }

        // Call the function to fetch reports and add markers
        fetchReports();
            } catch (error) {
                console.error('Error fetching reports:', error);
            }
        });

        function formatReportDetails(report) {
            return `
                <div class="p-4 bg-gray-800 rounded-md shadow-lg space-y-2">
                    <h4 class="text-2xl font-semibold text-blue-400 mb-2">Report ID: ${report.id}</h4>
                    <p class="text-lg"><span class="font-semibold text-gray-300">Location:</span> ${report.location_details}</p>
                    <p class="text-lg"><span class="font-semibold text-gray-300">Status:</span> <span class="text-${report.status === 'Active' ? 'red' : report.status === 'Resolved' ? 'green' : 'yellow'}-400">${report.status}</span></p>
                    <p class="text-lg"><span class="font-semibold text-gray-300">Submitted:</span> ${new Date(report.created_at).toLocaleString()}</p>
                    <p class="text-lg"><span class="font-semibold text-gray-300">Longitude:</span> ${report.longitude || 'N/A'}</p>
                    <p class="text-lg"><span class="font-semibold text-gray-300">Latitude:</span> ${report.latitude || 'N/A'}</p>
                    <p class="mt-4 text-gray-300">${report.infestation_details}</p>
                    ${report.image_url ? `<img src="/storage/${report.image_url}" alt="Report Image" class="mt-4 w-full rounded-md" />` : ''}
                </div>
            `;
        }

        // Function to view report details in a popup
        function viewReportDetails(reportId, event) {
            event.preventDefault(); // Prevent the default anchor behavior

            fetch(`/api/reports/${reportId}`)
                .then(response => response.json())
                .then(report => {
                    const popupContent = formatReportDetails(report);
                    document.getElementById('popup-content').innerHTML = popupContent;

                    const popup = document.getElementById('report-popup');
                    popup.classList.remove('hidden', 'opacity-0', 'scale-75');
                    popup.classList.add('opacity-100', 'scale-100');
                })
                .catch(error => console.error('Error fetching report details:', error));
        }

        // Function to close the popup
        function closePopup() {
            const popup = document.getElementById('report-popup');
            popup.classList.remove('opacity-100', 'scale-100');
            popup.classList.add('opacity-0', 'scale-75');
            setTimeout(() => popup.classList.add('hidden'), 300);
        }
    </script>

    <div class="min-h-screen bg-gray-900 text-white">
        <!-- Navbar -->
        <nav class="bg-gray-800 shadow-md">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-16">
                    <div class="flex items-center">
                        <h1 class="font-semibold text-2xl text-white leading-tight">
                            Dengue Infestation Report - Admin Dashboard
                        </h1>
                    </div>
                    <!-- User Menu -->
                    <div class="relative">
                        <!-- Dropdown -->
                        <div id="user-menu" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 hidden">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700">Your Profile</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700">Settings</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700">Sign out</a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="flex-1">
            <div class="py-6">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <!-- Display Success Message -->
                    <div class="bg-green-500 text-white p-4 rounded-lg shadow-md mb-6">
                        Welcome to the Dengue Infestation Dashboard!
                    </div>

                    <!-- Dashboard Overview -->
                    <div class="grid grid-cols-1 lg:grid-cols-4 gap-6 mb-8">
                        <!-- Total Reports -->
                        <div class="bg-gradient-to-r from-blue-500 to-teal-500 rounded-lg shadow-lg p-6 text-center transform hover:scale-105 transition duration-200">
                            <h3 class="text-lg font-semibold">Total Dengue Reports</h3>
                            <p id="total-reports" class="text-4xl font-bold mt-2">0</p>
                            <span class="text-sm" id="reports-today"></span>
                        </div>

                        <!-- Active Dengue Cases -->
                        <div class="bg-gradient-to-r from-red-500 to-pink-500 rounded-lg shadow-lg p-6 text-center transform hover:scale-105 transition duration-200">
                            <h3 class="text-lg font-semibold">Active Dengue Cases</h3>
                            <p id="active-cases" class="text-4xl font-bold mt-2">0</p>
                            <span class="text-sm" id="active-cases-change"></span>
                        </div>

                        <!-- Resolved Dengue Cases -->
                        <div class="bg-gradient-to-r from-green-500 to-lime-500 rounded-lg shadow-lg p-6 text-center transform hover:scale-105 transition duration-200">
                            <h3 class="text-lg font-semibold">Resolved Dengue Cases</h3>
                            <p id="resolved-cases" class="text-4xl font-bold mt-2">0</p>
                            <span class="text-sm" id="resolved-cases-change"></span>
                        </div>

                        <!-- Cases Under Review -->
                        <div class="bg-gradient-to-r from-yellow-500 to-amber-500 rounded-lg shadow-lg p-6 text-center transform hover:scale-105 transition duration-200">
                            <h3 class="text-lg font-semibold">Cases Under Review</h3>
                            <p id="under-review" class="text-4xl font-bold mt-2">0</p>
                            <span class="text-sm" id="under-review-change"></span>
                        </div>
                    </div>

                    <!-- Recent Reports Table -->
                    <div class="overflow-x-auto bg-gray-800 rounded-lg shadow-lg">
                        <table class="min-w-full divide-y divide-gray-600">
                            <thead class="bg-gray-700">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Report ID</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Location</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Status</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Submitted</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Longitude</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Latitude</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody id="recent-reports" class="bg-gray-800 divide-y divide-gray-600">
                                <!-- Report rows will be injected here -->
                            </tbody>
                        </table>
                    </div>

                    <!-- Map -->
                    <div class="bg-gray-800 rounded-lg shadow-lg mt-8" style="height: 500px;" id="sri-lanka-map"></div>
                </div>
            </div>
        </main>

        <!-- Report Details Popup -->
        <div id="report-popup" class="fixed inset-0 z-50 flex items-center justify-center hidden opacity-0 scale-75 transition-all duration-300">
            <div class="bg-gray-800 rounded-lg shadow-lg p-6 max-w-lg w-full">
                <button class="absolute top-2 right-2 text-white text-2xl" onclick="closePopup()">×</button>
                <div id="popup-content"></div>
            </div>
        </div>
    </div>
</x-app-layout>
