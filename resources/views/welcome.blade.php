<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vaccine Registration Success</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .congrats-message {
            margin-top: 50px;
            text-align: center;
        }

        .congrats-icon {
            font-size: 4rem;
            color: #28a745;
        }

        .congrats-heading-top {
            font-size: 2rem;
            font-weight: bold;
            color: #a72846;
        }

        .congrats-heading {
            font-size: 1.5rem;
            font-weight: bold;
            color: #28a745;
        }

        .congrats-text {
            font-size: 1rem;
            color: #6c757d;
        }
    </style>
</head>

<body>
    @if (session()->has('user'))
    <div class="container">
        <div class="congrats-message">
            <!-- Icon -->
            <div class="congrats-icon">
                <i class="bi bi-check-circle-fill"></i>
            </div>
            <!-- Heading -->
            <div class="mt-3 congrats-heading">
                Congratulations!
            </div>
            <!-- Message Text -->
            <div class="mt-2 congrats-text">
                Your registration for the vaccine was successful! <br>
                An email confirmation will be sent to your inbox.
            </div>
            <!-- Back to Home Button -->
            <div class="mt-4">
                <a href="/" class="btn btn-primary">Go to Home</a>
                <a href="/search" class="btn btn-primary">Check status</a>

            </div>
        </div>
    </div>
    @else
    <div class="container">
        <div class="congrats-message">
            <!-- Icon -->
            <div class="congrats-icon">
                <i class="bi bi-check-circle-fill"></i>
            </div>
            <div class="mt-3 congrats-heading-top">
                COVID vaccine registration system
            </div>
            <!-- Heading -->
            <div class="mt-3 congrats-heading">
                Do you want to register for vccine?
            </div>
            <!-- Back to Home Button -->
            <div class="mt-4">
                <a href="/register" class="btn btn-primary">Go to Registration</a>
                <a href="/search" class="btn btn-primary">Check status</a>
            </div>
        </div>
    </div>
    @endif

    <!-- Bootstrap JS and Icons -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.js"></script>
</body>

</html>