<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mon Kanban Laravel</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-900 antialiased font-sans">

    <div class="max-w-6xl mx-auto py-10 px-4">
        
        <header class="mb-5 text-center">
            <h1 class="text-4xl font-extrabold text-indigo-600 tracking-tight">Tableau Kanban</h1>
        </header>

        <div class="max-w-2xl mx-auto mb-12">
            <form action="/tasks" method="POST" class="bg-white p-6 rounded-2xl shadow-sm border border-gray-200">
                @csrf
                <div class="flex flex-col gap-4">
                    <input type="text" name="title" placeholder="Titre de la tâche..." required 
                        class="w-full border-gray-200 rounded-xl p-3 bg-gray-50 focus:ring-2 focus:ring-indigo-500 outline-none border text-sm">
                    
                    <textarea name="description" placeholder="Description détaillée (optionnel)..." 
                        class="w-full border-gray-200 rounded-xl p-3 bg-gray-50 focus:ring-2 focus:ring-indigo-500 outline-none border text-sm h-24"></textarea>
                    
                    <button type="submit" class="w-full bg-indigo-600 text-white font-bold py-3 rounded-xl hover:bg-indigo-700 transition duration-200 shadow-lg shadow-indigo-200">
                        + Créer le ticket
                    </button>
                </div>
            </form>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
            <div class="flex flex-col gap-4">
                <div class="flex items-center justify-between px-2">
                    <h2 class="font-bold text-gray-600 uppercase text-xs tracking-widest">📋 À Faire</h2>
                    <span class="bg-gray-200 text-gray-600 text-[10px] px-2 py-0.5 rounded-full font-bold">{{ $todo->count() }}</span>
                </div>
                <div class="bg-gray-100 p-3 rounded-2xl min-h-[400px] border-2 border-dashed border-gray-200">
                    @foreach ($todo as $task)
                        <div class="bg-white p-4 rounded-xl shadow-sm border-l-4 border-gray-400 mb-4 group hover:shadow-md transition">
                            <h3 class="font-bold text-gray-800 text-sm">{{ $task->title }}</h3>
                            <p class="text-xs text-gray-500 mt-2 leading-relaxed">{{ $task->description }}</p>
                            <div class="mt-4 pt-3 border-t border-gray-50 flex justify-between items-center">
                                <span class="text-[10px] text-gray-400 italic">Créé : {{ $task->created_at->format('d/m H:i') }}</span>
                                <form action="/tasks/{{ $task->id }}/status" method="POST">
                                    @csrf @method('PATCH')
                                    <input type="hidden" name="status" value="en cours">
                                    <button class="text-indigo-600 font-bold text-[10px] hover:underline uppercase tracking-tighter">Démarrer →</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="flex flex-col gap-4">
                <div class="flex items-center justify-between px-2">
                    <h2 class="font-bold text-blue-600 uppercase text-xs tracking-widest">⏳ En Cours</h2>
                    <span class="bg-blue-100 text-blue-600 text-[10px] px-2 py-0.5 rounded-full font-bold">{{ $doing->count() }}</span>
                </div>
                <div class="bg-blue-50/50 p-3 rounded-2xl min-h-[400px] border-2 border-dashed border-blue-100">
                    @foreach ($doing as $task)
                        <div class="bg-white p-4 rounded-xl shadow-sm border-l-4 border-blue-500 mb-4 hover:shadow-md transition">
                            <h3 class="font-bold text-gray-800 text-sm">{{ $task->title }}</h3>
                            <div class="mt-4 pt-3 border-t border-gray-50 flex justify-between items-center">
                                <span class="text-[10px] text-blue-400">⚡ {{ $task->updated_at->diffForHumans() }}</span>
                                <form action="/tasks/{{ $task->id }}/status" method="POST">
                                    @csrf @method('PATCH')
                                    <input type="hidden" name="status" value="terminée">
                                    <button class="text-green-600 font-bold text-[10px] hover:underline uppercase tracking-tighter text-right">Terminer ✔</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="flex flex-col gap-4">
                <div class="flex items-center justify-between px-2">
                    <h2 class="font-bold text-green-600 uppercase text-xs tracking-widest">✅ Terminées</h2>
                    <span class="bg-green-100 text-green-600 text-[10px] px-2 py-0.5 rounded-full font-bold">{{ $done->count() }}</span>
                </div>
                <div class="bg-green-50/50 p-3 rounded-2xl min-h-[400px] border-2 border-dashed border-green-100">
                    @foreach ($done as $task)
                        <div class="bg-white p-4 rounded-xl shadow-sm border-l-4 border-green-500 mb-4 opacity-70 transition group">
                            <h3 class="font-bold text-gray-400 text-sm line-through">{{ $task->title }}</h3>
                            <div class="mt-4 text-right">
                                <span class="text-[10px] text-green-400 font-medium tracking-tight">Terminé le {{ $task->updated_at->format('d/m') }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>

</body>
</html>