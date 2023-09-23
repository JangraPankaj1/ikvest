<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap">
  <title>Happy Birthday || Ikvest</title>
</head>
<body>
  <div class="birthdayCard">
    <div class="card">
      <div class="text">
      @if ($user->image_path)
        <img src="{{ asset($user->image_path) }}"  alt="Profile Image" id="existing-image-preview">
        @else
        <img src="{{ asset('images/girl.png') }}" />
        @endif 

        <h1>Happy Birthday! {{$user->f_name}}</h1>
        <p>Have a great future..!</p>
        <p>- LearningRobo</p>
        <div class="credit">Made with <span style="color:tomato">❤</span></div>
      </div>
      <div class="space"></div>
    </div>
  </div>
</body>
</html>
