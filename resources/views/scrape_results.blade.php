<!-- resources/views/scrape_results.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Scrape Results</title>
</head>
<body>
    <h1>Scrape Results</h1>
    @if(!empty($ads))
        <ul>
            @foreach($ads as $ad)
                <li>
                    <img src="{{ $ad['imageUrl'] }}" alt="Image" width="100">
                    <h2>{{ $ad['title'] }}</h2>
                    <p>{{ $ad['price'] }}</p>
                </li>
            @endforeach
        </ul>
    @else
        <p>No ads found.</p>
    @endif
</body>
</html>
