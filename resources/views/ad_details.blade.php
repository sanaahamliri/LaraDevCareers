<!-- resources/views/ad_details.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Ad Details</title>
</head>
<body>
    <h1>{{ $ad->title }}</h1>
    <img src="{{ $ad->imageUrl }}" alt="Image" width="100">
    <p><strong>Price:</strong> {{ $ad->price }}</p>
    <p><strong>Location:</strong> {{ $ad->location }}</p>
    <p><strong>Rooms:</strong> {{ $ad->rooms }}</p>
    <p><strong>Size:</strong> {{ $ad->size }}</p>
    <p><strong>Type:</strong> {{ $ad->type }}</p>
    <p><strong>End Date:</strong> {{ $ad->endDate }}</p>
</body>
</html>
