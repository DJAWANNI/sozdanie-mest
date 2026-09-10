<x-head />

<body>
    <x-header />
    @if(auth()->user())
    123123
    @else

    @if(request('regauth') == 'auth')
    <x-auth />
    @else
    <x-register />
    @endif
    @endif

    <x-scripts />
</body>

</html>