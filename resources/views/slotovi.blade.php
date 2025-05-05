<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dostupni Slotovi</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Dostupni Slotovi</h1>

        <table class="table table-bordered mt-4">
            <thead class="table-dark">
                <tr>
                    <th>Datum</th>
                    <th>Vrijeme</th>
                    <th>Tip Vozila</th>
                    <th>Status</th>
                    <th>Akcija</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($slotovi as $slot)
                    <tr>
                        <td>{{ $slot->datum }}</td>
                        <td>{{ $slot->vrijeme_pocetka }} - {{ $slot->vrijeme_zavrsetka }}</td>
                        <td>{{ $slot->tip_vozila }}</td>
                        <td>{{ ucfirst($slot->status) }}</td>
                        <td>
                            @if ($slot->status === 'slobodan')
                                <form action="{{ route('rezervisi') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="slot_id" value="{{ $slot->id }}">
                                    <button type="submit" class="btn btn-primary">Rezerviši</button>
                                </form>
                            @else
                                <button class="btn btn-secondary" disabled>Rezervisan</button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="text-center">
            <a href="/" class="btn btn-dark">Nazad na početnu</a>
        </div>
    </div>
</body>
</html>