<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Covid Vaccine Register Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light d-flex align-items-center justify-content-center" style="height: 100vh;">

    <div class="container p-4 bg-white rounded shadow" style="max-width: 500px;">
        <div>
            <h2 class=" text-center text-primary">Registration</h2>
            <p class=" mb-4 text-center text">Fill out the form carefully for registration</p>
        </div>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name Field -->
            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control" required>
                @error('name')
                <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

            <!-- Email Field -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control" required>
                @error('email')
                <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

            <!-- NID Field -->
            <div class="mb-3">
                <label for="nid" class="form-label">National ID</label>
                <input type="text" name="nid" id="nid" value="{{ old('nid') }}" class="form-control" required>
                @error('nid')
                <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

            <!-- Date of Birth Field -->
            <div class="mb-3">
                <label for="dob" class="form-label">Date of Birth</label>
                <input type="date" name="dob" id="dob" value="{{ old('dob') }}" class="form-control" required>
                @error('dob')
                <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

            <!-- Vaccine Center Field -->
            <div class="mb-3">
                <label for="vaccine_center_id" class="form-label">Vaccine Center</label>
                <select name="vaccine_center_id" id="vaccine_center_id" class="form-select" required>
                    <option value="">Select a vaccine center</option>
                    @foreach ($centers as $center)
                    <option value="{{ $center->id }}" @if($center->remaining_slots == 0) disabled @endif>
                        {{ $center->name }} - ({{ $center->remaining_slots }} slot{{ $center->remaining_slots == 1 ? '' : 's' }} left)
                    </option>
                    @endforeach
                </select>
                @error('vaccine_center_id')
                <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>


            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary w-100">Submit</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>