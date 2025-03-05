@vite(['resources/css/app.css', 'resources/js/app.js'])

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const table = $('#table').val();
        const Delete = async (id) => {
            const popup = await Swal.fire({
                title: "Apa Anda Yakin ?",
                icon: "question",
                confirmButtonText: "Confirm",
                cancelButtonText: "Cancel",
                showCancelButton: true,
            })
            if (popup.isConfirmed) {
                $.ajax({
                    type: "delete", // Ensure the method is "DELETE"
                    url: `/test/${id}`, // URL to which the request will be sent
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                            'content') // CSRF token in headers
                    },
                    success: async function(response) {
                        console.log(table);
                        console.log(response.user);
                        await Swal.fire({
                            title: 'Success',
                            text: 'Do you want to continue',
                            icon: 'success',

                        })
                        // window.location.reload();
                    },
                    error: async function(xhr, status, error) {
                        await Swal.fire({
                            title: 'Error!',
                            text: 'Do you want to continue',
                            icon: 'error',
                        })
                    }
                });
            }
        }

        const Save = async (id) => {
            const popup = await Swal.fire({
                title: "Apa Anda Yakin ?",
                icon: "question",
                confirmButtonText: "Confirm",
                cancelButtonText: "Cancel",
                showCancelButton: true,
            })
            if (popup.isConfirmed) {
                $.ajax({
                    type: "POST", // Ensure the method is "DELETE"
                    url: `/test/${id}`, // URL to which the request will be sent
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                            'content') // CSRF token in headers
                    },
                    success: async function(response) {
                        await Swal.fire({
                            title: 'Success',
                            text: 'Do you want to continue',
                            icon: 'success',

                        })
                        // window.location.reload();
                    },
                    error: async function(xhr, status, error) {
                        await Swal.fire({
                            title: 'Error!',
                            text: 'Do you want to continue',
                            icon: 'error',
                        })
                    }
                });
            }
        }
    </script>
</head>
<body>
    <div class="w-screen min-h-screen bg-red-100 p-10" id="table">
        @if (Session::has('message'))
            <h1>{{ Session::get('message') }}</h1>
        @endif
        <table class="w-full shadow-sm">
            <th class="w-0">
                <h1 class="w-fit">Nomor</h1>
            </th>
            <th>Title</th>
            <th>Delete</th>
            <th>Ok</th>
            @foreach (range(0, 20, 1) as $number)
                <x-card :id="$number" />
            @endforeach
    </div>
</body>
