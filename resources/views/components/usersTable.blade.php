@props(['userId', 'userEmail', 'userLocation', 'userPhone', 'userJoined'])

<tr>
    <td>
        <p>{{ $userId }}</p>
    </td>
    <td>{{ $userEmail }}</td>
    <td>{{$userLocation}}</td>
    <td>{{ $userJoined }}</td>
    <td class="table-btn">
        <form action="{{route('deleteUser', $userId)}}" method="POST">
            @csrf
            @method('DELETE')
            <button>
                <i class="fa-solid fa-trash" style="color: #e7041a;"></i>
            </button>
        </form>
    </td>
</tr>
