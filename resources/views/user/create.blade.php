<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SyncHours</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gray-50 flex flex-col">
  <!-- Header -->
    <header class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center">
                    <a href="{{ route('welcome') }}" class="text-rose-600 text-2xl font-bold">SyncHours</a>
                </div>
            </div>
        </div>
    </header>

<!-- Main Content -->
<main class="flex-1 max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8 py-6">
    <div class="bg-white rounded-xl shadow-md p-8 border border-gray-200">
        <h1 class="text-3xl font-bold text-gray-800 mb-8">Busy Schedule Configuration</h1>

        @php
            $weekDays = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];
        @endphp
        
        <form id="config-form" action="{{ route('user.store') }}" method="POST">
        @csrf
            <!-- Day panels -->
            @foreach($weekDays as $day)
                <div class="day-panel mb-8 p-6 bg-gray-50 rounded-lg shadow-md border border-gray-200" id="{{ $day }}-panel">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-xl font-semibold text-gray-800 capitalize">{{ $day }}</h2>
                        <button type="button" class="add-activity-btn px-3 py-1 bg-rose-100 text-rose-700 rounded-md text-sm hover:bg-rose-200 transition-colors" data-day="{{ $day }}">
                            + Add Activity
                        </button>
                    </div>
                    
                    <div class="activities-container" id="{{ $day }}-activities">
                        @php
                            $activities = $userConfig[$day] ?? [];
                        @endphp
                        
                        @foreach($activities as $index => $activity)
                            <div class="activity-item bg-white p-5 rounded-md mb-4 border border-gray-200 shadow-sm">
                                <div class="flex justify-between items-center mb-3">
                                    <h3 class="font-medium text-gray-700">
                                        {{ $activity['activity'] ?? 'No activity name' }}
                                    </h3>
                                    <button type="button" class="remove-activity-btn text-gray-400 hover:text-rose-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </div>
                                
                                <div class="grid grid-cols-3 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Activity</label>
                                        <input type="text" name="{{ $day }}[{{ $index }}][activity]" value="{{ $activity['activity'] ?? '' }}"
                                            class="mt-1 block w-full rounded-md border border-gray-300 bg-white shadow-md px-3 py-2 focus:border-rose-500 focus:ring-rose-500 sm:text-sm">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Start</label>
                                        <input type="time" name="{{ $day }}[{{ $index }}][start]" value="{{ $activity['start'] ?? '' }}"
                                            class="mt-1 block w-full rounded-md border border-gray-300 bg-white shadow-md px-3 py-2 focus:border-rose-500 focus:ring-rose-500 sm:text-sm">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">End</label>
                                        <input type="time" name="{{ $day }}[{{ $index }}][end]" value="{{ $activity['end'] ?? '' }}"
                                            class="mt-1 block w-full rounded-md border border-gray-300 bg-white shadow-md px-3 py-2 focus:border-rose-500 focus:ring-rose-500 sm:text-sm">
                                    </div>
                                </div>
                                
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach

            <button type="submit" class="bg-rose-600 text-white px-5 py-2.5 rounded-md hover:bg-rose-700 transition">
                Save Configuration
            </button>
        </form>

        <div class="mt-6 text-center">
            <a href="{{ route('user.index') }}" class="w-full flex justify-center py-2.5 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-rose-600 hover:bg-rose-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-500">
                Back
            </a>
        </div>
    </div>
</main>


    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200 py-4 mt-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <p class="text-center text-sm text-gray-500">&copy; 2024 SyncHours. All rights reserved.</p>
    </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Change tab
            document.querySelectorAll('.day-tab').forEach(tab => {
                tab.addEventListener('click', () => {
                    const day = tab.dataset.day;
                    document.querySelectorAll('.day-panel').forEach(p => p.classList.add('hidden'));
                    document.getElementById(`${day}-panel`).classList.remove('hidden');
        
                    document.querySelectorAll('.day-tab').forEach(t => {
                        t.classList.remove('border-rose-500', 'text-rose-600');
                        t.classList.add('border-transparent', 'text-gray-500');
                    });
        
                    tab.classList.remove('border-transparent', 'text-gray-500');
                    tab.classList.add('border-rose-500', 'text-rose-600');
                });
            });
        
            // Add activity
            document.querySelectorAll('.add-activity-btn').forEach(button => {
                button.addEventListener('click', () => {
                    const day = button.dataset.day;
                    const container = document.getElementById(`${day}-activities`);
                    const count = container.querySelectorAll('.activity-item').length;
        
                    const item = document.createElement('div');
                    item.className = 'activity-item bg-white border shadow-md rounded-lg p-5 mb-4';
                    item.innerHTML = `
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="font-semibold text-gray-800">Activity ${count + 1}</h3>
                            <button type="button" class="remove-activity-btn text-gray-400 hover:text-rose-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Activity</label>
                                <input type="text" name="${day}[${count}][activity]" class="mt-1 block w-full border border-gray-300 rounded-md shadow-inner focus:ring-rose-500 focus:border-rose-500 sm:text-sm px-3 py-2">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Start</label>
                                <input type="time" name="${day}[${count}][start]" class="mt-1 block w-full border border-gray-300 rounded-md shadow-inner focus:ring-rose-500 focus:border-rose-500 sm:text-sm px-3 py-2">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">End</label>
                                <input type="time" name="${day}[${count}][end]" class="mt-1 block w-full border border-gray-300 rounded-md shadow-inner focus:ring-rose-500 focus:border-rose-500 sm:text-sm px-3 py-2">
                            </div>
                        </div>
                    `;
                    container.appendChild(item);
        
                    const removeBtn = item.querySelector('.remove-activity-btn');
                    removeBtn.addEventListener('click', () => {
                        item.remove();
                        updateActivityNumbers(day);
                    });
                });
            });
        
            // Remove activity
            document.addEventListener('click', (e) => {
                const btn = e.target.closest('.remove-activity-btn');
                if (!btn) return;
        
                const activityItem = btn.closest('.activity-item');
                const day = activityItem.closest('.activities-container').id.split('-')[0];
                activityItem.remove();
                updateActivityNumbers(day);
            });
        
            function updateActivityNumbers(day) {
                const container = document.getElementById(`${day}-activities`);
                container.querySelectorAll('.activity-item').forEach((activity, index) => {
                    const heading = activity.querySelector('h3');
                    heading.textContent = `Activity ${index + 1}`;
        
                    activity.querySelectorAll('input').forEach(input => {
                        const nameParts = input.name.split('[');
                        input.name = `${nameParts[0]}[${index}]${nameParts[2]}`;
                    });
                });
            }
        });
    </script>
</body>
</html>
