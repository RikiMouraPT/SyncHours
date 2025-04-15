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
            <a href="{{ route('welcome') }}" class="text-rose-600 text-2xl font-bold">SyncHours</a>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <main class="flex-1 max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8 py-6">
    <div class="bg-white rounded-lg shadow-sm p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Configuração de Horário Semanal</h1>


        @php
            $weekDays = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];
        @endphp

    <form id="config-form" action="{{ route('user.store') }}" method="POST">
    @csrf
    <!-- Day panels -->
    @foreach($weekDays as $day)
        <div class="day-panel" id="{{ $day }}-panel">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-semibold text-gray-800">{{ ucfirst($day) }}</h2>
                <button type="button" class="add-activity-btn px-3 py-1 bg-rose-100 text-rose-700 rounded-md text-sm hover:bg-rose-200 transition-colors" data-day="{{ $day }}">
                    + Adicionar Atividade
                </button>
            </div>
            
            <div class="activities-container" id="{{ $day }}-activities">
                @php
                    // Verifica se existem atividades já definidas para o dia
                    $activities = $userConfig[$day] ?? [];
                @endphp
                
                @foreach($activities as $index => $activity)
                    <div class="activity-item bg-gray-50 p-4 rounded-lg mb-3">
                        <div class="flex justify-between items-center mb-2">
                            <h3 class="font-medium text-gray-700">Atividade {{ $index + 1 }}</h3>
                            <button type="button" class="remove-activity-btn text-gray-400 hover:text-rose-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                        
                        <div class="grid grid-cols-3 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Atividade</label>
                                <input type="text" name="{{ $day }}[{{ $index }}][activity]" value="{{ $activity['activity'] }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-rose-500 focus:ring-rose-500 sm:text-sm">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Início</label>
                                <input type="time" name="{{ $day }}[{{ $index }}][start]" value="{{ $activity['start'] }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-rose-500 focus:ring-rose-500 sm:text-sm">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Fim</label>
                                <input type="time" name="{{ $day }}[{{ $index }}][end]" value="{{ $activity['end'] }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-rose-500 focus:ring-rose-500 sm:text-sm">
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach

    <button type="submit" class="bg-rose-600 text-white px-4 py-2 rounded hover:bg-rose-700">
        Guardar Configuração
    </button>
</form>

      <div class="mt-4 text-center">
        <a href="{{ route('user.index') }}" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-rose-600 hover:bg-rose-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-500">Voltar</a>
      </div>
    </div>
    <!-- Button to return to user.index -->
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