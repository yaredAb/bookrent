@include('../layout/pannel_header')
<div class="section2"><!--the body part-->
    @include('../Dashboard/Dcomponents/dashboard-header', ['title' => 'Owner', 'current'=>'Dashboard'])

    <div class="main-body"><!--the main body part-->
        <div class="stat-info"><!--the number information goes here-->
            <h2>This Month Statistics</h2>
            <p class="date">{{ $date }}</p>
            <div class="shadow-box top-box"><!--statics section 1-->
                <div class="header">
                    <p>Income</p>
                    <span>This Month</span>
                </div>
                @php
                    $income = null;
                @endphp
                @foreach ($books as $book)
                    {{ $income = $book->sold * floatval($book->price) }}
                @endforeach
                <div class="price">
                    <h1>ETB {{ $income }}</h1>
                    <span>0%</span>

                </div>
                <p class="compaired">Compared to last month</p>
                <div class="price-bottom">
                    <h2>Last month Income</h2>

                    <h2>ETB 0</h2>
                </div>
            </div>
            @include('../Dashboard/Dcomponents/dashboard-stat')
        </div><!--Stat info ended here-->

        @php
            $table_rows = ['Book No.', 'Book Name', 'Status', 'Price', 'Action'];
        @endphp
        @include('../Dashboard/Dcomponents/dashboard-tableNav', [
            'items' => $books,
            'title' => 'Book Status',
            'rows' => $table_rows,
        ])

    </div>
</div>
@include('../Dashboard/Dcomponents/dashboard-chart')
</div>
<script src="https://kit.fontawesome.com/d3383a5202.js" crossorigin="anonymous"></script>
</body>

</html>
