<table>
    <thead>
    <tr>
        <td>Id</td>
        <td>Name</td>
    </tr>
    </thead>
    <tbody>
    @foreach($countries as $country)
        <tr>
            <td>{{ $country->id }}</td>
            <td>{{ $country->name }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
