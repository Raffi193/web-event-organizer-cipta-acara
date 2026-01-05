<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Pembayaran Gagal</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css') <!-- Pastikan Tailwind sudah terpasang dan dikompilasi -->
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
  <div class="bg-white rounded-lg shadow-lg p-8 max-w-md w-full flex flex-col items-center">
    <!-- Icon Gagal -->
    <div class="bg-red-200 rounded-full p-4 mb-6">
      <svg class="w-12 h-12 text-red-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
      </svg>
    </div>
    <!-- Teks -->
    <h1 class="text-2xl font-semibold text-red-500 mb-2 text-center">Pembayaran Gagal</h1>
    <p class="text-gray-600 mb-6 text-center">Maaf, pembayaran Anda tidak berhasil. Silakan coba lagi.</p>
  </div>

</body>

</html>
