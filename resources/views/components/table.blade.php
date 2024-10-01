@props(['bookId', 'bookTitle', 'bookPrice', 'status'])

<tr>
    <td>
        <p>{{ $bookId }}</p>
    </td>
    <td>{{ $bookTitle }}</td>
    <td>
        @if ($status > 0)
            free
        @else
            rented
        @endif
    </td>
    <td>{{ $bookPrice }}</td>
    <td class="table-btn">
        <a href="/books/edit/{{$bookId}}"><i class="fa-solid fa-pen"></i></a>
        <form action="{{route('book_delete', $bookId)}}" method="POST">
            @csrf
            @method('DELETE')
            <button>
                <i class="fa-solid fa-trash" style="color: #e7041a;"></i>
            </button>
        </form>
    </td>
</tr>
