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
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-semibold text-gray-800">Weekly Calendar</h2>
                <form action="{{ route('test.shell') }}" method="get">
                  @csrf
                  <button type="submit" class="bg-rose-600 text-white px-2 py-1 rounded hover:bg-rose-700">
                    Call Gemini
                  </button>
                </form>
            </div>

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

          <!-- Bar for Sleep Time -->
          <div class="grid grid-cols-8 gap-2 mb-1 items-center">
            <div class="col-span-1"></div>
            <div class="col-span-7 h-[22px] bg-blue-200 rounded-full text-gray-600 text-xs flex justify-center items-center align-middle">Sleep</div>
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

          <!-- Bar for Sleep time -->
          
          <div class="grid grid-cols-8 gap-2 mb-1 items-center">
            <div class="col-span-1"></div>
            <div class="col-span-7 h-[22px] bg-blue-200 rounded-full text-gray-600 text-xs flex justify-center items-center text-center">Sleep</div>
          </div>

        </div>
      </div>

      <!-- Sidebar for events -->
    <div class="lg:w-80 space-y-6">
        <div class="bg-white rounded-lg shadow-sm p-4">
          <h2 class="text-lg font-semibold text-gray-800 mb-4">Add Test</h2>
          <form id="add-event-form" class="space-y-4" action="{{ route('user.saveExam') }}" method="POST">
            @csrf
            <div>
                <label for="event-title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" id="event-title" name="title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm" placeholder="Ex: Mathematics" required>
            </div>
            <div>
                <label for="event-time" class="block text-sm font-medium text-gray-700">Time</label>
                <select id="event-time" name="time" class="mt-1 block w-full rounded-md border border-gray-300 bg-white shadow-md px-3 py-2 focus:border-rose-500 focus:ring-rose-500 sm:text-sm" required>
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
                </select>
            </div>
            <div>
                <label for="event-day" class="block text-sm font-medium text-gray-700">Day</label>
                <select id="event-day" name="day" class="mt-1 block w-full rounded-md border border-gray-300 bg-white shadow-md px-3 py-2 focus:border-rose-500 focus:ring-rose-500 sm:text-sm" required>
                    <option value="Mon">Monday</option>
                    <option value="Tue">Tuesday</option>
                    <option value="Wed">Wednesday</option>
                    <option value="Thu">Thursday</option>
                    <option value="Fri">Friday</option>
                    <option value="Sat">Saturday</option>
                    <option value="Sun">Sunday</option>
                </select>
            </div>
            <button type="submit" class="w-full bg-rose-600 text-white p-2 rounded-md">Add Exam</button>
        </form>
        
        </div>
            <div class="bg-white rounded-lg shadow-sm p-4">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">Next Exams</h2>
                <div class="space-y-3">
                    @forelse ($userExams as $exam)
                        @php
                            $color = 'rose';
                            $diasSemana = [
                                'Mon' => 'Monday',
                                'Tue' => 'Tuesday',
                                'Wed' => 'Wednesday',
                                'Thu' => 'Thursday',
                                'Fri' => 'Friday',
                                'Sat' => 'Saturday',
                                'Sun' => 'Sunday',
                            ];
                    
                            // Simulação de progresso — substituir isto com dados reais depois
                            $estudoAtual = rand(0, 20); // horas estudadas
                            $estudoTotal = 20; // total necessário
                            $progresso = min(100, round(($estudoAtual / $estudoTotal) * 100));
                        @endphp
                
                        <div class="p-3 bg-{{ $color }}-50 rounded-md border border-{{ $color }}-100">
                            <div class="font-medium text-{{ $color }}-800">{{ $exam['title'] }}</div>
                            <div class="text-sm text-{{ $color }}-600">
                                {{ $diasSemana[$exam['day']] ?? $exam['day'] }}, at {{ $exam['time'] }}
                            </div>
                            <div class="mt-1 flex items-center text-xs text-{{ $color }}-700">
                                <span>Tempo de estudo: {{ $estudoAtual }}h / {{ $estudoTotal }}h</span>
                                <div class="ml-auto w-16 h-2 bg-gray-200 rounded-full overflow-hidden">
                                    <div class="bg-{{ $color }}-500 h-full transition-all duration-300" style="width: {{ $progresso }}%"></div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-gray-500 text-sm">No exams added.</div>
                    @endforelse
                </div>
            </div>
            <div class="bg-white rounded-lg shadow-sm p-4 mt-6">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">Legend</h2>
                <div class="space-y-2 text-sm text-gray-700">
                    <div class="flex items-center gap-2">
                        <span class="w-4 h-4 bg-rose-100 rounded-sm inline-block"></span>
                        <span>Exams</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="w-4 h-4 bg-emerald-100 rounded-sm inline-block"></span>
                        <span>Study</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="w-4 h-4 bg-blue-300 rounded-sm inline-block"></span>
                        <span>Busy Schedule</span>
                    </div>
                </div>
            </div>
        </div>

        
        
        </div>
    </div>
  </main>

  <script>
    $(document).ready(function() {
      // Parse PHP data passed to view
      const userExams = @json($userExams ?? []);
      const userConfig = @json($userConfig ?? []);
      const aiOutput = @json($aiOutput ?? []);
      
      console.log("Plano de estudo gerado pela IA:", aiOutput);
    
      const activityColors = {
        'Aulas': 'bg-indigo-200',
        'Sesta': 'bg-indigo-200',
        'Dormir': 'bg-indigo-200',
        'Estudo': 'bg-indigo-200',
        'default': 'bg-indigo-200'
      };
    
      // Limpar todos os slots primeiro
      $('.event-slot').removeClass('has-event').empty();
    
      // Função para converter tempo em horas (8:30 → 8.5)
      function timeToHours(time) {
        const [hours, minutes] = time.split(':').map(Number);
        return hours + (minutes / 60);
      }
    
      // Mapeamento de dias inglês → português
      const dayMapping = {
        'monday': 'Mon',
        'tuesday': 'Tue',
        'wednesday': 'Wed',
        'thursday': 'Thu',
        'friday': 'Fri',
        'saturday': 'Sat',
        'sunday': 'Sun'
      };
    
      // 1. Primeiro processar os exames do usuário (userExams)
      userExams.forEach(exam => {
        const slot = $(`.event-slot[data-time="${exam.time}"][data-day="${exam.day}"]`);
        if (slot.length) {
          slot.html(`
            <div class="h-full bg-rose-100 rounded p-1 text-xs overflow-hidden">
              <div class="font-medium text-rose-800">${exam.title}</div>
            </div>
          `);
          slot.addClass('has-event');
        }
      });
    
      // 2. Processar as configurações do usuário (userConfig)
      Object.entries(userConfig).forEach(([day, activities]) => {
        const dayCode = dayMapping[day];
        if (!dayCode || !Array.isArray(activities)) return;
    
        activities.forEach(activity => {
          if (!activity.activity || !activity.start || !activity.end) return;
          
          const startHour = timeToHours(activity.start);
          const endHour = timeToHours(activity.end);
          const colorClass = activityColors[activity.activity] || activityColors['default'];
    
          for (let h = Math.floor(startHour); h < Math.ceil(endHour); h++) {
            if (h < 8 || h > 23) continue;
            const timeStr = `${h}:00`;
            const slot = $(`.event-slot[data-time="${timeStr}"][data-day="${dayCode}"]`);
            
            if (slot.length && !slot.hasClass('has-event')) {
              slot.html(`
                <div class="h-full ${colorClass} rounded p-1 text-xs overflow-hidden">
                  <div class="font-medium text-gray-800">${activity.activity}</div>
                </div>
              `);
              slot.addClass('has-event');
            }
          }
        });
      });
    
      // 3. Processar o plano de estudos da IA (aiOutput)
      Object.entries(aiOutput).forEach(([day, sessions]) => {
        const dayCode = dayMapping[day];
        if (!dayCode || !Array.isArray(sessions)) return;
    
        sessions.forEach(session => {
          // Extrair informações da sessão
          const examName = session.exam || 'Estudo';
          const startTime = session.start;
          const endTime = session.end;
          
          if (!startTime || !endTime) return;
          
          const startHour = timeToHours(startTime);
          const endHour = timeToHours(endTime);
    
          console.log(`Adicionando sessão para ${examName} em ${dayCode} das ${startTime} às ${endTime}`);
    
          // Para cada hora dentro do intervalo
          for (let h = Math.floor(startHour); h < Math.ceil(endHour); h++) {
            if (h < 8 || h > 23) continue;
            
            const timeStr = `${h}:00`;
            const slot = $(`.event-slot[data-time="${timeStr}"][data-day="${dayCode}"]`);
            
            if (slot.length) {
              // Se já tem um evento, adiciona em uma nova linha
              if (slot.hasClass('has-event')) {
                const existingContent = slot.html();
                slot.html(`${existingContent}<div class="mt-1 text-xs text-green-700">${examName}</div>`);
              } 
              // Se não tem evento, cria um novo
              else {
                slot.html(`
                  <div class="h-full bg-green-200 rounded p-1 text-xs overflow-hidden">
                    <div class="font-medium text-gray-800">${examName}</div>
                  </div>
                `);
                slot.addClass('has-event');
              }
            }
          }
        });
      });
    
      // Opcional: Exibir o plano de estudos formatado em algum elemento
      const studyPlanContainer = document.getElementById("studyPlanContainer");
      if (studyPlanContainer) {
        let html = '<h3 class="text-lg font-semibold mb-2">Plano de Estudos</h3>';
        
        Object.entries(aiOutput).forEach(([day, sessions]) => {
          if (sessions && sessions.length > 0) {
            const dayName = {
              'monday': 'Segunda-feira',
              'tuesday': 'Terça-feira',
              'wednesday': 'Quarta-feira',
              'thursday': 'Quinta-feira',
              'friday': 'Sexta-feira',
              'saturday': 'Sábado',
              'sunday': 'Domingo'
            }[day] || day;
            
            html += `<div class="mb-3"><strong>${dayName}</strong></div>`;
            
            sessions.forEach(session => {
              html += `
                <div class="ml-4 mb-2 text-sm">
                  ${session.start} - ${session.end}: ${session.exam}
                </div>
              `;
            });
          }
        });
        
        studyPlanContainer.innerHTML = html;
      }
    });
    </script>
</body>
</html>
