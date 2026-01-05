<x-layouts.app :title="__('Data ' . $title)">
    <div class="flex flex-col h-full w-full flex-1 gap-4 rounded-xl border border-neutral-200 dark:border-neutral-700 p-6">

      <!-- Success Toast Notification -->
      @include('dashboard.toast')

      <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-semibold text-gray-900 dark:text-white">{{ __("Daftar $title") }}</h2>
        <button wire:navigate href="{{ route($route . '.create') }}"
          class="inline-flex items-center rounded-md bg-indigo-600 px-2.5 py-1.5 text-xs font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-indigo-500">
          {{ __("Tambah  $title") }}
        </button>
      </div>

      <div class="overflow-x-auto w-full">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
          <thead class="bg-white dark:bg-neutral-700">
            <tr>
              <th scope="col"
                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                Nama
              </th>
              <th scope="col"
                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                Layanan
              </th>
              <th scope="col"
                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                Kontak
              </th>
              <th scope="col"
                class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                Aksi
              </th>
            </tr>
          </thead>
          <tbody class="bg-white dark:bg-neutral-800 divide-y divide-gray-200 dark:divide-gray-700">
            @forelse ($vendors as $vendor)
            @if( $vendor->slug != 'blank' )
              <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="flex items-center">
                    <div class="text-sm font-medium text-gray-900 dark:text-white">
                      {{ $vendor->name }}
                    </div>
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="flex items-center">
                    <div class="text-sm font-medium text-gray-900 dark:text-white">
                        {{ $vendor->services }}
                    </div>
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="flex items-center">
                    <div class="text-sm font-medium text-gray-900 dark:text-white">
                        {{ $vendor->contact }}
                    </div>
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                  <button wire:navigate href="{{ route($route . '.edit', $vendor->slug) }}"
                    class="inline-flex items-center rounded-md bg-indigo-600 px-2.5 py-1.5 text-xs font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-indigo-500">
                    Ubah
                  </button>
                  <form class="inline" method="POST" action="{{ route($route . '.destroy', $vendor->slug) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                      class="inline-flex items-center rounded-md bg-red-600 px-2.5 py-1.5 text-xs font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline-2 focus-visible:outline-red-500 cursor-pointer"
                      onclick="return confirm('Apakah Anda yakin ingin menghapus {{ $title }} ini?')">
                      Hapus
                    </button>
                  </form>
                </td>
              </tr>
              @endif
            @empty
              <tr>
                <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500 dark:text-gray-400">
                  Tidak ada data vendor
                </td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>

    @include('dashboard.js-toast')

  </x-layouts.app>
