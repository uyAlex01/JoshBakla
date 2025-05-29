<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Event Ticketing</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Bootstrap CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Custom Styles --}}
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background-color: #e0f5e3;
        }

        .header-image {
            width: 100%;
            height: 400px;
            object-fit: cover;
            position: relative;
        }

        .event-info {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px #ccc;
            margin-top: -50px;
            z-index: 2;
            position: relative;
        }

        .buy-section {
            background-image: url('/images/train-background.jpg');
            /* Replace with your image */
            background-size: cover;
            background-position: center;
            padding: 50px 20px;
            color: white;
        }

        .buy-box {
            background-color: rgba(0, 0, 0, 0.6);
            padding: 30px;
            border-radius: 10px;
            max-width: 900px;
            margin: 0 auto;
        }

        .buy-box input,
        .buy-box select {
            margin-bottom: 15px;
        }

        .quick-links {
            margin-top: 30px;
            text-align: center;
        }

        .quick-links i {
            font-size: 24px;
            display: block;
            margin-bottom: 5px;
        }

        .section-title {
            text-align: center;
            margin-bottom: 30px;
            font-weight: bold;
        }
    </style>
</head>

<body>

    {{-- Header Image --}}
    <img src="/images/event-banner.jpg" class="header-image" alt="Event Banner"> {{-- Replace with your image --}}

    {{-- Event Information --}}
    <div class="container event-info mt-4">
        <h2 class="text-center">BTS WORLD TOUR</h2>
        <p><strong>Artist:</strong> BTS</p>
        <p><strong>Venue:</strong> MOA Arena, Pasay City</p>
        <p><strong>Date:</strong> June 10, 2025</p>
        <p><strong>Description:</strong> Experience a night of unforgettable performances, powerful music, and immersive
            visuals with BTS. Get your tickets now!</p>
    </div>

    {{-- Ticketing Section (Styled like the Nigerian Train ticket layout) --}}
    <div class="buy-section mt-5">
        <div class="buy-box">
            <h3 class="text-center mb-4">BUY TICKETS</h3>

            <div class="row">
                <div class="col-md-3">
                    <label>From</label>
                    <input type="text" class="form-control" placeholder="e.g. Manila">
                </div>
                <div class="col-md-3">
                    <label>To</label>
                    <input type="text" class="form-control" placeholder="e.g. Cebu">
                </div>
                <div class="col-md-3">
                    <label>Date</label>
                    <input type="date" class="form-control">
                </div>
                <div class="col-md-2">
                    <label>Time</label>
                    <input type="time" class="form-control">
                </div>
                <div class="col-md-1 d-grid">
                    <label>&nbsp;</label>
                    <button class="btn btn-warning">Search</button>
                </div>
            </div>

            {{-- Optional: Ticket Tier + Quantity --}}
            <div class="row mt-4">
                <div class="col-md-6">
                    <label>Ticket Tier</label>
                    <select class="form-select">
                        <option>VIP - ₱5000</option>
                        <option>General Admission - ₱2000</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label>Quantity</label>
                    <input type="number" class="form-control" value="1" min="1">
                </div>
                <div class="col-md-3 d-grid">
                    <label>&nbsp;</label>
                    <div class="d-flex gap-2">
                        <button class="btn btn-success w-50">Add to Cart</button>
                        <button class="btn btn-primary w-50">Buy Now</button>
                    </div>
                </div>
            </div>

            {{-- Quick Links --}}
            <div class="quick-links text-white mt-4 row">
                <div class="col-md-3">
                    <i class="bi bi-arrow-repeat"></i>
                    <span>Return Tickets</span>
                </div>
                <div class="col-md-3">
                    <i class="bi bi-clock-history"></i>
                    <span>Event Delay</span>
                </div>
                <div class="col-md-3">
                    <i class="bi bi-ticket-perforated"></i>
                    <span>Discounts</span>
                </div>
                <div class="col-md-3">
                    <i class="bi bi-person-wheelchair"></i>
                    <span>Disabled Access</span>
                </div>
            </div>
        </div>
    </div>

</body>

</html>