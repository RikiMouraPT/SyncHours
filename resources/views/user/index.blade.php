<!DOCTYPE html>
<html lang="pt-BR">
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
    <div class="bg-white rounded-lg shadow-sm p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Busy Schedule</h1>
        @if(isset($userConfig))
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @foreach($userConfig as $day => $activities)
                    <div class="p-4 border rounded shadow">
                        <h2 class="text-lg font-semibold capitalize">{{ $day }}</h2>
                        
                        @if(count($activities))
                            <ul class="mt-2">
                                @foreach($activities as $activity)
                                    <li class="mb-1">
                                        <strong>{{ $activity['activity'] }}</strong>:
                                        {{ $activity['start'] }} - {{ $activity['end'] }}
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-sm text-gray-500">No Activities</p>
                        @endif
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-gray-600">You haven't configured any activies</p>
        @endif
    </div>

    <div class="mt-6 flex justify-end">
        <a href="{{ route('user.create') }}" class="bg-rose-600 text-white px-4 py-2 rounded hover:bg-rose-700">Modify Schedule</a>
    </div>
  </main>
</body>
</html>