@extends('menus.layout')

@section('content')

<section class="bg-white p-4 md:ml-64 h-auto pt-20">
    <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
        <h2 class="mb-4 text-xl font-bold text-gray-900">Tambah menu</h2>
        <form action="{{ route('menus.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                <div class="sm:col-span-2">
                    <label for="menu_name" class="block mb-2 text-sm font-medium text-gray-900">Nama</label>
                    <input type="text" name="menu_name" id="menu_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 @error('menu_name')
                    is-invalid
                    @enderror" placeholder="Nama" value="{{ old('menu_name') }}" >

                    @error('menu_name')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="sm:col-span-2">
                    <label for="price" class="block mb-2 text-sm font-medium text-gray-900">Harga</label>
                    <input type="number" name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 @error('price')
                    is-invalid
                    @enderror" placeholder="Product brand" value="{{ old('price') }}">

                    @error('price')
                        <p>{{ $message }}</p>
                    @enderror
                </div>

                <div class="sm:col-span-2">
                    <label for="deskripsi" class="block mb-2 text-sm font-medium text-gray-900">Deskripsi</label>
                    <input id="deskripsi" type="text" name="deskripsi"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 d" placeholder="Your description here @error('deskripsi')
                    is-invalid
                    @enderror"
                    value="{{ old('deskripsi') }}">

                    @error('deskripsi')
                        <p>{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-center w-full sm:col-span-2">
                    <label for="image_menu" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg class="w-8 h-8 mb-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                            </svg>
                            <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                            <p class="text-xs text-gray-500">SVG, PNG, JPG, JPEG or GIF (MAX. 800x400px)</p>
                        </div>
                        <input id="image_menu" name="image_menu" type="file" class="hidden @error('image_menu')
                        is-invalid
                        @enderror" />

                        @error('image_menu')
                        <p>{{ $message }}</p>
                    @enderror
                    </label>
                </div>
            </div>
            <button type="submit" class="inline-flex justify-center w-full items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-primary-200">
                Tambah
            </button>
        </form>
    </div>
</section>

@endsection
