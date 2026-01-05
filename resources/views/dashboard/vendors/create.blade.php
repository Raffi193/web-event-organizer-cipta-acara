<x-layouts.app :title="__('Form Tambah ' . $title)">
  <div class="flex flex-col h-full w-full flex-1 gap-4 rounded-xl border border-neutral-200 dark:border-neutral-700 p-6">


    <div class="flex justify-between items-center mb-4">
      <h2 class="text-xl font-semibold text-gray-900 dark:text-white">{{ __('Form Tambah ' . $title) }}</h2>
    </div>

    <form action="{{ route($route . '.store') }}" method="POST">
      @csrf

      <div class="mb-6">
        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
        <input type="text" id="name" name="name"
          class="bg-gray-50 dark:bg0 border border-gray-300 text-gray-900 text-sm rounded focus:ring-indigo-500 focus:border-indigo-500 block w-full p-3 dark:bg-neutral-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
          value="{{ old('name') }}" placeholder="Isi nama {{ $title }}" required>
        @error('name')
          <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
        @enderror
      </div>
      <div class="mb-6">
        <label for="services" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Layanan</label>
        <input type="text" id="services" name="services"
          class="bg-gray-50 dark:bg0 border border-gray-300 text-gray-900 text-sm rounded focus:ring-indigo-500 focus:border-indigo-500 block w-full p-3 dark:bg-neutral-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
          value="{{ old('services') }}" placeholder="Isi layanan {{ $title }}" required>
        @error('services')
          <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
        @enderror
      </div>
      <div class="mb-6">
        <label for="contact" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kontak</label>
        <input type="text" id="contact" name="contact"
          class="bg-gray-50 dark:bg0 border border-gray-300 text-gray-900 text-sm rounded focus:ring-indigo-500 focus:border-indigo-500 block w-full p-3 dark:bg-neutral-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
          value="{{ old('contact') }}" placeholder="Isi kontak {{ $title }}" required>
        @error('contact')
          <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
        @enderror
      </div>

      <div class="flex justify-end gap-4">
        <button wire:navigate href="{{ route($route . '.index') }}"
          class="px-5 py-1.5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded border border-gray-200 hover:bg-gray-100 hover:text-indigo-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
          Batal
        </button>
        <button type="submit"
          class="inline-flex text-white bg-indigo-600 hover:bg-indigo-700 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded text-sm px-5 py-1.5 text-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800">
          Tambah {{ $title }}
        </button>
      </div>
    </form>


</x-layouts.app>
