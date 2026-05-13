<!DOCTYPE html>
<html>
<head>

    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="/style.css">

</head>
<body style="background:#f1f5f9;">

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-4">

            <div class="card p-4 shadow border-0 rounded-4">

                <h2 class="text-center fw-bold mb-4">

                    Login GlowStyle

                </h2>

                @if(session('error'))

                    <div class="alert alert-danger">

                        {{ session('error') }}

                    </div>

                @endif

                <form method="POST" action="/login">

                    @csrf

                    <input
                    type="email"
                    name="email"
                    class="form-control mb-3"
                    placeholder="Email">

                    <input
                    type="password"
                    name="password"
                    class="form-control mb-3"
                    placeholder="Password">

                    <button
                    class="btn btn-primary w-100">

                        Login

                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

</body>
</html>