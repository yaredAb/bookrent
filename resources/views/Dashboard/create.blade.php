@include('../layout/pannel_header')
<div class="section2"><!--the body part-->
    @include('../Dashboard/Dcomponents/dashboard-header', ['title' => 'Owner', 'current' => 'Create Book'])
    <div class="main-body2"><!--the main body part-->

        @if ($status == 'approved')
            <h1>Upload a new Book</h1>
            <form action="{{ route('books-store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="text" name="title" id="title" placeholder="Title" value="{{ old('title') }}">
                @error('title')
                    <span class="error-msg">{{ $message }}</span>
                @enderror
                <input type="text" name="author" id="author" placeholder="Author" value="{{ old('author') }}">
                @error('author')
                    <span class="error-msg">{{ $message }}</span>
                @enderror
                <select name="category">
                    <option value="fiction">Fiction</option>
                    <option value="psychology">Psychology</option>
                    <option value="development">Self Development</option>
                    <option value="educational">Educational</option>
                </select>
                @error('category')
                    <span class="error-msg">{{ $message }}</span>
                @enderror
                <input type="number" name="quantity" id="quantity" placeholder="Quantity"
                    value="{{ old('quantity') }}">
                @error('quantity')
                    <span class="error-msg">{{ $message }}</span>
                @enderror
                <input type="file" name="cover" id="cover" value="{{ old('cover') }}">
                @error('cover')
                    <span class="error-msg">{{ $message }}</span>
                @enderror
                <input type="text" name="price" id="price" placeholder="Price" value="{{ old('price') }}">
                @error('price')
                    <span class="error-msg">{{ $message }}</span>
                @enderror
                <input type="submit" name="upload" value="Upload">
            </form>
        @else
            <p>Please wait until the admin approves you!</p>
        @endif
    </div>
</div>
</div>
<script src="https://kit.fontawesome.com/d3383a5202.js" crossorigin="anonymous"></script>
</body>

</html>
