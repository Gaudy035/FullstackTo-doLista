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
            class="flex justify-start items-center px-4 bg-neutral-800 text-white h-16"
        >
            <!-- logo -->
            <div class="h-full flex justify-start font-bold">
                <img src="{{ asset('images/logo.png') }}" alt="" />
                <p class="flex h-full items-center">To-Do List</p>
            </div>
            <!-- logo -->
        </div>
        <!-- Navbar -->
        <!-- main -->
        <div class="flex-1 flex">
            <!-- left -->
            <div
                class="flex flex-1 flex-col justify-center items-center bg-neutral-200"
            >
                <!-- foreach (todos as todo) -->
                <div
                    class="flex flex-col justify-center items-center rounded-2xl py-4 px-6 bg-neutral-50 w-180"
                >
                    <div
                        class="text-xl mb-2 flex w-full justify-between items-start px-6"
                    >
                        <h1>Tytul</h1>
                        <h2>do: 00-00-0000</h2>
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Qui consequatur eum similique repellendus dolor
                        accusamus
                    </p>
                    <div
                        class="flex w-full mr-8 justify-end items-center gap-4 mt-4"
                    >
                        <button
                            type="button"
                            class="edit_btn text-blue-400 hover:scale-105 duration-250"
                        >
                            Edytuj
                        </button>
                        <button
                            type="button"
                            class="delete_btn text-red-400 hover:scale-105 duration-250"
                        >
                            Usuń
                        </button>
                    </div>
                </div>
                <!-- endforeach -->
            </div>
            <!-- left -->
            <!-- right -->
            <!-- right -->
        </div>
        <!-- main -->
        <div id="modal" class="w-screen h-screen hidden absolute">
            <div id="modal_bg" class="inset-0 bg-black/50 absolute">
                <div
                    id="modal_content"
                    class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 flex flex-col px-52 pb-36 pt-32 justify-start items-center gap-4 bg-neutral-100 rounded-2xl"
                >
                    <h1 class="text-lg">Dodaj Wpis</h1>
                    <form action="" method="post" class="flex flex-col gap-4">
                        @csrf
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
        <!-- footer -->
        <footer
            class="flex justify-start items-center text-white px-4 bg-neutral-800 h-16"
        >
            Autor:
        </footer>
        <!-- footer -->
    </body>
</html>
