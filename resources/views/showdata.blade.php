<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel 7 PDF Example</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
</head>

<body>
    <a class="btn btn-primary" href="{{ URL::to('/employee/pdf') }}">Export to PDF</a>

    <div class="container mt-5">
        <h2 class="text-center mb-3">Laravel HTML to PDF Example</h2>

        <table class="table table-bordered mb-5">
            <thead>
                <tr class="table-danger">
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Edit</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employee ?? '' as $data)
                <tr>
                    <th scope="row">{{ $data->id }}</th>
                    <td>{{ $data->email }}</td>
                    <td>{{ $data->password }}</td>
                    <td>{{ $data->city }}</td>
                    <td> <a href={{"edit/".$data['id']}}>Edit</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
<div>
    {{$employee->links()}}
</div>
<style>
    .w-5{
        display:none;
    }
</style>
    <script src="{{ asset('js/app.js') }}" type="text/js"></script>
</body>

</html>
