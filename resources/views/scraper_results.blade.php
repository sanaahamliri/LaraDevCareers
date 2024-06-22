<!-- resources/views/scraper_results.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Scraper Results</title>
</head>
<body>
    <h1>Scraper Results</h1>
    @if(isset($ads) && count($ads) > 0)
        <ul>
            @foreach($ads as $ad)
                <li>{{ $ad['title'] }} - {{ $ad['price'] }}</li>
            @endforeach
        </ul>
    @else
        <p>No advertisements found.</p>
    @endif
</body>
</html>
