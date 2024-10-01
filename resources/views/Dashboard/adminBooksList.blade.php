@include('../layout/pannel_header')
<div class="section2"><!--the body part-->
    @include('../Dashboard/Dcomponents/dashboard-header', ['title' => 'Admin', 'current'=>'Book-List'])

    <div class="main-body">

        @if (count($books) > 0)

                <table class="user-list">
                    <tr>
                        <th>No.</th>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Quantity</th>
                        <th>Author</th>
                        <th>Action</th>
                        <th>Status</th>
                    </tr>
                    @php
                        $count = 1;
                    @endphp
                    @foreach ($books as $book)

                    <tr>
                        <td>{{ $count }}</td>
                        <td>{{ $book->id }}</td>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->category }}</td>
                        <td>{{ $book->quantity }}</td>
                        <td>{{ $book->author }}</td>
                        <td>
                            <form action="{{ route('deleteBook', $book->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button style="background-color: #fff; border:none;"><i class="fa-solid fa-trash"
                                        style="color: #e7041a;"></i></button>
                            </form>
                        </td>
                        <td>
                            @if ($book->status == 'approved')
                                <a href="{{ route('book-deny', $book->id) }}"
                                    style="background-color: green; color:rgb(220, 219, 219);">Approved</a>
                            @else
                                <a href="{{ route('book-approval', $book->id) }}"
                                    style="background-color: rgb(220, 219, 219)">Approve</a>
                            @endif
                        </td>
                    </tr>
                    @php
                        $count++;
                    @endphp
                    @endforeach
                </table>

        @else
            <p style="font-size: 20px; text-align:center; font-weight:bold; padding: 10px 0;">No Book is created yet!</p>
        @endif
    </div>
</div>
<script src="https://kit.fontawesome.com/d3383a5202.js" crossorigin="anonymous"></script>
</body>
