@extends('layouts.app')

@section('content')


<div class="container mt-2">

 @if ($errors->any())
    <div class="p-3 rounded bg-red-500 text-white m-3">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                    
 <form action="{{ route('categories.update',$category->id) }}" method="POST" enctype="multipart/form-data" class="mt-5">
    @csrf
    @method('PUT')
    <div class="w-full lg:w-1/2">
        <div class="mb-4">
            <label class="block text-sm font-bold text-gray-700" for="title">Category</label>
            <input type="text" value="{{$category->name}}" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>

        <input type="file" name="image" id="inputImage" multiple class="@error('image') is-invalid @enderror block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 mb-2" />

        
        <div class="flex items-center mb-10">
            <input id="link-checkbox" type="checkbox" name="is_published" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="link-checkbox" class="ml-2 text-md font-medium text-gray-900 dark:text-gray-300">Publish</label>
        </div>
        
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </div>
</form>

</div>
@endsection
