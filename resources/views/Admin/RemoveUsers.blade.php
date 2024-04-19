@extends('Layout.hmain')

@push('title')
    <title>G Tools - Users</title>
@endpush

@section('Content_Information')
    <main>
        @if ($Email)
            <center>
                <h2 style="color: LightGreen; font-size: 128%;">Users</h2>
                <hr>
            </center>
            <section>
                <br>
                <br>
                <table id="users-table" class="styled-table">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td style="color: white;">{{ $user->name }}</td>
                            <td style="color: white;">{{ $user->email }}</td>
                            <td>
                                <form action="{{ url('Admin/remove', $user->email) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="delete-btn">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </section>
        @else
            <script>
                window.location.href="https://gtools360.000webhostapp.com/login";
            </script>
        @endif
    </main>
    <style>
        /* Table styles */
        .styled-table {
            width: 100%;
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 1.2em;
            font-family: sans-serif;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }

        .styled-table th,
        .styled-table td {
            padding: 12px 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        .styled-table th {
            background-color: #009879;
            color: white;
            font-weight: bold;
            text-transform: uppercase;
        }

        .styled-table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }

        .styled-table tbody tr:last-of-type {
            border-bottom: 2px solid #009879;
        }

        /* Button style */
        .delete-btn {
            background-color: #f44336;
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 5px;
            cursor: pointer;
        }

        .delete-btn:hover {
            background-color: #d32f2f;
        }
    </style>
@endsection