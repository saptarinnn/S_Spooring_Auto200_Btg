<form class="{{ $class ?? ''}}" method="POST" action="{{ $action ?? '' }}">
    @csrf
    {{ $slot }}
</form>
