<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to right, #6a11cb, #2575fc);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
        }

        .container {
            max-width: 700px;
            background-color: #fff;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }

        .header {
            background: linear-gradient(90deg, #28a745, #218838);
            color: white;
            padding: 1.5rem;
            text-align: center;
            border-radius: 10px;
            margin-bottom: 1.5rem;
        }

        .header h2 {
            margin: 0;
            font-size: 1.8rem;
        }

        .btn-success {
            background: linear-gradient(to right, #28a745, #218838);
            border: none;
            transition: all 0.3s ease-in-out;
        }

        .btn-success:hover {
            background: linear-gradient(to right, #218838, #28a745);
            transform: scale(1.05);
        }

        .table {
            margin-top: 1.5rem;
        }

        .error {
            color: red;
            font-size: 0.875rem;
        }

        .table thead {
            background: #6a11cb;
            color: white;
        }

        @media (max-width: 768px) {
            .container {
                padding: 1.5rem;
            }

            .header h2 {
                font-size: 1.5rem;
            }

            .btn-success {
                font-size: 0.9rem;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <h2>Search by NID</h2>
        </div>

        <!-- Search Form -->
        <form method="POST" action="{{ route('search.status') }}">
            @csrf
            <div class="mb-3">
                <label for="nid" class="form-label">Enter NID</label>
                <input type="text" name="nid" id="nid" value="{{ old('nid') }}" class="form-control" placeholder="Enter NID" required>
                @error('nid')
                <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-success w-100">Search</button>
        </form>

        <!-- Registered Users Section -->
        @if($user)
        <div class="mt-5">
            <h2 class="mb-3 text-center">Registered Users</h2>
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>NID</th>
                            <th>Status</th>
                            @if($user['status'] == "Not Registered")
                            <th>Action</th>
                            @elseif($user['status'] == "Scheduled")
                            <th>Date</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $user['name'] ?? 'Not Registered Yet' }}</td>
                            <td>{{ $user['nid'] }}</td>
                            <td>{{ $user['status'] }}</td>

                            @if($user['status'] == "Not Registered")
                            <td>
                                <a href="/register" class="btn btn-primary">Register</a>
                            </td>
                            @elseif ($user['status'] == "Scheduled")
                            <td>{{ $user['scheduled_date'] }}</td>
                            @endif
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        @endif
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>