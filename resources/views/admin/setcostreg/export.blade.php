<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>No HP</th>
            <th>Role</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $user->student->full_name ?? '-' }}</td>
                <td>{{ $user->email_number }}</td>
                <td>{{ $user->roles->first()->name ?? '-' }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
