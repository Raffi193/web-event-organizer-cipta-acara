<script>
    // Toast Notification Functions
    function showToast(message) {
      const toast = document.getElementById('toast-notification');
      const toastContent = toast.querySelector('div');
      const toastMessage = document.getElementById('toast-message');

      toastMessage.textContent = message;
      toast.classList.remove('hidden');

      setTimeout(() => {
        toastContent.classList.remove('translate-x-full', 'opacity-0');
      }, 10);

      setTimeout(hideToast, 5000);
    }

    function hideToast() {
      const toast = document.getElementById('toast-notification');
      const toastContent = toast.querySelector('div');

      toastContent.classList.add('translate-x-full', 'opacity-0');
      setTimeout(() => {
        toast.classList.add('hidden');
      }, 300);
    }

    // Show toast if there's a success message
    document.addEventListener('DOMContentLoaded', function() {
      @if (session('success'))
        showToast(@json(session('success')));
      @endif
    });
  </script>
