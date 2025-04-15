<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SyncHours - Configuração de Horário</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gray-50 flex flex-col">
  <!-- Header -->
  <header class="bg-white shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between h-16 items-center">
        <div class="flex items-center">
          <span class="text-rose-600 text-2xl font-bold">SyncHours</span>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <main class="flex-1 max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8 py-6">
    <div class="bg-white rounded-lg shadow-sm p-6">
      <h1 class="text-2xl font-bold text-gray-800 mb-6">Configuração de Horário Semanal</h1>
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
                    <p class="text-sm text-gray-500">Sem atividades</p>
                @endif
            </div>
        @endforeach
    </div>
@else
    <p class="text-gray-600">Ainda não configuraste o teu horário.</p>
@endif

      <!-- Tabs for days of the week -->
      <div class="mb-6">
        <div class="border-b border-gray-200">
          <nav class="-mb-px flex space-x-2 overflow-x-auto" aria-label="Tabs">
            <button type="button" class="day-tab border-rose-500 text-rose-600 whitespace-nowrap py-3 px-4 border-b-2 font-medium text-sm" data-day="monday">Segunda</button>
            <button type="button" class="day-tab border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-3 px-4 border-b-2 font-medium text-sm" data-day="tuesday">Terça</button>
            <button type="button" class="day-tab border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-3 px-4 border-b-2 font-medium text-sm" data-day="wednesday">Quarta</button>
            <button type="button" class="day-tab border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-3 px-4 border-b-2 font-medium text-sm" data-day="thursday">Quinta</button>
            <button type="button" class="day-tab border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-3 px-4 border-b-2 font-medium text-sm" data-day="friday">Sexta</button>
            <button type="button" class="day-tab border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-3 px-4 border-b-2 font-medium text-sm" data-day="saturday">Sábado</button>
            <button type="button" class="day-tab border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-3 px-4 border-b-2 font-medium text-sm" data-day="sunday">Domingo</button>
          </nav>
        </div>
      </div>

      <form id="config-form" action="{{ route('user.save') }}" method="POST">
        @csrf
        <!-- Day panels -->
        <div class="day-panels">
          <!-- Monday Panel -->
          <div class="day-panel" id="monday-panel">
            <div class="flex justify-between items-center mb-4">
              <h2 class="text-lg font-semibold text-gray-800">Segunda-feira</h2>
              <button type="button" class="add-activity-btn px-3 py-1 bg-rose-100 text-rose-700 rounded-md text-sm hover:bg-rose-200 transition-colors" data-day="monday">
                + Adicionar Atividade
              </button>
            </div>
            
            <div class="activities-container" id="monday-activities">
              <!-- Default activities for Monday -->
              <div class="activity-item bg-gray-50 p-4 rounded-lg mb-3">
                <div class="flex justify-between items-center mb-2">
                  <h3 class="font-medium text-gray-700">Atividade 1</h3>
                  <button type="button" class="remove-activity-btn text-gray-400 hover:text-rose-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                      <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                  </button>
                </div>
                <div class="grid grid-cols-3 gap-4">
                  <div>
                    <label class="block text-sm font-medium text-gray-700">Atividade</label>
                    <input type="text" name="monday[0][activity]" value="Aulas" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-rose-500 focus:ring-rose-500 sm:text-sm">
                  </div>
                  <div>
                    <label class="block text-sm font-medium text-gray-700">Início</label>
                    <input type="time" name="monday[0][start]" value="19:00" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-rose-500 focus:ring-rose-500 sm:text-sm">
                  </div>
                  <div>
                    <label class="block text-sm font-medium text-gray-700">Fim</label>
                    <input type="time" name="monday[0][end]" value="23:00" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-rose-500 focus:ring-rose-500 sm:text-sm">
                  </div>
                </div>
              </div>
              
              <div class="activity-item bg-gray-50 p-4 rounded-lg mb-3">
                <div class="flex justify-between items-center mb-2">
                  <h3 class="font-medium text-gray-700">Atividade 2</h3>
                  <button type="button" class="remove-activity-btn text-gray-400 hover:text-rose-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                      <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                  </button>
                </div>
                <div class="grid grid-cols-3 gap-4">
                  <div>
                    <label class="block text-sm font-medium text-gray-700">Atividade</label>
                    <input type="text" name="monday[1][activity]" value="Dormir" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-rose-500 focus:ring-rose-500 sm:text-sm">
                  </div>
                  <div>
                    <label class="block text-sm font-medium text-gray-700">Início</label>
                    <input type="time" name="monday[1][start]" value="00:00" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-rose-500 focus:ring-rose-500 sm:text-sm">
                  </div>
                  <div>
                    <label class="block text-sm font-medium text-gray-700">Fim</label>
                    <input type="time" name="monday[1][end]" value="08:00" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-rose-500 focus:ring-rose-500 sm:text-sm">
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Tuesday Panel (Hidden by default) -->
          <div class="day-panel hidden" id="tuesday-panel">
            <div class="flex justify-between items-center mb-4">
              <h2 class="text-lg font-semibold text-gray-800">Terça-feira</h2>
              <button type="button" class="add-activity-btn px-3 py-1 bg-rose-100 text-rose-700 rounded-md text-sm hover:bg-rose-200 transition-colors" data-day="tuesday">
                + Adicionar Atividade
              </button>
            </div>
            
            <div class="activities-container" id="tuesday-activities">
              <!-- Default activities for Tuesday -->
              <div class="activity-item bg-gray-50 p-4 rounded-lg mb-3">
                <div class="flex justify-between items-center mb-2">
                  <h3 class="font-medium text-gray-700">Atividade 1</h3>
                  <button type="button" class="remove-activity-btn text-gray-400 hover:text-rose-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                      <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                  </button>
                </div>
                <div class="grid grid-cols-3 gap-4">
                  <div>
                    <label class="block text-sm font-medium text-gray-700">Atividade</label>
                    <input type="text" name="tuesday[0][activity]" value="Aulas" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-rose-500 focus:ring-rose-500 sm:text-sm">
                  </div>
                  <div>
                    <label class="block text-sm font-medium text-gray-700">Início</label>
                    <input type="time" name="tuesday[0][start]" value="19:00" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-rose-500 focus:ring-rose-500 sm:text-sm">
                  </div>
                  <div>
                    <label class="block text-sm font-medium text-gray-700">Fim</label>
                    <input type="time" name="tuesday[0][end]" value="23:00" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-rose-500 focus:ring-rose-500 sm:text-sm">
                  </div>
                </div>
              </div>
              
              <div class="activity-item bg-gray-50 p-4 rounded-lg mb-3">
                <div class="flex justify-between items-center mb-2">
                  <h3 class="font-medium text-gray-700">Atividade 2</h3>
                  <button type="button" class="remove-activity-btn text-gray-400 hover:text-rose-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                      <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                  </button>
                </div>
                <div class="grid grid-cols-3 gap-4">
                  <div>
                    <label class="block text-sm font-medium text-gray-700">Atividade</label>
                    <input type="text" name="tuesday[1][activity]" value="Dormir" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-rose-500 focus:ring-rose-500 sm:text-sm">
                  </div>
                  <div>
                    <label class="block text-sm font-medium text-gray-700">Início</label>
                    <input type="time" name="tuesday[1][start]" value="00:00" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-rose-500 focus:ring-rose-500 sm:text-sm">
                  </div>
                  <div>
                    <label class="block text-sm font-medium text-gray-700">Fim</label>
                    <input type="time" name="tuesday[1][end]" value="08:00" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-rose-500 focus:ring-rose-500 sm:text-sm">
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Wednesday Panel (Hidden by default) -->
          <div class="day-panel hidden" id="wednesday-panel">
            <!-- Similar structure as Monday and Tuesday -->
            <div class="flex justify-between items-center mb-4">
              <h2 class="text-lg font-semibold text-gray-800">Quarta-feira</h2>
              <button type="button" class="add-activity-btn px-3 py-1 bg-rose-100 text-rose-700 rounded-md text-sm hover:bg-rose-200 transition-colors" data-day="wednesday">
                + Adicionar Atividade
              </button>
            </div>
            
            <div class="activities-container" id="wednesday-activities">
              <!-- Default activities for Wednesday -->
              <div class="activity-item bg-gray-50 p-4 rounded-lg mb-3">
                <div class="flex justify-between items-center mb-2">
                  <h3 class="font-medium text-gray-700">Atividade 1</h3>
                  <button type="button" class="remove-activity-btn text-gray-400 hover:text-rose-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                      <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                  </button>
                </div>
                <div class="grid grid-cols-3 gap-4">
                  <div>
                    <label class="block text-sm font-medium text-gray-700">Atividade</label>
                    <input type="text" name="wednesday[0][activity]" value="Aulas" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-rose-500 focus:ring-rose-500 sm:text-sm">
                  </div>
                  <div>
                    <label class="block text-sm font-medium text-gray-700">Início</label>
                    <input type="time" name="wednesday[0][start]" value="19:00" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-rose-500 focus:ring-rose-500 sm:text-sm">
                  </div>
                  <div>
                    <label class="block text-sm font-medium text-gray-700">Fim</label>
                    <input type="time" name="wednesday[0][end]" value="23:00" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-rose-500 focus:ring-rose-500 sm:text-sm">
                  </div>
                </div>
              </div>
              
              <div class="activity-item bg-gray-50 p-4 rounded-lg mb-3">
                <div class="flex justify-between items-center mb-2">
                  <h3 class="font-medium text-gray-700">Atividade 2</h3>
                  <button type="button" class="remove-activity-btn text-gray-400 hover:text-rose-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                      <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                  </button>
                </div>
                <div class="grid grid-cols-3 gap-4">
                  <div>
                    <label class="block text-sm font-medium text-gray-700">Atividade</label>
                    <input type="text" name="wednesday[1][activity]" value="Dormir" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-rose-500 focus:ring-rose-500 sm:text-sm">
                  </div>
                  <div>
                    <label class="block text-sm font-medium text-gray-700">Início</label>
                    <input type="time" name="wednesday[1][start]" value="00:00" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-rose-500 focus:ring-rose-500 sm:text-sm">
                  </div>
                  <div>
                    <label class="block text-sm font-medium text-gray-700">Fim</label>
                    <input type="time" name="wednesday[1][end]" value="08:00" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-rose-500 focus:ring-rose-500 sm:text-sm">
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Thursday Panel (Hidden by default) -->
          <div class="day-panel hidden" id="thursday-panel">
            <!-- Similar structure as other days -->
            <div class="flex justify-between items-center mb-4">
              <h2 class="text-lg font-semibold text-gray-800">Quinta-feira</h2>
              <button type="button" class="add-activity-btn px-3 py-1 bg-rose-100 text-rose-700 rounded-md text-sm hover:bg-rose-200 transition-colors" data-day="thursday">
                + Adicionar Atividade
              </button>
            </div>
            
            <div class="activities-container" id="thursday-activities">
              <!-- Default activities for Thursday -->
              <div class="activity-item bg-gray-50 p-4 rounded-lg mb-3">
                <div class="flex justify-between items-center mb-2">
                  <h3 class="font-medium text-gray-700">Atividade 1</h3>
                  <button type="button" class="remove-activity-btn text-gray-400 hover:text-rose-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                      <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                  </button>
                </div>
                <div class="grid grid-cols-3 gap-4">
                  <div>
                    <label class="block text-sm font-medium text-gray-700">Atividade</label>
                    <input type="text" name="thursday[0][activity]" value="Aulas" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-rose-500 focus:ring-rose-500 sm:text-sm">
                  </div>
                  <div>
                    <label class="block text-sm font-medium text-gray-700">Início</label>
                    <input type="time" name="thursday[0][start]" value="19:00" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-rose-500 focus:ring-rose-500 sm:text-sm">
                  </div>
                  <div>
                    <label class="block text-sm font-medium text-gray-700">Fim</label>
                    <input type="time" name="thursday[0][end]" value="23:00" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-rose-500 focus:ring-rose-500 sm:text-sm">
                  </div>
                </div>
              </div>
              
              <div class="activity-item bg-gray-50 p-4 rounded-lg mb-3">
                <div class="flex justify-between items-center mb-2">
                  <h3 class="font-medium text-gray-700">Atividade 2</h3>
                  <button type="button" class="remove-activity-btn text-gray-400 hover:text-rose-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                      <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                  </button>
                </div>
                <div class="grid grid-cols-3 gap-4">
                  <div>
                    <label class="block text-sm font-medium text-gray-700">Atividade</label>
                    <input type="text" name="thursday[1][activity]" value="Dormir" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-rose-500 focus:ring-rose-500 sm:text-sm">
                  </div>
                  <div>
                    <label class="block text-sm font-medium text-gray-700">Início</label>
                    <input type="time" name="thursday[1][start]" value="00:00" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-rose-500 focus:ring-rose-500 sm:text-sm">
                  </div>
                  <div>
                    <label class="block text-sm font-medium text-gray-700">Fim</label>
                    <input type="time" name="thursday[1][end]" value="08:00" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-rose-500 focus:ring-rose-500 sm:text-sm">
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Friday Panel (Hidden by default) -->
          <div class="day-panel hidden" id="friday-panel">
            <!-- Similar structure as other days -->
            <div class="flex justify-between items-center mb-4">
              <h2 class="text-lg font-semibold text-gray-800">Sexta-feira</h2>
              <button type="button" class="add-activity-btn px-3 py-1 bg-rose-100 text-rose-700 rounded-md text-sm hover:bg-rose-200 transition-colors" data-day="friday">
                + Adicionar Atividade
              </button>
            </div>
            
            <div class="activities-container" id="friday-activities">
              <!-- Default activities for Friday -->
              <div class="activity-item bg-gray-50 p-4 rounded-lg mb-3">
                <div class="flex justify-between items-center mb-2">
                  <h3 class="font-medium text-gray-700">Atividade 1</h3>
                  <button type="button" class="remove-activity-btn text-gray-400 hover:text-rose-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                      <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                  </button>
                </div>
                <div class="grid grid-cols-3 gap-4">
                  <div>
                    <label class="block text-sm font-medium text-gray-700">Atividade</label>
                    <input type="text" name="friday[0][activity]" value="Aulas" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-rose-500 focus:ring-rose-500 sm:text-sm">
                  </div>
                  <div>
                    <label class="block text-sm font-medium text-gray-700">Início</label>
                    <input type="time" name="friday[0][start]" value="19:00" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-rose-500 focus:ring-rose-500 sm:text-sm">
                  </div>
                  <div>
                    <label class="block text-sm font-medium text-gray-700">Fim</label>
                    <input type="time" name="friday[0][end]" value="23:00" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-rose-500 focus:ring-rose-500 sm:text-sm">
                  </div>
                </div>
              </div>
              
              <div class="activity-item bg-gray-50 p-4 rounded-lg mb-3">
                <div class="flex justify-between items-center mb-2">
                  <h3 class="font-medium text-gray-700">Atividade 2</h3>
                  <button type="button" class="remove-activity-btn text-gray-400 hover:text-rose-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                      <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                  </button>
                </div>
                <div class="grid grid-cols-3 gap-4">
                  <div>
                    <label class="block text-sm font-medium text-gray-700">Atividade</label>
                    <input type="text" name="friday[1][activity]" value="Dormir" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-rose-500 focus:ring-rose-500 sm:text-sm">
                  </div>
                  <div>
                    <label class="block text-sm font-medium text-gray-700">Início</label>
                    <input type="time" name="friday[1][start]" value="00:00" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-rose-500 focus:ring-rose-500 sm:text-sm">
                  </div>
                  <div>
                    <label class="block text-sm font-medium text-gray-700">Fim</label>
                    <input type="time" name="friday[1][end]" value="08:00" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-rose-500 focus:ring-rose-500 sm:text-sm">
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Saturday Panel (Hidden by default) -->
          <div class="day-panel hidden" id="saturday-panel">
            <div class="flex justify-between items-center mb-4">
              <h2 class="text-lg font-semibold text-gray-800">Sábado</h2>
              <button type="button" class="add-activity-btn px-3 py-1 bg-rose-100 text-rose-700 rounded-md text-sm hover:bg-rose-200 transition-colors" data-day="saturday">
                + Adicionar Atividade
              </button>
            </div>
            
            <div class="activities-container" id="saturday-activities">
              <!-- Default activities for Saturday -->
              <div class="activity-item bg-gray-50 p-4 rounded-lg mb-3">
                <div class="flex justify-between items-center mb-2">
                  <h3 class="font-medium text-gray-700">Atividade 1</h3>
                  <button type="button" class="remove-activity-btn text-gray-400 hover:text-rose-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                      <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                  </button>
                </div>
                <div class="grid grid-cols-3 gap-4">
                  <div>
                    <label class="block text-sm font-medium text-gray-700">Atividade</label>
                    <input type="text" name="saturday[0][activity]" value="Dormir" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-rose-500 focus:ring-rose-500 sm:text-sm">
                  </div>
                  <div>
                    <label class="block text-sm font-medium text-gray-700">Início</label>
                    <input type="time" name="saturday[0][start]" value="00:00" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-rose-500 focus:ring-rose-500 sm:text-sm">
                  </div>
                  <div>
                    <label class="block text-sm font-medium text-gray-700">Fim</label>
                    <input type="time" name="saturday[0][end]" value="08:00" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-rose-500 focus:ring-rose-500 sm:text-sm">
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Sunday Panel (Hidden by default) -->
          <div class="day-panel hidden" id="sunday-panel">
            <div class="flex justify-between items-center mb-4">
              <h2 class="text-lg font-semibold text-gray-800">Domingo</h2>
              <button type="button" class="add-activity-btn px-3 py-1 bg-rose-100 text-rose-700 rounded-md text-sm hover:bg-rose-200 transition-colors" data-day="sunday">
                + Adicionar Atividade
              </button>
            </div>
            
            <div class="activities-container" id="sunday-activities">
              <!-- Default activities for Sunday -->
              <div class="activity-item bg-gray-50 p-4 rounded-lg mb-3">
                <div class="flex justify-between items-center mb-2">
                  <h3 class="font-medium text-gray-700">Atividade 1</h3>
                  <button type="button" class="remove-activity-btn text-gray-400 hover:text-rose-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                      <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                  </button>
                </div>
                <div class="grid grid-cols-3 gap-4">
                  <div>
                    <label class="block text-sm font-medium text-gray-700">Atividade</label>
                    <input type="text" name="sunday[0][activity]" value="Dormir" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-rose-500 focus:ring-rose-500 sm:text-sm">
                  </div>
                  <div>
                    <label class="block text-sm font-medium text-gray-700">Início</label>
                    <input type="time" name="sunday[0][start]" value="00:00" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-rose-500 focus:ring-rose-500 sm:text-sm">
                  </div>
                  <div>
                    <label class="block text-sm font-medium text-gray-700">Fim</label>
                    <input type="time" name="sunday[0][end]" value="08:00" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-rose-500 focus:ring-rose-500 sm:text-sm">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Submit Button -->
        <div class="mt-8">
          <button type="submit" id="save-config" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-rose-600 hover:bg-rose-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-500">
            Salvar Configuração
          </button>
        </div>
      </form>
    </div>
  </main>

  <!-- Footer -->
  <footer class="bg-white border-t border-gray-200 py-4 mt-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <p class="text-center text-sm text-gray-500">&copy; 2024 SyncHours. Todos os direitos reservados.</p>
    </div>
  </footer>

  <!-- JavaScript for form functionality -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Tab switching
      const dayTabs = document.querySelectorAll('.day-tab');
      const dayPanels = document.querySelectorAll('.day-panel');
      
      dayTabs.forEach(tab => {
        tab.addEventListener('click', () => {
          // Hide all panels
          dayPanels.forEach(panel => panel.classList.add('hidden'));
          
          // Remove active class from all tabs
          dayTabs.forEach(t => {
            t.classList.remove('border-rose-500', 'text-rose-600');
            t.classList.add('border-transparent', 'text-gray-500');
          });
          
          // Show selected panel
          const day = tab.dataset.day;
          document.getElementById(`${day}-panel`).classList.remove('hidden');
          
          // Add active class to selected tab
          tab.classList.remove('border-transparent', 'text-gray-500');
          tab.classList.add('border-rose-500', 'text-rose-600');
        });
      });
      
      // Add activity functionality
      const addActivityBtns = document.querySelectorAll('.add-activity-btn');
      
      addActivityBtns.forEach(btn => {
        btn.addEventListener('click', () => {
          const day = btn.dataset.day;
          const container = document.getElementById(`${day}-activities`);
          const activityCount = container.querySelectorAll('.activity-item').length;
          
          const newActivity = document.createElement('div');
          newActivity.className = 'activity-item bg-gray-50 p-4 rounded-lg mb-3';
          newActivity.innerHTML = `
            <div class="flex justify-between items-center mb-2">
              <h3 class="font-medium text-gray-700">Atividade ${activityCount + 1}</h3>
              <button type="button" class="remove-activity-btn text-gray-400 hover:text-rose-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
              </button>
            </div>
            <div class="grid grid-cols-3 gap-4">
              <div>
                <label class="block text-sm font-medium text-gray-700">Atividade</label>
                <input type="text" name="${day}[${activityCount}][activity]" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-rose-500 focus:ring-rose-500 sm:text-sm">
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-700">Início</label>
                <input type="time" name="${day}[${activityCount}][start]" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-rose-500 focus:ring-rose-500 sm:text-sm">
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-700">Fim</label>
                <input type="time" name="${day}[${activityCount}][end]" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-rose-500 focus:ring-rose-500 sm:text-sm">
              </div>
            </div>
          `;
          
          container.appendChild(newActivity);
          
          // Add event listener to the new remove button
          const removeBtn = newActivity.querySelector('.remove-activity-btn');
          removeBtn.addEventListener('click', function() {
            this.closest('.activity-item').remove();
            updateActivityNumbers(day);
          });
          
        });
      });
      
      // Remove activity functionality
      document.addEventListener('click', function(e) {
        if (e.target.closest('.remove-activity-btn')) {
          const btn = e.target.closest('.remove-activity-btn');
          const activityItem = btn.closest('.activity-item');
          const day = activityItem.closest('.activities-container').id.split('-')[0];
          
          activityItem.remove();
          updateJsonPreview();
          updateActivityNumbers(day);
        }
      });
      
      // Update activity numbers for a specific day
      function updateActivityNumbers(day) {
        const container = document.getElementById(`${day}-activities`);
        const activities = container.querySelectorAll('.activity-item');
        
        activities.forEach((activity, index) => {
          // Update heading
          const heading = activity.querySelector('h3');
          heading.textContent = `Atividade ${index + 1}`;
          
          // Update input names
          const inputs = activity.querySelectorAll('input');
          inputs.forEach(input => {
            const nameParts = input.name.split('[');
            input.name = `${nameParts[0]}[${index}]${nameParts[2]}`;
          });
        });
      }    

    });
  </script>
</body>
</html>