@include('../layout/pannel_header')
<div class="section2"><!--the body part-->
    @include('../Dashboard/Dcomponents/dashboard-header', ['title' => 'Admin', 'current' => 'Users Table'])

    <div class="main-body">

        @if (count($users) > 0)
            <table class="user-list">
                <tr>
                    <th>No.</th>
                    <th>Id</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Location</th>
                    <th>Action</th>
                    <th>Status</th>
                </tr>
                @php
                    $count = 1;
                @endphp

                @foreach ($users as $user)
                    <tr>
                        <td>{{ $count }}</td>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone_number }}</td>
                        <td>{{ $user->location }}</td>
                        <td>
                            <form action="{{ route('deleteUser', $user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button style="background-color: #fff; border:none;"><i class="fa-solid fa-trash"
                                        style="color: #e7041a;"></i></button>
                            </form>
                        </td>
                        <td>
                            @if ($user->status == 'approved')
                                <a href="{{ route('user-deny', $user->id) }}"
                                    style="background-color: green; color:rgb(220, 219, 219);">Approved</a>
                            @else
                                <a href="{{ route('user-approval', $user->id) }}"
                                    style="background-color: rgb(220, 219, 219)">Approve</a>
                            @endif
                        </td>
                    </tr>

                    @php
                        $count++;
                    @endphp
                @endforeach
            @else
            </table>
            <p style="font-size: 20px; text-align:center; font-weight:bold; padding: 10px 0;">No user is created yet!
            </p>
        @endif


    </div>

    @include('../Dashboard/Dcomponents/dashboard-chart')
</div>
<script src="https://kit.fontawesome.com/d3383a5202.js" crossorigin="anonymous"></script>
</body>
