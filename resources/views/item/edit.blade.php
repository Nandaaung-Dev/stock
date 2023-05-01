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
                    
 <form action="{{ route('items.update',$item->id)  }}" method="POST" enctype="multipart/form-data" class="mt-5">
    @csrf
    @csrf
    @method('PUT')
    <div class="grid grid-cols-2 gap-4">
        <div class="w-full">
            <div class="mb-4">
                <label class="block text-sm font-bold text-gray-700 mb-2" for="title">Item name</label>
                <input type="text" name="name" value="{{$item->name}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
             <div class="mb-4">
                <label for="type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select item type</label>
                <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="category_id">
                <option>Select Category</option>
                @foreach ($categories as $key => $category)
                    <option value="{{ $category->id }}" {{ $item->category_id == $category->id ? 'selected' : '' }}> 
                        {{ $category->name }} 
                    </option>
                @endforeach    
            </select>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-bold text-gray-700 mb-2" for="title">Price</label>
                <input type="text" name="price" value="{{$item->price}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                <textarea id="description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter Description">{{$item->description}}</textarea>
            </div>
            <div class="mb-4">
                <label for="condition" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select item condition</label>
                <select name="condition" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select Item condition">
                <option selected>Select Item condition</option>
                <option value="New" {{ $item->condition == "New" ? 'selected' : '' }}>New</option>
                <option value="Used" {{ $item->condition == "Used" ? 'selected' : '' }}>Used</option>
                <option value="Good Second Hand" {{ $item->condition == "Good Second Hand" ? 'selected' : '' }}>Good Second Hand</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select item type</label>
                <select  name= "type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected>Select Item type</option>
                <option value="Sell" {{ $item->type == "Sell" ? 'selected' : '' }}> Sell</option>
                <option value="Buy" {{ $item->type == "Buy" ? 'selected' : '' }}> Buy</option>
                <option value="Exchange" {{ $item->type == "Exchange" ? 'selected' : '' }}> Exchange</option>
                </select>
            </div>
            <div class="mb-4">
            <label for="status" class="block  text-sm font-medium text-gray-900 dark:text-white">Status</label>
            <div class="flex items-center mb-10">
                    <input id="link-checkbox" type="checkbox" name="is_published" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="link-checkbox" class="ml-2 text-md font-medium text-gray-900 dark:text-gray-300">Publish</label>
            </div>
            </div>
            <input type="file" name="image" id="inputImage" multiple class="@error('image') is-invalid @enderror block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 mb-2" />
        </div>
        <div class="w-full">
            <div class="mb-4">
                <label class="block text-sm font-bold text-gray-700 mb-2" for="title">Owner name</label>
                <input type="text" name="owner_name" value="{{$item->owner_name}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone Number</label>
                <div class="flex">
                <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                    +95
                </span>
                <input type="text" id="owner_phone" name="owner_phone" value="{{$item->owner_phone}}" class="rounded-none rounded-r-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Add Number">
                </div>
            </div>
            <div class="mb-4">
                <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                <textarea id="address" name="owner_address" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Ender Address">{{$item->owner_address}}</textarea>
            </div>
            
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </div>
    </div>
</form>

</div>
@endsection
