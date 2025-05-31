<div class="bg-dark text-white py-3">
    <div class="container text-center">
        <h5>Next big event starts in:</h5>
        <div id="countdown" class="display-6">
            14d 06h 23m 45s
        </div>
    </div>
</div>

<script>
// Set the target date and time (format: YYYY-MM-DDTHH:MM:SS)
const targetDate = new Date("2025-06-15T00:00:00").getTime();

function updateCountdown() {
    const now = new Date().getTime();
    const distance = targetDate - now;

    if (distance < 0) {
        document.getElementById("countdown").innerHTML = "Event started!";
        return;
    }

    const days = Math.floor(distance / (1000 * 60 * 60 * 24));
    const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    const seconds = Math.floor((distance % (1000 * 60)) / 1000);

    document.getElementById("countdown").innerHTML = 
        `${days}d ${hours.toString().padStart(2, '0')}h ${minutes.toString().padStart(2, '0')}m ${seconds.toString().padStart(2, '0')}s`;
}

// Run once immediately
updateCountdown();

// Then update every second
setInterval(updateCountdown, 1000);
</script>
