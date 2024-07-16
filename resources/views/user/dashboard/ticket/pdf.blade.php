<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ticket</title>
    <style>
        /* Sesuaikan gaya CSS sesuai kebutuhan */
        body {
            font-family: Arial, sans-serif;
        }
        .ticket {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f3f3f3;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .ticket-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .ticket-body {
            margin-bottom: 20px;
        }
        .ticket-footer {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="ticket">
        <div class="ticket-header">
            <h1>Ticket Information</h1>
        </div>
        <div class="ticket-body">
            <p><strong>User:</strong> {{ $reservation->user->name }}</p>
            <p><strong>Destination:</strong> {{ $reservation->destination->name }}</p>
            <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($reservation->date)->translatedFormat('l, j F Y') }}</p>
        </div>
        <div class="ticket-footer">
            <p>Generated at: {{ now()->format('Y-m-d H:i:s') }}</p>
        </div>
    </div>
</body>
</html>
