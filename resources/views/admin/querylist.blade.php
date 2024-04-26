<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Query List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   
</head>
<body>
    <div class="container">
        <h1 class="my-4">Query List</h1>
        @if ($queries->isEmpty())
            <div class="alert alert-info">No queries found.</div>
        @else
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Message</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($queries as $query)
                        <tr>
                            <td>{{ $query->name }}</td>
                            <td>{{ $query->email }}</td>
                            <td>{{ $query->message }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</body>
</html>