<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Faculty Appointment System</title>
</head>
<body>
    <h2>Appointment Transaction Notification</h2>
    <p><i><strong>{{ $data['body'] }}</strong></i></p>

    <p>Appointment Details:</p>
    <ul>
        <li><strong>Appointment Status: </strong>{{ $data['status'] }}</li>
        <li><strong>Faculty Name: </strong>{{ $data['faculty'] }}</li>
        <li><strong>Date/Time: </strong>{{ $data['date-time'] }}</li>
        <li><strong>Office Room: </strong>{{ $data['office'] }}</li>
    </ul>

    <p><strong>Remarks:</strong> {{ $data['remarks'] }}</p>
</body>
</html>