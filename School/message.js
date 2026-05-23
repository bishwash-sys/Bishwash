// script.js
document.addEventListener('DOMContentLoaded', () => {
  const form = document.getElementById('contactForm');
  const status = document.getElementById('status');
  const sendBtn = document.getElementById('sendBtn');

  form.addEventListener('submit', async (e) => {
    e.preventDefault();
    status.textContent = '';
    // Basic HTML5 validation check
    if (!form.reportValidity()) return;

    // Collect form data
    const data = new FormData(form);
    const payload = Object.fromEntries(data.entries());

    // Disable button while sending
    sendBtn.disabled = true;
    sendBtn.textContent = 'Sending...';

    try {
      // Option A: AJAX to your server endpoint (uncomment and set endpoint)
      const res = await fetch('/send-message.php', {
        method: 'POST',
        headers: { 'Accept': 'application/json' },
        body: data
      });

      if (res.ok) {
        status.style.color = 'green';
        status.textContent = 'Thank you — your message was sent!';
        form.reset();
      } else {
        // If your server returns 4xx/5xx, show fallback message
        const text = await res.text();
        status.style.color = 'crimson';
        status.textContent = 'Failed to send message. Server responded: ' + (text || res.status);
      }

      // Option B: If you don't have a server, you can use Formspree by posting to their URL
      // Example (not run here): fetch('https://formspree.io/f/yourFormId', { method: 'POST', body: data })

    } catch (err) {
      console.error(err);
      status.style.color = 'crimson';
      status.textContent = 'Network error. Please try again later.';
    } finally {
      sendBtn.disabled = false;
      sendBtn.textContent = 'Send Message';
    }
  });
});
Sent
Write to
