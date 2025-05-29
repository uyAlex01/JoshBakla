<!-- resources/views/components/footer.blade.php -->
<footer class="bg-light py-5 mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h5>EventMgr</h5>
                <p class="text-muted">Your one-stop solution for event management.</p>
            </div>
            <div class="col-md-4">
                <h5>Quick Links</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ route('home') }}" class="text-decoration-none">Home</a></li>
                    <li><a href="{{ route('about') }}" class="text-decoration-none">About Us</a></li>
                    <li><a href="{{ route('pricing') }}" class="text-decoration-none">Pricing</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h5>Contact</h5>
                <address class="text-muted">
                    123 Event Street<br>
                    Event City, EC 12345<br>
                    <abbr title="Phone">P:</abbr> (123) 456-7890
                </address>
            </div>
        </div>
        <hr>
        <div class="text-center text-muted">
            &copy; {{ date('Y') }} EventMgr. All rights reserved.
        </div>
    </div>
</footer>