@extends ('layouts.main')

@section ('title', 'Selamat datang di Baherindo Motor')

@section('content')
<h1><strong>Welcome to Baherindo Mobil</h1>
<h2>Menjual Motor second murah dek</h2>
<br>
<br>
<br>
<div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4  justify-center">
@foreach ( $mobil as $mb)
    <div class="w-full mx-auto max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700 m-2">
        <a href="{{ route('mobil.show', $mb->id) }}" class="cursor-pointer">
            <img class="p-8 rounded-t-lg" src="{{ asset('storage/'.$mb->gambar_mobil) }}" alt="product image" />
        </a>
        <div class="px-5 pb-5">
                <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">{{ $mb ['nama_mobil'] }}</h5>
                <span class="text-1xl font-bold text-gray-900 dark:text-white">{{ $mb ['tahun_mobil'] }}</span>
            <div class="flex items-center mt-2.5 mb-5">
                <!-- Rating SVGs here -->
            </div>
            <div class="flex items-center justify-between">
                <span class="text-xl font-bold text-gray-900 dark:text-white">Rp. {{ $mb ['harga_mobil'] }}</span>
                <span class="text-xl font-bold text-gray-900 dark:text-white">Km {{ $mb ['km_mobil'] }}</span>
            </div>

            <div class="flex items-center justify-between">
                
            </div>
        </div>
    </div>
    @endforeach
</div>


@endsection
<style>
    
h1 {
    text-align: center;
    font-size: 36px;
    
    margin-top: 20px;

    color: #333;
}
h2 {
    text-align: center;
    font-size: 24px;
    margin-top: 10px;
    color: #555;
}
</style>