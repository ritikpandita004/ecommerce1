<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ekart</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Add your custom styles here */
    </style>
</head>
@include('admin/commons/adminnavbar')
<body style="background-color: white;">
    <div class="container-fluid">
        <h1 class="my-4">Query List</h1>
        @if ($queries->isEmpty())
            <div class="alert alert-info">No queries found.</div>
        @else
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="d-none d-sm-table-cell">Name</th>
                            <th class="d-none d-sm-table-cell">Email</th>
                            <th class="d-none d-sm-table-cell">Message</th>
                            <th>Action</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (array_reverse($queries->toArray()) as $query)
                            <tr>
                                <td class="d-none d-sm-table-cell">{{ $query['name'] }}</td>
                                <td class="d-none d-sm-table-cell">{{ $query['email'] }}</td>
                                <td class="d-none d-sm-table-cell">{{ $query['message'] }}</td>
                                <td>
                                    <form action="{{ route('updateStatus') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="query_id" value="{{ $query['id'] }}">
                                        @if ($query['status'] === 'inProcess')
                                            <button type="submit" class="btn btn-success" name="status" value="resolved">Resolved</button>
                                        @elseif ($query['status'] === 'resolved')
                                            <button type="submit" class="btn btn-success" name="status" value="resolved" disabled>Resolved</button>
                                        @else
                                            <button type="submit" class="btn btn-success" name="status" value="resolved">Resolved</button>
                                            <button type="submit" class="btn btn-warning" name="status" value="inProcess">inProcess</button>
                                        @endif
                                    </form>
                                </td>                          
                                <td>
                                    <span class="badge badge-{{ 
                                        $query['status'] === 'resolved' ? 'success' : 
                                        ($query['status'] === 'inProcess' ? 'warning' : 'secondary') 
                                    }}">
                                        {{ $query['status'] }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</body>
</html>
