

@extends('layouts.main')

@section('title', 'Detail Mobil - ' . $mobil->nama_mobil)

@section('content')
<div class="min-h-screen bg-gradient-to-tr from-indigo-50 via-white to-pink-50 flex justify-center items-start pt-16 px-4 sm:px-6 lg:px-8 pb-10">
  <article class="max-w-5xl w-full bg-white/80 backdrop-blur-md rounded-3xl shadow-2xl border border-indigo-100 overflow-hidden">

    <!-- Hero Image with overlay -->
    <div class="relative h-64 sm:h-80 md:h-96 group overflow-hidden rounded-t-3xl">
      <img src="{{ asset('storage/' . $mobil->gambar_mobil) }}" alt="Foto {{ $mobil->nama_mobil }}" 
           class="w-full h-full object-cover object-center transition-transform duration-700 ease-in-out group-hover:scale-110" />
      <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex items-end p-4 sm:p-6 md:p-8 rounded-t-3xl">
        <h1 class="text-2xl sm:text-3xl md:text-4xl font-extrabold text-white drop-shadow-lg">
          {{ $mobil->nama_mobil }}
        </h1>
      </div>
    </div>

    <!-- Content -->
    <section class="p-6 sm:p-8 space-y-8">
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8 items-center">

        <!-- Pricing -->
        <div class="flex flex-col justify-center items-center md:items-start">
          <span class="text-xs sm:text-sm uppercase font-semibold text-indigo-500 mb-1 tracking-wide">Harga</span>
          <h3 class="text-2xl sm:text-3xl font-extrabold text-pink-600">
            Rp {{ number_format($mobil->harga_mobil, 0, ',', '.') }}
          </h3>
        </div>

        <!-- Year -->
        <div class="flex flex-col justify-center items-center md:items-start">
          <span class="text-xs sm:text-sm uppercase font-semibold text-indigo-500 mb-1 tracking-wide">Tahun</span>
          <p class="text-lg sm:text-xl font-semibold text-gray-800">{{ $mobil->tahun_mobil }}</p>
        </div>

        <!-- Kilometer -->
        <div class="flex flex-col justify-center items-center md:items-start">
          <span class="text-xs sm:text-sm uppercase font-semibold text-indigo-500 mb-1 tracking-wide">Kilometer</span>
          <p class="text-lg sm:text-xl font-semibold text-gray-800">{{ number_format($mobil->km_mobil, 0, ',', '.') }} KM</p>
        </div>

      </div>

      <!-- WhatsApp & Actions -->
      <div class="flex flex-col md:flex-row gap-4 md:gap-6">
        <a href="https://wa.me/6281234567890?text=Halo,%20saya%20tertarik%20dengan%20{{ urlencode($mobil->nama_mobil) }}"
           target="_blank" rel="noopener noreferrer"
           id="whatsapp-link"
           class="flex-1 flex items-center justify-center gap-3 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-xl py-4 shadow-lg transition-transform duration-300 hover:-translate-y-1">
          <i class="fab fa-whatsapp text-2xl"></i> Order via WhatsApp
        </a>

        <a href="{{ route('mobil.edit', $mobil->id)  }} "method="POST"
           class="flex-1 flex items-center justify-center bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-xl py-4 shadow-lg transition-transform duration-300 hover:-translate-y-1">
          Edit
        </a>

        <form action="{{ route('mobil.destroy', $mobil->id) }}" method="POST" class="flex-1" id="delete-form">
          @csrf
          @method('DELETE')
          <button type="submit"
                  class="w-full py-4 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-xl shadow-lg transition-transform duration-300 hover:-translate-y-1">
            Delete
          </button>
        </form>
      </div>
    </section>
  </article>
</div>

<!-- Modal Template -->
<div id="confirm-modal" class="fixed inset-0 flex items-center justify-center z-50 hidden"
     style="backdrop-filter: blur(6px); background-color: rgba(255, 255, 255, 0.15); padding: 1.5rem;">
  <div class="bg-white rounded-xl shadow-lg max-w-md w-full p-6 animate-fadeIn">
    <h3 id="modal-title" class="text-xl font-semibold text-gray-800">Konfirmasi</h3>
    <p id="modal-message" class="text-gray-600 mb-6">Pesan konfirmasi...</p>
    <div class="flex justify-end space-x-4 mt-2">
      <button id="modal-cancel" class="px-4 py-2 rounded-md bg-gray-300 hover:bg-gray-400 text-gray-700 font-semibold transition">Cancel</button>
      <button id="modal-ok" class="px-4 py-2 rounded-md bg-indigo-600 hover:bg-indigo-700 text-white font-semibold transition">OK</button>
    </div>
  </div>
</div>

<style>
  @keyframes fadeIn {
    from {opacity: 0; transform: translateY(-10px);}
    to {opacity: 1; transform: translateY(0);}
  }
  .animate-fadeIn {
    animation: fadeIn 0.25s ease forwards;
  }
</style>

<script>
  const modal = document.getElementById('confirm-modal');
  const modalTitle = document.getElementById('modal-title');
  const modalMessage = document.getElementById('modal-message');
  const btnCancel = document.getElementById('modal-cancel');
  const btnOk = document.getElementById('modal-ok');

  // Fungsi tampilkan modal dan kembalikan promise untuk hasil user
  function showModal(title, message) {
    modalTitle.textContent = title;
    modalMessage.textContent = message;
    modal.classList.remove('hidden');

    return new Promise((resolve) => {
      btnCancel.onclick = () => {
        modal.classList.add('hidden');
        resolve(false);
      };
      btnOk.onclick = () => {
        modal.classList.add('hidden');
        resolve(true);
      };
    });
  }

  // WhatsApp link dengan modal konfirmasi
  document.getElementById('whatsapp-link').addEventListener('click', async function(event) {
    event.preventDefault();
    const proceed = await showModal('Konfirmasi Pindah Link', 'Kamu akan pindah ke link WhatsApp lain. Lanjutkan?');
    if(proceed) {
      window.open(this.href, '_blank');
    }
  });

  // Delete form dengan modal konfirmasi
  document.getElementById('delete-form').addEventListener('submit', async function(event) {
    event.preventDefault();
    const proceed = await showModal('Konfirmasi Hapus', 'Yakin ingin menghapus mobil ini?');
    if(proceed) {
      this.submit();
    }
  });
</script>
@endsection