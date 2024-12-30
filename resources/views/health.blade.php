<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Postcode Health Data</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="bg-[#FDEB19] text-black-800">

    <!-- Header Section -->
    <header class="bg-[#FDEB19] text-black p-6 shadow-md flex items-center justify-between border-b-4 border-black">            <!-- Logo -->
            <img src="{{ asset('C6 logo.png') }}" alt="Logo" class="h-16 max-h-20 w-auto">
            
    </header>

    <!-- Main Section -->
    <main class="max-w-4xl mx-auto mt-10 p-6 border-4 border-black bg-[#00CCFF] rounded-lg shadow-md">
        <div>
            <section class="pb-16 flex flex-col items-center justify-center text-center">
                <h1 class="text-3xl font-bold">Postcode Health Data</h1>
                <p class="mt-1">Find health statistics by constituency</p>
            </section>
        </div>
        <!-- Search Form -->
        <form id="searchForm" class="flex flex-col sm:flex-row items-center space-y-4 sm:space-y-0 sm:space-x-4">
            <input
                type="text"
                id="postcode"
                name="postcode"
                placeholder="Enter postcode (e.g., SW1A 1AA)"
                class="flex-grow border-4 border-black bg-[#FF00FF] placeholder-black rounded-md p-2 focus:bg-[#FF00FF] focus:outline-none focus:ring-2 focus:ring-blue-400 autofill:bg-[#FF00FF]"
            />
            <button
                type="submit"
                class="border-4 border-black bg-[#01FF00] text-black px-6 py-2 rounded-md hover:bg-blue-700 transition-all"
            >
                Search
            </button>
        </form>

        <!-- Results Section -->
        <section id="results" class="mt-8 hidden">
            <h2 class="text-xl font-semibold text-gray-700">Constituency: <span id="constituency" class="text-blue-600"></span></h2>
            <table class="w-full mt-6 border-4 border-black text-left">
                <thead class="bg-[#FF00FF]">
                    <tr>
                        <th class="p-2 border-4 border-black">Condition</th>
                        <th class="p-2 border-4 border-black">Prevalence (%)</th>
                        <th class="p-2 border-4 border-black">Description</th>
                    </tr>
                </thead>
                <tbody id="resultsTable" class= "border-4 border-black bg-[#FDEB19]">
                    <!-- Data will be dynamically inserted here -->
                </tbody>
            </table>
        </section>

        <!-- Error Message -->
        <p id="errorMessage" class="text-red-500 mt-6 hidden"></p>
    </main>

    <!-- Footer Section -->
    <footer class="bg-[#FDEB19] p-4 text-center mt-10 border-t-4 border-black fixed bottom-0 left-0 w-full">
    <p class="text-black">© 2024 Postcode Health Data Tool</p>
    </footer>

    <!-- JavaScript Section -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs" defer></script>
    <script>
        document.getElementById('searchForm').addEventListener('submit', async (event) => {
            event.preventDefault();

            const postcode = document.getElementById('postcode').value.trim();
            const results = document.getElementById('results');
            const resultsTable = document.getElementById('resultsTable');
            const errorMessage = document.getElementById('errorMessage');
            const constituencyElement = document.getElementById('constituency');

            // Hide results and error message
            results.classList.add('hidden');
            errorMessage.classList.add('hidden');

            try {
                // Fetch data from the API
                const response = await fetch(`/postcode/${postcode}`);
                if (!response.ok) throw new Error('Postcode not found or no data available.');

                const data = await response.json();

                // Display constituency
                constituencyElement.textContent = data.constituency;

                // Populate health data in the results table
                if (!data.health_data || !Array.isArray(data.health_data)) {
                    resultsTable.innerHTML = '<tr><td colspan="3" class="p-2 text-center">No health data found for this postcode.</td></tr>';
                } else {
                    resultsTable.innerHTML = data.health_data.map(row => `
                        <tr>
                            <td class="p-2 border-4 border-black">${row.condition}</td>
                            <td class="p-2 border-4 border-black">${row.prevalence_percentage}</td>
                            <td class="p-2 border-4 border-black">${row.description}</td>
                        </tr>
                    `).join('');
                }

                // Show the results section
                results.classList.remove('hidden');
            } catch (error) {
                console.error(error.message);
                errorMessage.textContent = error.message;
                errorMessage.classList.remove('hidden');
            }
        });
    </script>
</body>
</html>