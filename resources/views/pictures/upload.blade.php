@extends('layouts.app')

@section('content')
<body class="bg-black">

<div class="max-w-sm mx-auto bg-neutral-900 p-10 rounded-md" style="margin-top:150px;">


  <form action="{{ route('pictures.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-4">
      <label for="image_name" class="block text-white mb-2">Image Name:</label>
      <input type="text" name="image_name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Image Name">
    </div>
    <div class="mb-4">
  <label for="attached_image_file" class="block text-white my-2">Upload an Image:</label>
  <div class="relative">
    <input type="file" name="attached_image_file" class="opacity-0 absolute z-50">
    <div class="relative rounded-md shadow-sm cursor-pointer px-4 py-2 bg-white text-gray-700 hover:bg-gray-200">
      <svg class="h-6 w-6 inline-block align-middle mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
      </svg>
      <span class="inline-block align-middle">Browse</span>
    </div>
  </div>
</div>

    <div class="flex justify-center mt-10">
      <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Upload</button>
    </div>
  </form>
</div>
 
  </div>
  </div>

@endsection