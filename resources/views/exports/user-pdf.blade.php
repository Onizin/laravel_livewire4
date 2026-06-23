<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $title }}</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        h3 { text-align: center; margin-bottom: 4px; }
        p.date { text-align: center; margin-top: 0; color: #555; }
        table { width: 100%; border-collapse: collapse; margin-top: 16px; }
        th { background-color: #343a40; color: white; padding: 8px; text-align: left; }
        td { padding: 7px 8px; border-bottom: 1px solid #dee2e6; }
        tr:nth-child(even) { background-color: #f8f9fa; }
        .badge-info    { background:#17a2b8; color:#fff; padding:2px 8px; border-radius:4px; }
        .badge-primary { background:#007bff; color:#fff; padding:2px 8px; border-radius:4px; }
    </style>
</head>
<body>
    <h3>{{ $title }}</h3>
    <p class="date">Dicetak pada: {{ $date }}</p>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $i => $user)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <span class="{{ $user->role == 'Super Admin' ? 'badge-info' : 'badge-primary' }}">
                        {{ $user->role }}
                    </span>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>