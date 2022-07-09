@extends('layout.app')
@section('title')
    Gallerie
@endsection

@section('content')
<body x-data="imageGallery()"
      x-init="fetch('https://pixabay.com/api/?key=15819227-ef2d84d1681b9442aaa9755b8&q=woman+girl+food&image_type=all&per_page=52&')
      .then(response => response.json())
      .then(response => { images = response.hits })"
      class="bg-white">

@include('components.navbar')
    @auth

        <h1 class="text-center font-bold py-10 text-3xl">Image Gallery With Grid </h1>

        <div class="container lg:px-32 px-4 py-8 mx-auto items-center ">
            <div class="grid grid-cols-4 grid-rows-4 grid-flow-col gap-2">
                @foreach ( $images as $image )
                    <div class="w-full col-span-2">
                    <img
                        src="{{ $image->path }}"
                        alt="{{ $image->name }}"
                        class="inset-0 h-full w-full object-cover object-center rounded opacity-75 hover:opacity-100 ">
                    </div>
                @endforeach
            </div>
        </div>
    @endauth
@endsection
