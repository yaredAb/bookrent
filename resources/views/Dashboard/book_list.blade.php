@include('../layout/pannel_header')
<div class="section2"><!--the body part-->
    @include('../Dashboard/Dcomponents/dashboard-header', ['title' => 'Owner', 'current' => 'Book List'])
    <div class="main-body2"><!--the main body part-->
        <div class="book-row">
            @if (count($books) > 0)
                @foreach ($books as $book)
                    <div class="book-card">
                        <img src="{{ asset('storage/BookImg/' . $book->cover) }}" alt="cover">
                        <div class="book-info"><span>Title - </span>
                            <p>{{ $book->title }}</p>
                        </div>
                        <div class="book-info"><span>Author - </span>
                            <p>{{ $book->author }}</p>
                        </div>
                        <div class="book-info"><span>Category - </span>
                            <p>{{ $book->category }}</p>
                        </div>
                        <div class="book-info"><span>Qty - </span>
                            <p>{{ $book->quantity }}</p>
                        </div>
                        <div class="book-info"><span>Price - </span>
                            <p>{{ $book->price }}</p>
                        </div>
                        <div class="book-operation">
                            <a href="{{ route('edit_book', $book->id) }}" class="edit">Edit</a>
                            <form action="{{ route('book_delete', $book->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="delete">Delete</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            @else
                <h2>You don't create any book yet</h2>
            @endif
        </div>
    </div>
</div>
</div>
<script src="https://kit.fontawesome.com/d3383a5202.js" crossorigin="anonymous"></script>
</body>

</html>
