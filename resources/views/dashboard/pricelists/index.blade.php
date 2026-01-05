<x-layouts.app :title="__('Data Pricelist')">
  <div class="flex flex-col h-full w-full flex-1 gap-4 rounded-xl border border-neutral-200 dark:border-neutral-700 p-6">

    <!-- Success Toast Notification -->
    @include('dashboard.toast')

    <div class="flex justify-between items-center mb-4">
      <h2 class="text-xl font-semibold text-gray-900 dark:text-white">{{ __('Daftar Pricelist') }}</h2>
      <button wire:navigate href="{{ route('pricelists.create') }}"
        class="inline-flex items-center rounded-md bg-indigo-600 px-2.5 py-1.5 text-xs font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-indigo-500">
        {{ __('Tambah Pricelist') }}
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
              Harga
            </th>
            <th scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
              Layanan
            </th>
            <th scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
              Deskripsi
            </th>
            <th scope="col"
              class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
              Aksi
            </th>
          </tr>
        </thead>
        <tbody class="bg-white dark:bg-neutral-800 divide-y divide-gray-200 dark:divide-gray-700">
          @forelse ($pricelists as $pricelist)
            @if ($pricelist->slug != 'blank')
              <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="flex items-center">
                    <div class="text-sm font-medium text-gray-900 dark:text-white">
                      {{ $pricelist->title }}
                    </div>
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="flex items-center">
                    <div class="text-sm font-medium text-gray-900 dark:text-white">
                      Rp {{ number_format($pricelist->price, 0, ',', '.') }}
                    </div>
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="flex items-center">
                    <div class="text-sm font-medium text-gray-900 dark:text-white">
                      <span
                        class="flex items-center gap-2 my-2 bg-white border rounded py-1 px-2 border-gray-200 dark:bg-neutral-800 dark:border-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                          stroke="currentColor" class="size-5 inline-block">
                          <path stroke-linecap="round" stroke-linejoin="round"
                            d="M6.827 6.175A2.31 2.31 0 0 1 5.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 0 0-1.134-.175 2.31 2.31 0 0 1-1.64-1.055l-.822-1.316a2.192 2.192 0 0 0-1.736-1.039 48.774 48.774 0 0 0-5.232 0 2.192 2.192 0 0 0-1.736 1.039l-.821 1.316Z" />
                          <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16.5 12.75a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0ZM18.75 10.5h.008v.008h-.008V10.5Z" />
                        </svg>
                        {{ $pricelist->photographer->name }}
                      </span>
                      <span
                        class="flex items-center gap-2 my-2 bg-white border rounded py-1 px-2 border-gray-200 dark:bg-neutral-800 dark:border-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                          stroke="currentColor" class="size-5 inline-block">
                          <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 18.75a6 6 0 0 0 6-6v-1.5m-6 7.5a6 6 0 0 1-6-6v-1.5m6 7.5v3.75m-3.75 0h7.5M12 15.75a3 3 0 0 1-3-3V4.5a3 3 0 1 1 6 0v8.25a3 3 0 0 1-3 3Z" />
                        </svg>
                        {{ $pricelist->mc->name }}
                      </span>
                      <span
                        class="flex items-center gap-2 my-2 bg-white border rounded py-1 px-2 border-gray-200 dark:bg-neutral-800 dark:border-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                          stroke="currentColor" class="size-5 inline-block">
                          <path stroke-linecap="round" stroke-linejoin="round"
                            d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                        </svg>

                        {{ $pricelist->decoration->name }}
                      </span>
                    </div>
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="flex items-center">
                    <div class="text-sm font-medium text-gray-900 dark:text-white">
                      {{ $pricelist->description }}
                    </div>
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                  <button wire:navigate href="{{ route('pricelists.edit', $pricelist->slug) }}"
                    class="inline-flex items-center rounded-md bg-indigo-600 px-2.5 py-1.5 text-xs font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-indigo-500">
                    Ubah
                  </button>
                  <form class="inline" method="POST" action="{{ route('pricelists.destroy', $pricelist->slug) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                      class="inline-flex items-center rounded-md bg-red-600 px-2.5 py-1.5 text-xs font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline-2 focus-visible:outline-red-500 cursor-pointer"
                      onclick="return confirm('Apakah Anda yakin ingin menghapus pricelist ini?')">
                      Hapus
                    </button>
                  </form>
                </td>
              </tr>
            @endif
          @empty
            <tr>
              <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500 dark:text-gray-400">
                Tidak ada data pricelist
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    @include('dashboard.js-toast')

</x-layouts.app>
