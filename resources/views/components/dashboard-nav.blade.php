@props(['to', 'icon', 'name'])

<a href="{{ route($to) }}" class="option">
    <i class="fa-solid {{$icon}}" style="color: #fcfcfc;"></i>
    <p>{{$name}}</p>
</a>
