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

            // $('#my_form').on('submit', function (event) {
            //     event.preventDefault(); //form wont submit automatically, but throght our defined ways

            //     var form = $("#my_form")[0];
            //     var data = new FormData(form);

            //     $.ajax({
            //         url: "/logout",
            //         type: "POST",
            //         data: data,
            //         processData: false,
            //         contentType: false,
            //         success: function (response) {
            //             $('#modal_form')[0].reset();
            //             $('#my_modal').modal('show');
            //             alert(response.response);
            //         },
            //         error: function (response) {
            //             alert(response.responseText);
            //         }
            //     });
            // });

        });
    </script>
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
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
                    @if (session()->has('user_name'))
                        <li class="nav-item">
                            <img src="products/{{session()->get('user_image')}}" alt="" height="40" width="40">
                        </li>
                        <li class="nav-item">
                            <p class="nav-link">{{session()->get('user_name')}}</p>
                        </li>
                        <li class="nav-item">
                            <p class="nav-link">{{session()->get('user_email')}}</p>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/logout">Logout</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
</body>

</html>