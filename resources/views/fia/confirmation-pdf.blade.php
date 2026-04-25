<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dodoso Confirmation - {{ $confirmation->id }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            line-height: 1.4;
            margin: 0;
            padding: 20px;
        }
        .header {
            text-align: center;
            border-bottom: 2px solid #10b981;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }
        .header h1 {
            color: #10b981;
            margin: 0;
            font-size: 24px;
        }
        .info-section {
            margin-bottom: 25px;
        }
        .info-row {
            display: flex;
            margin-bottom: 8px;
        }
        .info-label {
            font-weight: bold;
            width: 150px;
            color: #374151;
        }
        .info-value {
            flex: 1;
        }
        .payment-details {
            background-color: #f9fafb;
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
        }
        .payment-details h3 {
            margin-top: 0;
            color: #10b981;
        }
        .footer {
            margin-top: 40px;
            text-align: center;
            font-size: 10px;
            color: #6b7280;
            border-top: 1px solid #e5e7eb;
            padding-top: 20px;
        }
        .status {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 3px;
            font-weight: bold;
            text-transform: uppercase;
        }
        .status.verified {
            background-color: #d1fae5;
            color: #065f46;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>DODOSO CONFIRMATION</h1>
        <p>Confirmation ID: #{{ $confirmation->id }}</p>
    </div>

    <div class="info-section">
        <h2>Member Information</h2>
        <div class="info-row">
            <span class="info-label">Member Name:</span>
            <span class="info-value">{{ $member['name'] }}</span>
        </div>
        <div class="info-row">
            <span class="info-label">Member ID:</span>
            <span class="info-value">{{ $member['id'] }}</span>
        </div>
        <div class="info-row">
            <span class="info-label">Member Type:</span>
            <span class="info-value">{{ $member['type'] }}</span>
        </div>
        <div class="info-row">
            <span class="info-label">Email:</span>
            <span class="info-value">{{ $member['email'] }}</span>
        </div>
    </div>

    <div class="payment-details">
        <h3>Payment Details</h3>
        <div class="info-row">
            <span class="info-label">Status:</span>
            <span class="info-value">
                <span class="status {{ $confirmation->status }}">
                    {{ $confirmation->status }}
                </span>
            </span>
        </div>
        <div class="info-row">
            <span class="info-label">Payment Method:</span>
            <span class="info-value">{{ $confirmation->payment_method }}</span>
        </div>
        <div class="info-row">
            <span class="info-label">Submission Date:</span>
            <span class="info-value">{{ $confirmation->created_at->format('d M Y, H:i') }}</span>
        </div>
        @if($confirmation->notes)
            <div class="info-row">
                <span class="info-label">Notes:</span>
                <span class="info-value">{{ nl2br($confirmation->notes) }}</span>
            </div>
        @endif
    </div>

    @if($paymentRecord)
    <div class="info-section">
        <h2>Payment Record</h2>
        <div class="info-row">
            <span class="info-label">Total Amount:</span>
            <span class="info-value">{{ number_format($paymentRecord->kiasi_baki, 2) }} TZS</span>
        </div>
        <div class="info-row">
            <span class="info-label">Record Date:</span>
            <span class="info-value">{{ $paymentRecord->created_at->format('d M Y, H:i') }}</span>
        </div>
    </div>
    @endif

    <div class="footer">
        <p>This is an official payment confirmation from Dodoso System.</p>
        <p>Generated on: {{ now()->format('d M Y, H:i:s') }}</p>
        <p>For any inquiries, please contact Dodoso Administration.</p>
    </div>
</body>
</html>
