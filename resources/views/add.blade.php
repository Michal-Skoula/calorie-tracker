<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Add entries
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="/add" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-5">
                            <label for="food_image">Add food image</label>
                            <input class="block" type="file" name="food_image" id="food_image">
                        </div>
                        <div class="mb-5">
                            <label for="food_description">Add meal description (optional)</label>
                            <input type="text" name="food_description" id="food_description" placeholder="Apple pie with raisins" class="text-black block">
                        </div>
                        <div class="mb-5">
                            @if($errors->any())
                                <ul class="p-4 text-red-500 bg-red-300 border-red-500 border border-2">
                                    @foreach($errors->all() as $error)
                                        <li class="list-none"> {{$error}} </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                        <button type="submit" class="bg-blue-600 py-3 px-6 rounded-full text-white">Get data</button>
                        
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
