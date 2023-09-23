<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap">
  <link href="https://fonts.googleapis.com/css2?family=Alex+Brush&family=Poppins:wght@100;300;400;500;600;700;900&family=Sorts+Mill+Goudy&display=swap" rel="stylesheet">
  <title>Happy Anniversary || Ikvest</title>
</head>
<body>
  <div class="anniversaryCard birthdayCard">
    <div class="card">
      <!-- <img src="{{ asset('path-to-your-image.png') }}" alt="birthday" class="birthday"> -->
      <div class="text">
        <div class="d-flex justify-content-between w-100">
        @if ($user->image_path)
        <img src="{{ asset($user->image_path) }}" height="30" width="30" alt="Profile Image" id="existing-image-preview">
        @else
        <img src="{{ asset('images/boy.png') }}" alt="anniversary person"/>
        @endif 

        </div>
        <h1>Happy Anniversary! {{$user->f_name}}</h1>
        <p>Made for each other</p>
        <p>- LearningRobo</p>
        <div class="credit">Made with <span style="color:rgb(255, 38, 0)">❤</span></div>
      </div>
      <div class="space"></div>
    </div>
  </div>
</body>
</html>
