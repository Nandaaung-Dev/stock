@extends('layouts.app')

@section('content')
<div class="container mt-2">
    <div class="flex justify-between mb-2">
            <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                <h3 class="font-normal text-xl text-blue-700">Categories</h3>
            </div>
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                <a href="{{ route('categories.create') }}"><i class="fa-solid fa-plus"></i> Add Category</a>
            </button>
    </div>
       
    </div>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>

                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Category
                    </th>

                    <th scope="col" class="px-6 py-3">
                        Publish
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $index=>$category)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                    <td class="px-6 py-4">
                        {{ $index + 1 }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $category->name }}
                    </td>
                    <td class="px-6 py-4">
                        <form action="{{ route('categories.changeStatus', ['id' => $category->id])}}" method="POST">
                            @csrf
                            @method('POST')
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input onChange="this.form.submit()" type="checkbox" name="status" class="sr-only peer" {{ $category->is_published ? 'checked': '' }}>
                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                            </label>
                        </form>
                    </td>
                    <td class="px-6 py-4">
                        <form action="{{ route('categories.destroy',$category->id) }}" method="POST">
                            <a class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-3 rounded" href="{{ route('categories.edit',$category->id) }}"><i class="fa-solid fa-pencil"></i></a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-3 rounded"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection
