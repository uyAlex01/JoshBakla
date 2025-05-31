<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recent Activities</title>
    <style>
        /* Global Styles */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 2rem;
            color: #333;
        }

        h1 {
            text-align: center;
            margin-bottom: 2rem;
            color: #2c3e50;
        }

        /* Container for activities */
        .activity-container {
            max-width: 700px;
            margin: 0 auto;
        }

        /* Each activity card */
        .activity {
            background-color: #ffffff;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            padding: 1rem 1.5rem;
            margin-bottom: 1rem;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
            transition: transform 0.2s ease-in-out;
        }

        .activity:hover {
            transform: scale(1.01);
        }

        .activity strong {
            color: #007bff;
        }

        .timestamp {
            font-size: 0.9rem;
            color: #6c757d;
            margin-top: 4px;
        }

        .description {
            margin-top: 0.5rem;
            color: #555;
        }

        .no-activity {
            text-align: center;
            font-style: italic;
            color: #999;
        }
    </style>
</head>
<body>

    <h1>Recent Activities</h1>

    <div class="activity-container">
        @forelse($activities as $activity)
            <div class="activity">
                <strong>{{ $activity->user->name ?? 'System' }}</strong> {{ $activity->action }}
                <div class="timestamp">{{ $activity->created_at->diffForHumans() }}</div>
                @if($activity->description)
                    <div class="description">{{ $activity->description }}</div>
                @endif
            </div>
        @empty
            <p class="no-activity">No recent activities found.</p>
        @endforelse
    </div>

</body>
</html>
