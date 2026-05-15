<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">

<div class="wrapper">

    <div class="content-wrapper p-4">

        <h2>Edit Admin</h2>

        <form action="{{ route('admin.update', $admin->id) }}" method="POST">
            @csrf

            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control"
                       value="{{ $admin->name }}">
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control"
                       value="{{ $admin->email }}">
            </div>

            <div class="form-group">
                <label>Phone</label>
                <input type="text" name="phone" class="form-control"
                       value="{{ $admin->phone }}">
            </div>

            <button class="btn btn-success">
                Update
            </button>

            <a href="{{ route('admin.index') }}" class="btn btn-secondary">
                Back
            </a>

        </form>

    </div>

</div>

</body>
</html>