<x-layouts.app :title="__('Form Ubah Pricelist')">
    <div class="flex flex-col h-full w-full flex-1 gap-4 rounded-xl border border-neutral-200 dark:border-neutral-700 p-6">


      <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-semibold text-gray-900 dark:text-white">{{ __('Form Ubah Pricelist') }}</h2>
      </div>

      <form action="{{ route('pricelists.update', $pricelist->slug) }}" method="POST">
        @csrf
        @method('put')
        <div class="mb-6">
          <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
          <input type="text" id="title" name="title"
            class="bg-gray-50 dark:bg0 border border-gray-300 text-gray-900 text-sm rounded focus:ring-indigo-500 focus:border-indigo-500 block w-full p-3 dark:bg-neutral-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
            value="{{ old('title', $pricelist->title) }}" placeholder="Isi nama pricelist" required>
          @error('title')
            <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
          @enderror
        </div>
        <div class="mb-6">
          <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga</label>
          <input type="number" id="price" name="price"
            class="bg-gray-50 dark:bg0 border border-gray-300 text-gray-900 text-sm rounded focus:ring-indigo-500 focus:border-indigo-500 block w-full p-3 dark:bg-neutral-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
            value="{{ old('price', $pricelist->price) }}" placeholder="Isi harga pricelist" required>
          @error('price')
            <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
          @enderror
        </div>
        <div class="mb-6">
          <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
          <textarea rows="4" id="description" name="description"
            class="bg-gray-50 dark:bg0 border border-gray-300 text-gray-900 text-sm rounded focus:ring-indigo-500 focus:border-indigo-500 block w-full p-3 dark:bg-neutral-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
            placeholder="Isi deskripsi pricelist" required>{{ old('description', $pricelist->description) }}</textarea>
          @error('description')
            <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
          @enderror
        </div>

        <div class="mb-6">
          <label for="photographer_slug" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih Fotografer</label>
          <select name="photographer_slug" id="photographer_slug"
            class="bg-gray-50 dark:bg-neutral-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded focus:ring-indigo-500 focus:border-indigo-500 block w-full p-3 dark:placeholder-gray-400">
            @foreach ($photographers as $photographer)
              <option value="{{ $photographer->slug }}" {{ old('photographer_slug') == $photographer->slug || $pricelist->photographer_id == $photographer->id ? 'selected' : '' }}>
                {{ $photographer->name }}
              </option>
            @endforeach
          </select>
          @error('photographer_slug')
            <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
          @enderror
        </div>

        <div class="mb-6">
          <label for="mc_slug" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih MC</label>
          <select name="mc_slug" id="mc_slug"
            class="bg-gray-50 dark:bg-neutral-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded focus:ring-indigo-500 focus:border-indigo-500 block w-full p-3 dark:placeholder-gray-400">
            @foreach ($mcs as $mc)
              <option value="{{ $mc->slug }}" {{ old('mc_slug') == $mc->slug || $pricelist->master_of_ceremony_id == $mc->id ? 'selected' : '' }}>
                {{ $mc->name }}
              </option>
            @endforeach
          </select>
          @error('mc_slug')
            <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
          @enderror
        </div>

        <div class="mb-6">
          <label for="decoration_slug" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih Dekorasi</label>
          <select name="decoration_slug" id="decoration_slug"
            class="bg-gray-50 dark:bg-neutral-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded focus:ring-indigo-500 focus:border-indigo-500 block w-full p-3 dark:placeholder-gray-400">
            @foreach ($decorations as $decoration)
              <option value="{{ $decoration->slug }}" {{ old('decoration_slug') == $decoration->slug || $pricelist->decoration_id == $decoration->id ? 'selected' : '' }}>
                {{ $decoration->name }}
              </option>
            @endforeach
          </select>
          @error('mc_slug')
            <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
          @enderror
        </div>

        <div class="flex justify-end gap-4">
          <button wire:navigate href="{{ route('pricelists.index') }}"
            class="px-5 py-1.5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded border border-gray-200 hover:bg-gray-100 hover:text-indigo-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
            Batal
          </button>
          <button type="submit"
            class="inline-flex text-white bg-indigo-600 hover:bg-indigo-700 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded text-sm px-5 py-1.5 text-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800">
            Ubah Pricelist
          </button>
        </div>
      </form>


  </x-layouts.app>
