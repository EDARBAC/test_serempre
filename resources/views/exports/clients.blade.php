<table>
    <thead>
        <tr>
            <th>Code</th>
            <th>Name</th>
            <th>City</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($clients as $client)
            <tr>
                <td>{{ $client->cod }}</td>
                <td>{{ $client->name }}</td>
                <td>{{ $client->cityy->name }}</td>
            </tr>
        @endforeach
    </tbody>
</table>