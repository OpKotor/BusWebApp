<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dostupni Slotovi</title>
</head>
<body>
    <h1>Dostupni Slotovi</h1>
    <table>
        <thead>
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
                    <td>{{ $slot->status }}</td>
                    <td>
                        <form action="/rezervacija" method="POST">
                            @csrf
                            <input type="hidden" name="slot_id" value="{{ $slot->id }}">
                            <button type="submit">Rezerviši</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>