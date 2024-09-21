
    <h1>Registered Users</h1>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
                <th>Address</th>
                <th>Approved</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>{{ $user->address }}</td>
                    <td>{{ $user->approved ? 'Yes' : 'No' }}</td>
                    <td>
                        @if(!$user->approved)
                            <form action="{{ route('admin.approveUser', $user->id) }}" method="POST">
                                @csrf
                                <button type="submit">Approve</button>
                            </form>
                        @else
                            <form action="{{ route('admin.disapproveUser', $user->id) }}" method="POST">
                                @csrf
                                <button type="submit">Disapprove</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
