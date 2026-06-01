<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lux Bag System</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>

        *{
            font-family: 'Poppins', sans-serif;
        }

        body{
            background: #f4f7fb;
            min-height: 100vh;
        }

        .navbar-custom{
            background: linear-gradient(to right, #111827, #1f2937);
            padding: 15px 30px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        .navbar-brand{
            color: white !important;
            font-size: 24px;
            font-weight: 700;
            text-decoration: none;
        }

        .main-container{
            padding: 40px 20px;
        }

        .card-modern{
            border: none;
            border-radius: 18px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            background: white;
        }

        .btn-primary-modern{
            background: linear-gradient(to right, #4f46e5, #7c3aed);
            border: none;
            color: white;
            border-radius: 10px;
            padding: 10px 20px;
            font-weight: 500;
            text-decoration: none;
        }

        .btn-success-modern{
            background: linear-gradient(to right, #059669, #10b981);
            border: none;
            color: white;
            border-radius: 10px;
            padding: 10px 20px;
            font-weight: 500;
            text-decoration: none;
        }

        .table thead{
            background: #111827;
            color: white;
        }

        .table{
            border-radius: 12px;
            overflow: hidden;
        }

        .form-control,
        .form-select{
            border-radius: 12px;
            padding: 12px;
            border: 1px solid #d1d5db;
        }

        .form-control:focus,
        .form-select:focus{
            box-shadow: none;
            border-color: #6366f1;
        }

        .page-title{
            font-size: 32px;
            font-weight: 700;
            color: #111827;
        }

        .subtitle{
            color: #6b7280;
        }

        .badge-stock{
            background: #dbeafe;
            color: #1d4ed8;
            padding: 8px 12px;
            border-radius: 50px;
            font-size: 12px;
        }

    </style>

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-custom">

        <div class="container-fluid">

            <a class="navbar-brand" href="/bags">
                Lux Bag System
            </a>

        </div>

    </nav>

    <div class="main-container container">

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>