@extends('layout.app')

@section('title')
Ajouter
@endsection

@section('content')
<div class="w-full md:w-96 md:max-w-full mx-auto">
    <div class="p-6 border border-gray-300 sm:rounded-md">
        <form method="POST" action="{{ route('imgUploads') }}" enctype="multipart/form-data">
            @csrf
            <label class="block mb-6">
                <span class="text-gray-700">Your photo</span>
                <input required name="photo" type="file" class="
              block
              w-full
              mt-1
              focus:border-indigo-300
              focus:ring
              focus:ring-indigo-200
              focus:ring-opacity-50
            " />
            </label>
            <div class="mb-6">
                <button type="submit" class="
              h-10
              px-5
              text-indigo-100
              bg-indigo-700
              rounded-lg
              transition-colors
              duration-150
              focus:shadow-outline
              hover:bg-indigo-800
            ">
                    Upload
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
