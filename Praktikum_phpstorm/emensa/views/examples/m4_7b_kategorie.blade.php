<html>
<body></body>

<ul>
    @foreach($kategorie as $k)
                <li>
                     @if($loop -> odd)
                       <strong>{{$k ['name']}}</strong>
            @endif

                               @if($loop -> even)
                                       {{$k ['name']}}
                        @endif
        </li>
    @endforeach

</ul>

</body>
</html>
