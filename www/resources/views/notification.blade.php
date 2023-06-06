@if ($notifications)
    @foreach ($notifications as $id => $notification)
        <p>{{ $id }} : {{ $notification }}</p>
    @endforeach
@else
    <p>count notifications: 0 </p>
@endif