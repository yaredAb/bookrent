<div class="sub-main-body"><!--the books info goes here-->
    <div class="shadow-box top-main-body"><!--the top bar-->

        <div class="datas">
            <h1>{{ $title }}</h1>
            <table>
                @if (count($items) > 0)
                    <tr>
                        @for ($i = 0; $i < sizeof($rows); $i++)
                            <th>{{ $rows[$i] }}</th>
                        @endfor
                    </tr>
                    <tbody>
                        @foreach ($items as $item)
                        <!--checking if the logged in user is owner or admin-->
                            @if (Auth::user()->privilage == 'owner')
                                <x-table bookId="{{ $item->id }}" bookTitle="{{ $item->title }}"
                                    bookPrice="{{ $item->price }}" status="{{ $item->quantity }}" />
                            @else
                                <x-usersTable userId="{{ $item->id }}" userEmail="{{ $item->email }}"
                                    userLocation="{{ $item->location }}" userJoined="{{ $item->created_at }}" />
                            @endif

                        @endforeach
                    </tbody>
                @else
                    <tr>No Approved books here. please wait until the Admin approved it!</tr>
                @endif

            </table>
        </div>
    </div>
    <div class="bottom-graph-body"><!--the graph bar-->
        <canvas id="myChart"></canvas>
    </div>
</div>
