<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Repayment Receipt</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 0;
            padding: 0;
            position: relative;
        }

        .watermark-tile {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
            background-image: url('{{ public_path('logos/' . $repayment->detail->image) }}');
            background-repeat: repeat;
            background-size: 120px; /* You can adjust logo size here */
            opacity: 0.04; /* Faint watermark */
        }

        .container {
            padding: 20px;
            position: relative;
            z-index: 10;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header img {
            width: 200px;
        }

        .section-title {
            font-weight: bold;
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .note {
            margin-top: 30px;
            font-style: italic;
        }
    </style>
</head>
<body>

    {{-- Tiled watermark background --}}
    @if($repayment->detail && $repayment->detail->image)
        <div class="watermark-tile"></div>
    @endif

    <div class="container">
        <div class="header">
            @if($repayment->detail && $repayment->detail->image)
                <img src="{{ public_path('logos/' . $repayment->detail->image) }}" alt="Company Logo">
            @endif
            <hr>
            <h2>Payment Receipt</h2>
        </div>

        <div>
            <p>{{ $repayment->detail->name ?? 'N/A' }}</p>
            <p>{{ $repayment->detail->email ?? 'N/A' }}</p>
            <p>{{ $repayment->detail->address ?? 'N/A' }}</p>
        </div>

        <div class="section-title">Client Details</div>
        <table>
            <tr><th>Name</th><td>{{ $repayment->loan->client->client_name }}</td></tr>
            <tr><th>Employee Id</th><td>{{ $repayment->loan->client->employee_no }}</td></tr>
            <tr><th>NRC</th><td>{{ $repayment->loan->client->nrc }}</td></tr>
            <tr><th>Loan ID</th><td>{{ $repayment->loan->id }}</td></tr>
            <tr><th>Payment Date</th><td>{{ \Carbon\Carbon::parse($repayment->payment_date)->format('d M Y') }}</td></tr>
        </table>

        <div class="section-title">Repayment Information</div>
        <table>
            <tr><th>Amount Paid</th><td>{{ number_format($repayment->amount_paid, 2) }}</td></tr>
            <tr><th>Remaining Balance</th><td>{{ number_format($repayment->loan->amount - $repayment->loan->repayments->sum('amount_paid'), 2) }}</td></tr>
        </table>

        <p class="note">Thank you for your payment. If you have any questions, feel free to contact us.</p>
    </div>
</body>
</html>
