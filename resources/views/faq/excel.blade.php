<table>
    <thead>
    <tr>
        <td>Id</td>
        <td>Question</td>
        <td>Answer</td>
    </tr>
    </thead>
    <tbody>
    @foreach($faqs as $faq)
        <tr>
            <td>{{ $faq->id }}</td>
            <td>{{ $faq->question }}</td>
            <td>{{ $faq->answer }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
