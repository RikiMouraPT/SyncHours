<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SyncHours</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Add jQuery for ease -->
</head>
<body class="min-h-screen bg-gray-50 flex flex-col">

    <header class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                
                <a href="{{ route('welcome') }}" class="text-rose-600 text-2xl font-bold">
                    SyncHours
                </a>
                
                <a href="{{ route('user.index') }}" class="text-gray-600 hover:text-rose-600">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" 
                    stroke-linecap="round" stroke-linejoin="round" width="36" height="36" stroke-width="1.25"> 
                    <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path> 
                    <path d="M12 10m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path> 
                    <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855"></path> 
                    </svg> 
                </a>

            </div>
        </div>
    </header>

  <!-- Main Content -->
  <main class="flex-1 max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8 py-6">
    <div class="flex flex-col lg:flex-row gap-6">
      <!-- Calendar Section -->
      <div class="lg:flex-1">
        <div class="bg-white rounded-lg shadow-sm p-4" id="calendar">
          <h2 class="text-lg font-semibold text-gray-800 mb-4">Weakly Calender</h2>

          <!-- Days of the week -->
          <div class="grid grid-cols-8 gap-2 mb-2">
            <div class="col-span-1"></div>
            <div class="col-span-1 text-center font-medium text-gray-600">Mon</div>
            <div class="col-span-1 text-center font-medium text-gray-600">Tue</div>
            <div class="col-span-1 text-center font-medium text-gray-600">Wed</div>
            <div class="col-span-1 text-center font-medium text-gray-600">Thu</div>
            <div class="col-span-1 text-center font-medium text-gray-600">Fri</div>
            <div class="col-span-1 text-center font-medium text-gray-600">Sat</div>
            <div class="col-span-1 text-center font-medium text-gray-600">Sun</div>
          </div>

          <!-- Bar for readability -->
          <div class="grid grid-cols-8 gap-2 mb-1 items-center">
            <div class="col-span-1"></div>
            <div class="col-span-7 h-[22px] bg-blue-200 rounded-full text-gray-600 flex justify-center align-middle">Dormir</div>
          </div>

          <!-- Time slots - Sample for 8:00 -->
          <div class="grid grid-cols-8 gap-2 mb-1">
            <div class="col-span-1 text-right pr-2 text-sm text-gray-500">8:00</div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="8:00" data-day="Mon"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="8:00" data-day="Tue"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="8:00" data-day="Wed"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="8:00" data-day="Thu"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="8:00" data-day="Fri"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="8:00" data-day="Sat"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="8:00" data-day="Sun"></div>
          </div>

          <!-- More time slots go here -->

          <div class="grid grid-cols-8 gap-2 mb-1">
            <div class="col-span-1 text-right pr-2 text-sm text-gray-500">9:00</div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="9:00" data-day="Mon"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="9:00" data-day="Tue"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="9:00" data-day="Wed"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="9:00" data-day="Thu"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="9:00" data-day="Fri"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="9:00" data-day="Sat"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="9:00" data-day="Sun"></div>
          </div>
          <div class="grid grid-cols-8 gap-2 mb-1">
            <div class="col-span-1 text-right pr-2 text-sm text-gray-500">10:00</div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="10:00" data-day="Mon"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="10:00" data-day="Tue"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="10:00" data-day="Wed"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="10:00" data-day="Thu"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="10:00" data-day="Fri"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="10:00" data-day="Sat"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="10:00" data-day="Sun"></div>
          </div>
          <div class="grid grid-cols-8 gap-2 mb-1">
            <div class="col-span-1 text-right pr-2 text-sm text-gray-500">11:00</div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="11:00" data-day="Mon"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="11:00" data-day="Tue"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="11:00" data-day="Wed"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="11:00" data-day="Thu"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="11:00" data-day="Fri"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="11:00" data-day="Sat"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="11:00" data-day="Sun"></div>
          </div>
          <div class="grid grid-cols-8 gap-2 mb-1">
            <div class="col-span-1 text-right pr-2 text-sm text-gray-500">12:00</div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="12:00" data-day="Mon"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="12:00" data-day="Tue"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="12:00" data-day="Wed"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="12:00" data-day="Thu"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="12:00" data-day="Fri"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="12:00" data-day="Sat"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="12:00" data-day="Sun"></div>
          </div>
          <div class="grid grid-cols-8 gap-2 mb-1">
            <div class="col-span-1 text-right pr-2 text-sm text-gray-500">13:00</div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="13:00" data-day="Mon"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="13:00" data-day="Tue"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="13:00" data-day="Wed"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="13:00" data-day="Thu"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="13:00" data-day="Fri"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="13:00" data-day="Sat"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="13:00" data-day="Sun"></div>
          </div>
          <div class="grid grid-cols-8 gap-2 mb-1">
            <div class="col-span-1 text-right pr-2 text-sm text-gray-500">14:00</div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="14:00" data-day="Mon"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="14:00" data-day="Tue"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="14:00" data-day="Wed"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="14:00" data-day="Thu"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="14:00" data-day="Fri"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="14:00" data-day="Sat"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="14:00" data-day="Sun"></div>
          </div>
          <div class="grid grid-cols-8 gap-2 mb-1">
            <div class="col-span-1 text-right pr-2 text-sm text-gray-500">15:00</div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="15:00" data-day="Mon"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="15:00" data-day="Tue"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="15:00" data-day="Wed"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="15:00" data-day="Thu"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="15:00" data-day="Fri"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="15:00" data-day="Sat"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="15:00" data-day="Sun"></div>
          </div>
          <div class="grid grid-cols-8 gap-2 mb-1">
            <div class="col-span-1 text-right pr-2 text-sm text-gray-500">16:00</div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="16:00" data-day="Mon"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="16:00" data-day="Tue"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="16:00" data-day="Wed"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="16:00" data-day="Thu"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="16:00" data-day="Fri"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="16:00" data-day="Sat"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="16:00" data-day="Sun"></div>
          </div>
          <div class="grid grid-cols-8 gap-2 mb-1">
            <div class="col-span-1 text-right pr-2 text-sm text-gray-500">17:00</div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="17:00" data-day="Mon"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="17:00" data-day="Tue"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="17:00" data-day="Wed"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="17:00" data-day="Thu"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="17:00" data-day="Fri"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="17:00" data-day="Sat"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="17:00" data-day="Sun"></div>
          </div>
          <div class="grid grid-cols-8 gap-2 mb-1">
            <div class="col-span-1 text-right pr-2 text-sm text-gray-500">18:00</div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="18:00" data-day="Mon"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="18:00" data-day="Tue"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="18:00" data-day="Wed"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="18:00" data-day="Thu"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="18:00" data-day="Fri"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="18:00" data-day="Sat"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="18:00" data-day="Sun"></div>
          </div>
          <div class="grid grid-cols-8 gap-2 mb-1">
            <div class="col-span-1 text-right pr-2 text-sm text-gray-500">19:00</div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="19:00" data-day="Mon"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="19:00" data-day="Tue"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="19:00" data-day="Wed"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="19:00" data-day="Thu"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="19:00" data-day="Fri"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="19:00" data-day="Sat"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="19:00" data-day="Sun"></div>
          </div>

          <div class="grid grid-cols-8 gap-2 mb-1">
            <div class="col-span-1 text-right pr-2 text-sm text-gray-500">20:00</div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="20:00" data-day="Mon"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="20:00" data-day="Tue"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="20:00" data-day="Wed"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="20:00" data-day="Thu"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="20:00" data-day="Fri"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="20:00" data-day="Sat"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="20:00" data-day="Sun"></div>
          </div>

          <div class="grid grid-cols-8 gap-2 mb-1">
            <div class="col-span-1 text-right pr-2 text-sm text-gray-500">21:00</div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="21:00" data-day="Mon"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="21:00" data-day="Tue"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="21:00" data-day="Wed"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="21:00" data-day="Thu"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="21:00" data-day="Fri"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="21:00" data-day="Sat"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="21:00" data-day="Sun"></div>
          </div>

          <div class="grid grid-cols-8 gap-2 mb-1">
            <div class="col-span-1 text-right pr-2 text-sm text-gray-500">22:00</div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="22:00" data-day="Mon"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="22:00" data-day="Tue"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="22:00" data-day="Wed"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="22:00" data-day="Thu"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="22:00" data-day="Fri"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="22:00" data-day="Sat"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="22:00" data-day="Sun"></div>
          </div>

          <div class="grid grid-cols-8 gap-2 mb-1">
            <div class="col-span-1 text-right pr-2 text-sm text-gray-500">23:00</div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="23:00" data-day="Mon"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="23:00" data-day="Tue"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="23:00" data-day="Wed"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="23:00" data-day="Thu"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="23:00" data-day="Fri"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="23:00" data-day="Sat"></div>
            <div class="col-span-1 h-12 rounded border border-gray-200 event-slot" data-time="23:00" data-day="Sun"></div>
          </div>
          <div class="grid grid-cols-8 gap-2 mb-1 items-center">
            <div class="col-span-1"></div>
            <div class="col-span-7 h-[22px] bg-blue-200 rounded-full text-gray-600 flex justify-center align-middle">Dormir</div>
          </div>
        </div>
      </div>

      <!-- Sidebar for events -->
      <div class="lg:w-80 space-y-6">
        <div class="bg-white rounded-lg shadow-sm p-4">
          <h2 class="text-lg font-semibold text-gray-800 mb-4">Add Test</h2>
          <form id="add-event-form" class="space-y-4">
            <div>
              <label for="event-title" class="block text-sm font-medium text-gray-700">Title</label>
              <input type="text" id="event-title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm" placeholder="Ex: Mathematics">
            </div>
            <div>
              <label for="event-time" class="block text-sm font-medium text-gray-700">Time</label>
              <select id="event-time" class="mt-1 block w-full rounded-md border border-gray-300 bg-white shadow-md px-3 py-2 focus:border-rose-500 focus:ring-rose-500 sm:text-sm">
                <option value="8:00">8:00</option>
                <option value="9:00">9:00</option>
                <option value="10:00">10:00</option>
                <option value="11:00">11:00</option>
                <option value="12:00">12:00</option>
                <option value="13:00">13:00</option>
                <option value="14:00">14:00</option>
                <option value="15:00">15:00</option>
                <option value="16:00">16:00</option>
                <option value="17:00">17:00</option>
                <option value="18:00">18:00</option>
                <option value="19:00">19:00</option>
                <option value="20:00">20:00</option>
                <option value="21:00">21:00</option>
                <option value="22:00">22:00</option>
                <option value="23:00">23:00</option>
                <!-- Add more time options as needed -->
              </select>
            </div>
            <div>
              <label for="event-day" class="block text-sm font-medium text-gray-700">Day</label>
              <select id="event-day" class="mt-1 block w-full rounded-md border border-gray-300 bg-white shadow-md px-3 py-2 focus:border-rose-500 focus:ring-rose-500 sm:text-sm">
                <option value="Mon">Monday</option>
                <option value="Tue">Tuesday</option>
                <option value="Wed">Wednesday</option>
                <option value="Thu">Thursday</option>
                <option value="Fri">Friday</option>
                <option value="Sat">Saturday</option>
                <option value="Sun">Sunday</option>
              </select>
            </div>
            <button type="submit" class="w-full bg-rose-600 text-white p-2 rounded-md">Add Test</button>
          </form>
        </div>
          <!-- Exam Summary Section -->
          <div class="bg-white rounded-lg shadow-sm p-4">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Next Tests</h2>
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
    </div>
  </main>

  <script>
    $(document).ready(function () {
      // Handle event form submission
      $("#add-event-form").submit(function (e) {
        e.preventDefault();

        // Get values from the form
        const title = $("#event-title").val();
        const time = $("#event-time").val();
        const day = $("#event-day").val();

        // Find the correct time slot and add the event
        const eventSlot = $(`.event-slot[data-time="${time}"][data-day="${day}"]`);
        
        if (eventSlot.length > 0) {
          eventSlot.html(`<div class="text-xs p-1 text-rose-800">${title}</div>`);
          eventSlot.addClass('bg-rose-100'); // Style the event
        } else {
          alert("Selecione um horário válido para o evento.");
        }

        // Clear the form
        $(this).trigger("reset");
      });
    });
  </script>
</body>
</html>
