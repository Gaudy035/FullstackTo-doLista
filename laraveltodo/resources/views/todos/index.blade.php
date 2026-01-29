<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        @vite(['resources/css/app.css', 'resources/js/app.ts'])
        <title>Document</title>
    </head>
    <body class="bg-black flex flex-col min-h-screen">
        
        <!-- Navbar -->
         
        <div
            class="flex justify-between items-center pl-4 pr-6 bg-neutral-800 text-white h-16"
        >
            <div class="h-full flex justify-start font-bold">
                <img src="{{ asset('images/logo.png') }}" alt="" />
                <p class="flex h-full items-center">To-Do List</p>
            </div>
            
            <button
                id="add_btn"
                class="cursor-pointer flex justify-center items-center rounded-full border border-white py-1.5 px-2.5 hover:scale-110 transition duration-250"
            >
                Dodaj
            </button>
        </div>
        
        <!-- main -->
         
        <div class="flex-1 flex">
            <div
                class="flex flex-1 flex-col justify-center items-center bg-neutral-200"
            >
                @foreach($todos as $todo)
                <div
                    class="todo_box flex flex-col justify-center items-center rounded-2xl py-4 px-6  w-180 mb-8"
                    data-is_completed="{{ $todo->is_completed }}"
                >
                    <div
                        class="text-xl mb-2 flex w-full justify-between items-start px-6"
                    >
                        <h1>{{ $todo->title }}</h1>
                        <h2>do: {{ $todo->due }}</h2>
                    </div>
                    <p class="flex justify-center items-center w-full">
                        {{ $todo->desc }}
                    </p>
                    <div
                        class="flex w-full mr-8 justify-end items-center gap-4 mt-4"
                    >
                        <form action="{{ route('todos.complete', $todo->id) }}" method="post" id="comp_form">
                            @csrf
                            @method('PATCH')
                            <button
                            type="submit"
                            class="delete_btn text-green-400 hover:scale-110 duration-250"
                            onclick="return confirm('Czy napewno chcesz oznaczyc ten wpis jako ukonczony?')"
                            >
                            Ukończ
                            </button>
                        </form>
                        <button
                            type="button"
                            data-id="{{ $todo->id }}"
                            data-title="{{ $todo->title }}"
                            data-desc="{{ $todo->desc }}"
                            data-due="{{ $todo->due }}"
                            class="edit_btn text-blue-400 hover:scale-110 duration-250"
                        >
                            Edytuj
                        </button>
                        <form action="{{ route('todos.destroy', $todo->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button
                            type="submit"
                            class="delete_btn text-red-400 hover:scale-110 duration-250"
                            onclick="return confirm('Czy napewno chcesz USUNĄĆ ten wpis?')"
                            >
                            Usuń
                            </button>
                        </form>
                    </div>
                </div>
                @endforeach
                @if ($errors->any())
                    <ul class="flex justify-center items-center flex-col mt-6">
                        @foreach($errors->all() as $error)
                        <li class="text-red-600">{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
        
        <!-- edit -->
         
        <div id="modal" class="w-screen h-screen hidden absolute">
            <div id="modal_bg" class="inset-0 bg-black/50 absolute">
                <div
                    id="modal_content"
                    class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 flex flex-col px-26 pb-18 pt-16 justify-start items-center gap-4 bg-neutral-100 rounded-2xl"
                >
                    <h1 class="text-lg">Edytuj Wpis</h1>
                    <form id="edit_form" action="" method="post" class="flex flex-col gap-4">
                        @csrf
                        @method('PUT')
                        <input
                            type="text"
                            id="title"
                            name="title"
                            placeholder="Nazwa..."
                            class="rounded-2xl border px-2.5 py-1.5 focus:scale-110 transition duration-250"
                        />
                        <textarea
                            id="desc"
                            name="desc"
                            placeholder="Opis..."
                            class="resize-none rounded-2xl border px-2.5 py-1.5 focus:scale-110 transition duration-250"
                        ></textarea>
                        <input
                            type="date"
                            id="due"
                            name="due"
                            class="rounded-2xl border px-2.5 py-1.5 focus:scale-110 transition duration-250"
                        />
                        <button
                            type="submit"
                            id="save"
                            name="save"
                            class="bg-neutral-300 text-neutral-900 py-1 px-0.5 border rounded-xl hover:bg-neutral-200 hover:text-neutral-700 transition"
                        >
                            Zapisz
                        </button>
                    </form>
                </div>
            </div>
        </div>
        
        <!-- add -->
         
        <div id="modal_add" class="w-screen h-screen hidden absolute">
            <div id="modal_add_bg" class="inset-0 bg-black/50 absolute">
                <div
                    id="modal_add_content"
                    class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 flex flex-col px-26 pb-18 pt-16 justify-start items-center gap-4 bg-neutral-100 rounded-2xl"
                >
                    <h1 class="text-lg">Dodaj Wpis</h1>
                    <form
                        action="{{ route('todos.store') }}"
                        method="post"
                        class="flex flex-col gap-4"
                    >
                        @csrf
                        <input
                            type="text"
                            
                            name="title"
                            placeholder="Nazwa..."
                            class="rounded-2xl border px-2.5 py-1.5 focus:scale-110 transition duration-250"
                        />
                        <textarea
                            
                            name="desc"
                            placeholder="Opis..."
                            class="resize-none rounded-2xl border px-2.5 py-1.5 focus:scale-110 transition duration-250"
                        ></textarea>
                        <input
                            type="date"
                            
                            name="due"
                            class="rounded-2xl border px-2.5 py-1.5 focus:scale-110 transition duration-250"
                        />
                        <button
                            type="submit"
                            
                            name="save"
                            class="bg-neutral-300 text-neutral-900 py-1 px-0.5 border rounded-xl hover:bg-neutral-200 hover:text-neutral-700 transition"
                        >
                            Zapisz
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <footer
            class="flex justify-start items-center text-white px-4 bg-neutral-800 h-16"
        >
        </footer>
    </body>
</html>