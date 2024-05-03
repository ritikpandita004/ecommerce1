<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ekart</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
@include('admin/commons/adminnavbar')
<body style="background-color: white;">
    <div class="container">
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
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Action</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Reverse the order of the loop to display the new query at the top -->
                    @foreach (array_reverse($queries->toArray()) as $query)
                        <tr>
                            <td>{{ $query['name'] }}</td>
                            <td>{{ $query['email'] }}</td>
                            <td>{{ $query['message'] }}</td>
                            <td>
                                <form action="{{ route('updateStatus') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="query_id" value="{{ $query['id'] }}">
                                    @if ($query['status'] === 'onHold')
                                        <button type="submit" class="btn btn-success" name="status" value="resolved">Resolved</button>
                                    @elseif ($query['status'] === 'resolved')
                                        <button type="submit" class="btn btn-success" name="status" value="resolved" disabled>Resolved</button>
                                    @else
                                        <!-- Show both buttons when status is neither 'onHold' nor 'resolved' -->
                                        <button type="submit" class="btn btn-success" name="status" value="resolved">Resolved</button>
                                        <button type="submit" class="btn btn-warning" name="status" value="onHold">On Hold</button>
                                    @endif
                                </form>
                            </td>                          
                            <td>
                                <span class="badge badge-{{ 
                                    $query['status'] === 'resolved' ? 'success' : 
                                    ($query['status'] === 'onHold' ? 'warning' : 'secondary') 
                                }}">
                                    {{ $query['status'] }}
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</body>
</html>
