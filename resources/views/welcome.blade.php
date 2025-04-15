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
          <span class="text-rose-600 text-2xl font-bold">SyncHours</span>
          <a href="{{ route('user.index') }}" class="ml-6 text-gray-600 hover:text-rose-600">PERFIL</a>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <main class="flex-1 max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8 py-6">
    <div class="flex flex-col lg:flex-row gap-6">
      <!-- Calendar Section -->
      <div class="lg:flex-1">
        <div class="bg-white rounded-lg shadow-sm p-4">
          <h2 class="text-lg font-semibold text-gray-800 mb-4">Calendário Semanal</h2>

          <!-- Days of the week -->
          <div class="grid grid-cols-8 gap-2 mb-2">
            <div class="col-span-1"></div>
            <div class="col-span-1 text-center font-medium text-gray-600">Seg</div>
            <div class="col-span-1 text-center font-medium text-gray-600">Ter</div>
            <div class="col-span-1 text-center font-medium text-gray-600">Qua</div>
            <div class="col-span-1 text-center font-medium text-gray-600">Qui</div>
            <div class="col-span-1 text-center font-medium text-gray-600">Sex</div>
            <div class="col-span-1 text-center font-medium text-gray-600">Sáb</div>
            <div class="col-span-1 text-center font-medium text-gray-600">Dom</div>
          </div>

          <!-- Time slots - 8:00 -->
          <div class="grid grid-cols-8 gap-2 mb-1">
            <div class="col-span-1 text-right pr-2 text-sm text-gray-500">8:00</div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
          </div>

          <!-- Time slots - 9:00 -->
          <div class="grid grid-cols-8 gap-2 mb-1">
            <div class="col-span-1 text-right pr-2 text-sm text-gray-500">9:00</div>
            <div class="col-span-1 h-12 rounded border border-gray-200 bg-rose-100 border-rose-200">
              <div class="text-xs p-1 text-rose-800">Matemática</div>
            </div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
          </div>

          <!-- Time slots - 10:00 -->
          <div class="grid grid-cols-8 gap-2 mb-1">
            <div class="col-span-1 text-right pr-2 text-sm text-gray-500">10:00</div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
          </div>

          <!-- Time slots - 11:00 -->
          <div class="grid grid-cols-8 gap-2 mb-1">
            <div class="col-span-1 text-right pr-2 text-sm text-gray-500">11:00</div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
          </div>

          <!-- Time slots - 12:00 -->
          <div class="grid grid-cols-8 gap-2 mb-1">
            <div class="col-span-1 text-right pr-2 text-sm text-gray-500">12:00</div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
          </div>

          <!-- Time slots - 13:00 -->
          <div class="grid grid-cols-8 gap-2 mb-1">
            <div class="col-span-1 text-right pr-2 text-sm text-gray-500">13:00</div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
          </div>

          <!-- Time slots - 14:00 -->
          <div class="grid grid-cols-8 gap-2 mb-1">
            <div class="col-span-1 text-right pr-2 text-sm text-gray-500">14:00</div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 bg-emerald-100 border-emerald-200">
              <div class="text-xs p-1 text-emerald-800">Estudo</div>
            </div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
          </div>

          <!-- Time slots - 15:00 -->
          <div class="grid grid-cols-8 gap-2 mb-1">
            <div class="col-span-1 text-right pr-2 text-sm text-gray-500">15:00</div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
          </div>

          <!-- Time slots - 16:00 -->
          <div class="grid grid-cols-8 gap-2 mb-1">
            <div class="col-span-1 text-right pr-2 text-sm text-gray-500">16:00</div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 bg-amber-100 border-amber-200">
              <div class="text-xs p-1 text-amber-800">Física</div>
            </div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
          </div>

          <!-- Time slots - 17:00 -->
          <div class="grid grid-cols-8 gap-2 mb-1">
            <div class="col-span-1 text-right pr-2 text-sm text-gray-500">17:00</div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
          </div>

          <!-- Time slots - 18:00 -->
          <div class="grid grid-cols-8 gap-2 mb-1">
            <div class="col-span-1 text-right pr-2 text-sm text-gray-500">18:00</div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
          </div>

          <!-- Time slots - 19:00 -->
          <div class="grid grid-cols-8 gap-2 mb-1">
            <div class="col-span-1 text-right pr-2 text-sm text-gray-500">19:00</div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
          </div>

          <!-- Time slots - 20:00 -->
          <div class="grid grid-cols-8 gap-2 mb-1">
            <div class="col-span-1 text-right pr-2 text-sm text-gray-500">20:00</div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
          </div>

          <div class="grid grid-cols-8 gap-2 mb-1">
            <div class="col-span-1 text-right pr-2 text-sm text-gray-500">21:00</div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
          </div>

          <div class="grid grid-cols-8 gap-2 mb-1">
            <div class="col-span-1 text-right pr-2 text-sm text-gray-500">22:00</div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
          </div>

          <div class="grid grid-cols-8 gap-2 mb-1">
            <div class="col-span-1 text-right pr-2 text-sm text-gray-500">23:00</div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
          </div>
          
          <div class="grid grid-cols-8 gap-2 mb-1">
            <div class="col-span-1 text-right pr-2 text-sm text-gray-500">00:00</div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200"></div>
          </div>
        </div>
      </div>

      <!-- Sidebar for events and exams -->
      <div class="lg:w-80 space-y-6">
        <!-- Add Event Section -->
        <div class="bg-white rounded-lg shadow-sm p-4">
          <h2 class="text-lg font-semibold text-gray-800 mb-4">Adicionar Evento</h2>
          <form class="space-y-4">
            <div>
              <label for="event-title" class="block text-sm font-medium text-gray-700">
                Título
              </label>
              <input
                type="text"
                id="event-title"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-rose-500 focus:ring-rose-500 sm:text-sm"
                placeholder="Ex: Aula de Matemática"
              />
            </div>
            <div>
              <label for="event-type" class="block text-sm font-medium text-gray-700">
                Tipo
              </label>
              <select
                id="event-type"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-rose-500 focus:ring-rose-500 sm:text-sm"
              >
                <option>Aula</option>
                <option>Estudo</option>
                <option>Teste</option>
                <option>Outro</option>
              </select>
            </div>
            <div class="grid grid-cols-2 gap-4">
              <div>
                <label for="event-date" class="block text-sm font-medium text-gray-700">
                  Data
                </label>
                <input
                  type="date"
                  id="event-date"
                  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-rose-500 focus:ring-rose-500 sm:text-sm"
                />
              </div>
              <div>
                <label for="event-time" class="block text-sm font-medium text-gray-700">
                  Hora
                </label>
                <input
                  type="time"
                  id="event-time"
                  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-rose-500 focus:ring-rose-500 sm:text-sm"
                />
              </div>
            </div>
            <div>
              <label for="event-duration" class="block text-sm font-medium text-gray-700">
                Duração (minutos)
              </label>
              <input
                type="number"
                id="event-duration"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-rose-500 focus:ring-rose-500 sm:text-sm"
                placeholder="60"
              />
            </div>
            <button
              type="submit"
              class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-rose-600 hover:bg-rose-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-500"
            >
              Adicionar
            </button>
          </form>
        </div>

        <!-- Exam Summary Section -->
        <div class="bg-white rounded-lg shadow-sm p-4">
          <h2 class="text-lg font-semibold text-gray-800 mb-4">Próximos Exames</h2>
          <div class="space-y-3">
            <div class="p-3 bg-rose-50 rounded-md border border-rose-100">
              <div class="font-medium text-rose-800">Matemática</div>
              <div class="text-sm text-rose-600">15 de Maio, 2024</div>
              <div class="mt-1 flex items-center text-xs text-rose-700">
                <span>Tempo de estudo: 12h / 20h</span>
                <div class="ml-auto w-16 h-2 bg-gray-200 rounded-full overflow-hidden">
                  <div class="bg-rose-500 h-full" style="width: 60%"></div>
                </div>
              </div>
            </div>

            <div class="p-3 bg-emerald-50 rounded-md border border-emerald-100">
              <div class="font-medium text-emerald-800">Física</div>
              <div class="text-sm text-emerald-600">22 de Maio, 2024</div>
              <div class="mt-1 flex items-center text-xs text-emerald-700">
                <span>Tempo de estudo: 8h / 15h</span>
                <div class="ml-auto w-16 h-2 bg-gray-200 rounded-full overflow-hidden">
                  <div class="bg-emerald-500 h-full" style="width: 53%"></div>
                </div>
              </div>
            </div>

            <div class="p-3 bg-amber-50 rounded-md border border-amber-100">
              <div class="font-medium text-amber-800">Química</div>
              <div class="text-sm text-amber-600">29 de Maio, 2024</div>
              <div class="mt-1 flex items-center text-xs text-amber-700">
                <span>Tempo de estudo: 5h / 18h</span>
                <div class="ml-auto w-16 h-2 bg-gray-200 rounded-full overflow-hidden">
                  <div class="bg-amber-500 h-full" style="width: 28%"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- Footer -->
  <footer class="bg-white border-t border-gray-200 py-4">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <p class="text-center text-sm text-gray-500">&copy; 2024 SyncHours. Todos os direitos reservados.</p>
    </div>
  </footer>
</body>
</html>