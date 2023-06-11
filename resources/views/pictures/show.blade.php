@extends('layouts.app')

@section('content')
<body class="bg-black">
    
<div class="max-w-lg mx-auto flex flex-col justify-center" id="picture-container" style="height: 450px; border-radius: 5px;">

    

    <br>
    <br>
    <div class="flex justify-center text-center text-white bg-neutral-700 p-1" style="border-radius:5px 5px 0px 0px;" >
        <p class="text-gray-300">{{$picture->image_name}}</p>
    </div>

    <div id="edit-form" class="hidden  flex bg-black justify-center" style="margin-top:100px; margin-bottom:-15px;">
        <form action="{{ route('pictures.update', $picture->id) }}" method="POST">
            @csrf
            <input type="hidden" name="_method" value="PUT">

            <div class="justify-center">
              
                <input type="text" name="image_name" id="image_name" value="{{ $picture->image_name }}" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Image Name">
            </div>

            <div class="mt-3 mb-3 flex justify-center">
                <button type="submit" class="bg-orange-600 hover:bg-orange-700 text-white py-1 px-1 rounded focus:outline-none focus:shadow-outline text-xs">
               Update
                </button>
                <button type="button" class="bg-gray-500 hover:bg-gray-700 text-white  py-1 px-1 rounded focus:outline-none focus:shadow-outline  text-xs ml-4" onclick="hideEditForm()">
                Cancel
                </button>
            </div>
          
        </form>
       
    </div>



    <div class="max-w-lg mx-auto pt-2 pb-2 pl-2 pr-2 flex flex-col justify-center" id="picture-container" style="min-height: 300px; height: auto;">
    <img id="picture-image" class="lg mx-auto my-auto object-contain" src="/storage/gallery/image/{{$picture->attached_image_file}}" style="height: 100%; width: 100%">
</div>


</div>

<div class="mt-8 flex justify-center">
    <a href="javascript:void(0)" class="inline-block bg-green-700 text-white py-2 px-2 text-s rounded-lg hover:bg-green-600 transition duration-300 ease-in-out" onclick="showEditForm()">
        <i class="material-icons" style="vertical-align: middle;">edit</i>
        Edit
    </a>
    <form action="{{ route('pictures.delete', $picture->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this picture?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="inline-block bg-red-700 text-white py-2 px-2 text-s rounded-lg hover:bg-red-600 transition duration-300 ease-in-out ml-4">
            <i class="material-icons" style="vertical-align: middle;">delete_forever</i>
            Delete
        </button>
    </form>
</div>

<script>
    function showEditForm() {
        document.getElementById("edit-form").classList.remove("hidden");
        document.getElementById("picture-image").classList.add("edit-image");
        document.getElementById("picture-container").classList.add("edit-container");
    }

    function hideEditForm() {
        document.getElementById("edit-form").classList.add("hidden");
        document.getElementById("picture-image").classList.remove("edit-image");
        document.getElementById("picture-container").classList.remove("edit-container");
    }
</script>

<style>

#picture-image {
   width: 50%;
  transition: all 1.2s ease-in-out;
}


#picture-image.edit-image {
  opacity: 1;
}

    #picture-container.edit-container {
        height: 100%;
         position: relative;
    }

    #picture-image.edit-image {
        transform: scale(0.7);
        border-radius:10px;
        transition: transform 1.2s ease-in-out;
    }
</style>

@endsection