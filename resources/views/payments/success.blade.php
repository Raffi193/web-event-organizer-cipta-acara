<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Pembayaran Berhasil</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css') <!-- Pastikan Tailwind sudah terpasang dan dikompilasi -->
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
  <div class="bg-white rounded-lg shadow-xl p-8 max-w-sm w-full flex flex-col items-center">
    <div class="bg-indigo-200 rounded-full p-4 mb-6">
      <svg class="w-12 h-12 text-indigo-700" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
      </svg>
    </div>
    <h1 class="text-2xl font-bold text-indigo-700 mb-2 text-center">Pembayaran Berhasil</h1>
    <p class="text-gray-600 mb-8 text-center">Terima kasih, pembayaran Anda telah diterima.</p>

    <a href="/landing" class="w-full text-center py-2 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150 ease-in-out">
      Back to home
    </a>
  </div>
</body>

</html>
