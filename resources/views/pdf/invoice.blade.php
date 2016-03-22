<ul>
    @foreach($books as $book)
    <p>This is Title {{ $book->title }}</p>
    @endforeach
</ul>