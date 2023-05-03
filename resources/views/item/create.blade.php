@extends('layouts.app')

@section('content')


<nav class="flex" aria-label="Breadcrumb">
  <ol class="inline-flex items-center space-x-1 md:space-x-3">
    <li class="inline-flex items-center">
      <a href="{{route('items.index')}}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
        <svg aria-hidden="true" class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
        Item
      </a>
    </li>
    <li aria-current="page">
      <div class="flex items-center">
        <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
        <span class="ml-1 text-sm font-medium text-blue-500 md:ml-2 dark:text-gray-400">Add Items</span>
      </div>
    </li>
  </ol>
</nav>


<div class="bg-blue-100 border-0 rounded-md border-blue-500 text-blue-700 px-4 py-3" role="alert">
  <p class="text-md">Add item.</p>
</div>

<div class="container mt-2">

 @if ($errors->any())
    <div class="p-3 rounded bg-red-500 text-white m-3">
        There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                    
 <form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data" class="mt-5">
    @csrf
    <div class="grid grid-cols-2 gap-4">
        <div class="w-full">
            <p class="text-md font-bold mb-6">Item Information.</p>
            <div class="mb-4">
                <label class="block text-sm font-bold text-gray-700 mb-2" for="title">Item name</label>
                <input type="text" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
             <div class="mb-4">
                <label for="type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select item type</label>
                <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="category_id">
                <option>Select Category</option>
                @foreach ($categories as $key => $category)
                    <option value="{{ $category->id }}"> 
                        {{ $category->name }} 
                    </option>
                @endforeach    
            </select>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-bold text-gray-700 mb-2" for="title">Price</label>
                <input type="text" name="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                <textarea id="description" name="description" rows="4" class="ckeditor block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter Description"></textarea>
            </div>
            <div class="mb-4">
                <label for="condition" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select item condition</label>
                <select name="condition" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select Item condition">
                <option value="New">New</option>
                <option value="Used">Used</option>
                <option value="Good Second Hand">Good Second Hand</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select item type</label>
                <select  name= "type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected>Select Item type</option>
                <option value="Sell" > Sell</option>
                <option value="Buy"> Buy</option>
                <option value="Exchange"> Exchange</option>
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
            <p class="text-md font-bold mb-6">Owner Information.</p>
            <div class="mb-4">
                <label class="block text-sm font-bold text-gray-700 mb-2" for="title">Owner name</label>
                <input type="text" name="owner_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone Number</label>
                <div class="flex">
                <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                    +95
                </span>
                <input type="text" id="owner_phone" name="owner_phone" class="rounded-none rounded-r-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Add Number">
                </div>
            </div>
            <div class="mb-4">
                <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                <textarea id="address" name="owner_address" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Ender Address"></textarea>
            </div>

            <div >
            <div class="mb-4">
                <label class="block text-sm font-bold text-gray-700 mb-2" for="title">latitude</label>
                <input type="text" name="latitude" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-bold text-gray-700 mb-2" for="title">longtitude</label>
                <input type="text" name="longtitude" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            </div>
            
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </div>
    </div>
</form>

</div>
@endsection

<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
       $('.ckeditor').ckeditor();
    });
</script>
