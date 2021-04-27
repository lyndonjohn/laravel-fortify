this is home
<p>{{ auth()->user()->name }}</p>
<form action="{{ route('logout') }}" method="post">
    @csrf
    <button type="submit">logout</button>
</form>

<div>
    @if(session('message'))
        {{ session('message') }}
    @endif
    <table cellpadding="10" cellspacing="1" border="1">
        <tr>
            <td>Name</td>
            <td>Email</td>
            <td></td>
        </tr>
        @forelse($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <a href="{{ route('users.edit', $user) }}">edit</a><br/>
                    <form action="{{ route('users.delete', $user) }}" method="post">
                        @csrf
                        <button type="submit">delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3">no result</td>
            </tr>
        @endforelse
    </table>
</div>
