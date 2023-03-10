<table>
    <thead>
        <tr>
            <td>Id</td>
            <td>Name</td>
            <td>Country id</td>
        </tr>
    </thead>
    <tbody>
        @foreach($cities as $city)
            <tr>
                <td> {{ $city->id }} </td>
                <td> {{ $city->name }} </td>
                <td> {{ $city->country_id }} </td>
            </tr>
        @endforeach
    </tbody>
</table>
