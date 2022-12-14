<ul>
    @foreach($gerichte as $g)
        <li>
                @if(number_format($g['preis_intern'],2) > 2)

                {{ $g['name'] }}
                {{ number_format($g['preis_intern'],2) }}&euro;

                @else
                        Es sind keine Gerichte vorhanden
                @endif
        </li>
    @endforeach
</ul>
