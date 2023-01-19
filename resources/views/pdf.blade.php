<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="robots" content="noindex, nofollow">
</head>
<body>

    <div class="container mt-5">
        <h2 class="text-center mb-3">Laravel HTML to PDF Example</h2>
        <table class="table table-bordered mb-5">
            <thead>
                <tr class="table-danger">
                    {{--  <th scope="col">#</th>  --}}
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">DOB</th>
                </tr>
            </thead>
            <tbody>
                @foreach($result as $data_1)
                <tr>
                    <td>{{ $data_1->name }}</td>
                    <td>{{ $data_1->email }}</td>
                    <td>{{ $data_1->dob }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>
