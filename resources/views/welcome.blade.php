<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to E-Portal</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light text-dark">

    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="text-center">
            <h1 class="mb-4 fw-bold">Welcome to E-Portal</h1>
            <a href="{{ url('/dashboard') }}" class="btn btn-outline-dark px-4 py-2">
                Dashboard
            </a>
        </div>
    </div>

    <!-- Bootstrap JS Bundle (optional for interactivity like dropdowns) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
