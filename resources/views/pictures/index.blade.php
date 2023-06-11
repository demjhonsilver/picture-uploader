@extends('layouts.app')

@section('content')
<body class="bg-black">
<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
<div class="grid grid-cols-2 gap-4 md:grid-cols-4 lg:grid-cols-6 bg-black-200 p-1">
  @foreach ($pictures as $picture)
    <div class="flex flex-col">
      <a href="/pictures/{{$picture->id}}">
        <div class="w-full h-48 relative overflow-hidden">
          <img class="absolute h-full rounded-md w-full object-cover transition duration-5000 ease-in-out transform hover:scale-95 hover:object-contain hover:cursor-pointer" src="/storage/gallery/image/{{$picture->attached_image_file}}" alt="{{$picture->title}}" style="transition: all 0.3s ease-in-out;">
        </div>
      </a>
      <h3 class="text-lg font-medium mt-2">Uploaded: {{$picture->created_at}}</h3>
    </div>
  @endforeach
</div>
</div>
</body>
@endsection