@include('../layout/pannel_header')
<div class="section2"><!--the body part-->
    @include('../Dashboard/Dcomponents/dashboard-header', ['title' => 'Owner', 'current' => 'Edit Book'])
    <div class="main-body2"><!--the main body part-->
        <h1>Update a Book</h1>
        <form action="{{ route('book_update', $book->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="text" name="title" id="title" placeholder="Title" value="{{ $book->title }}">
            @error('title')
                <span class="error">{{ $message }}</span>
            @enderror
            <input type="text" name="author" id="author" placeholder="Author" value="{{ $book->author }}">
            @error('author')
                <span class="error">{{ $message }}</span>
            @enderror
            <input type="text" name="category" id="category" placeholder="Category" value="{{ $book->category }}">
            @error('category')
                <span class="error">{{ $message }}</span>
            @enderror
            <input type="number" name="quantity" id="quantity" placeholder="Quantity" value="{{ $book->quantity }}">
            @error('quantity')
                <span class="error">{{ $message }}</span>
            @enderror
            <input type="file" name="cover" id="cover" value="{{ $book->cover }}">
            @error('cover')
                <span class="error">{{ $message }}</span>
            @enderror
            <input type="text" name="price" id="price" placeholder="Price" value="{{ $book->price }}">
            @error('price')
                <span class="error">{{ $message }}</span>
            @enderror
            <input type="submit" name="upload" value="Update">
        </form>
    </div>
</div>
</div>
<script src="https://kit.fontawesome.com/d3383a5202.js" crossorigin="anonymous"></script>
</body>

</html>
