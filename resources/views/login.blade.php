<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script>
        $(document).ready(function () {

            $('#my_form').on('submit', function (event) {
                event.preventDefault(); //form wont submit automatically, but throght our defined ways

                var form = $("#my_form")[0];
                var data = new FormData(form);

                $.ajax({
                    url: "/loginauth",
                    type: "POST",
                    data: data,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        // $('#my_form')[0].reset();
                        alert(response.response);
                    },
                    error: function (response) {
                        alert(response.responseText);
                    }
                });
            });

        });
    </script>
</head>

<body class="bg-dark">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Home</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @if (!session()->has('user_name'))
                        <li class="nav-item">
                            <a type="button" class="nav-link active" id="login">
                                Guest
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <div class="row d-flex justify-content-center align-item-center">
        <div class="card shadow" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Login</h5>
                <form id="my_form" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3" id="email_input_section">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control rounded-0" id="description" name="email" required>

                    </div>
                    <div class="mb-3" id="pswd_input_section">
                        <label class="form-label" for="password">Password</label>
                        <input type="password" class="form-control rounded-0" id="password" name="password" required>

                    </div>
                    <button type="submit" id="form_submit_btn" class="btn btn-dark rounded-0">Login</button>
                </form>
                <p class="mt-2">New user? <a href="/signup"
                        class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Register
                        here</a></p>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
</body>

</html>