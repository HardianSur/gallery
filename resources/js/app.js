import './bootstrap';
import 'flowbite';

// import { createConsumer } from '@rails/actioncable';

// Initialize Echo
// window.Echo = new Echo({
//     broadcaster: 'reverb',
//     key: import.meta.env.VITE_REVERB_APP_KEY,
//     wsHost: import.meta.env.VITE_REVERB_HOST ?? `ws-${window.location.hostname}`,
//     wsPort: import.meta.env.VITE_REVERB_PORT ?? 8080,
//     forceTLS: false,
//     enabledTransports: ['ws', 'wss'],
// });

// Listen for notifications
if (window.userId) {
    Echo.channel(`notifications.${window.userId}`)
        .listen('NewLikeNotification', (data) => {
            // Update notification count
            const counterElement = document.getElementById('notification-count');
            counterElement.textContent = data.count;

            // Add animation
            counterElement.classList.add('animate-bounce');
            setTimeout(() => {
                counterElement.classList.remove('animate-bounce');
            }, 1000);

            // Optional: Show toast notification
            showToast(data.message);
        });
}

// Optional: Toast notification function
function showToast(message) {
    const toast = document.createElement('div');
    toast.className = 'fixed top-4 right-4 bg-green-500 text-white px-4 py-2 rounded-lg shadow-lg transform translate-y-0 opacity-100 transition-all duration-300';
    toast.textContent = message;
    document.body.appendChild(toast);

    setTimeout(() => {
        toast.classList.add('translate-y-2', 'opacity-0');
        setTimeout(() => {
            toast.remove();
        }, 300);
    }, 3000);
}
