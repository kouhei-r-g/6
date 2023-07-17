<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ホーム
        </h2>
    </x-slot>

    @if (session('errors'))
        <div x-data="{ showAlert: true }" x-show="showAlert" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            @foreach($errors->all() as $error)
                <span class="block sm:inline">{{ $error }}</span>
            @endforeach
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
            <svg @click="showAlert = false" class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
            </span>
        </div>
    @endif
    <div class="py-3 flex justify-center">
        <div class="max-w-7xl w-3/5 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-5 text-gray-900">
                    <form method="POST" action="/posts">
                        @csrf
                        <input type="text" name="body" placeholder="いまどうしてる？" class="m-1 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">

                        <div class="text-right mt-3">
                            <input type="submit" class="text-right cursor-pointer m-1 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" value="つぶやく">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="py-3 flex justify-center">
        <div class="max-w-7xl w-3/5 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="text-gray-900">
                    <ul>
                        @foreach ($posts as $post)
                            <li class="p-4 border-b border-solid border-gray-300">
                                <div class="flex flex-row justify-between mb-5">
                                    <div class="font-bold">
                                        {{ $post->user->name }}
                                    </div>
                                    <div>
                                        {{ $post->created_at->format('Y/m/d h:i') }}
                                    </div>
                                </div>
                                <div class="flex flex-row justify-between">
                                    <div>
                                        {{ $post->body }}
                                    </div>
                                    <div>
                                        @if($post->user->id === Auth::id())
                                            <form method="POST" action="/posts/{{ $post->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" type="submit">削除</button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
