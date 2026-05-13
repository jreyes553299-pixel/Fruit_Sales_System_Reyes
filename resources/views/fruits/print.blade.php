<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fruit Report</title>
    <style>
        body { font-family: sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        h2 { text-align: center; }
    </style>
</head>
<body onload="window.print()">
    <h2>Fruit Report</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Price/kg</th>
                <th>Stock Quantity</th>
                <th>Description</th>
                <th>Availability</th>
            </tr>
        </thead>
        <tbody>
            @foreach($fruits as $fruit)
                <tr>
                    <td>{{ $fruit->id }}</td>
                    <td>{{ $fruit->name }}</td>
                    <td>{{ $fruit->category }}</td>
                    <td>{{ $fruit->price }}</td>
                    <td>{{ $fruit->stock_quantity }}</td>
                    <td>{{ $fruit->description }}</td>
                    <td>{{ $fruit->availability }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
