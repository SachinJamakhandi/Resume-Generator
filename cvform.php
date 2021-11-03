<?php

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    header("location: login.php");
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .fbody
        {
        background: url('https://i.stack.imgur.com/ArGCn.png');
        background-size: cover;
        background-blend-mode: darken;
        }
    </style>
    <title>Resume Generator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <link rel="stylesheet" href="style.css">
</head>
<body class="fbody">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">CV Creator System</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="welcome.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="cvform.php">Create CV</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
    </ul>

  <div class="navbar-collapse collapse">
  <ul class="navbar-nav ml-auto">
  <li class="nav-item active">
        <a class="nav-link" href="#"> <img src="https://img.icons8.com/metro/26/000000/guest-male.png"> <?php echo "Welcome ". $_SESSION['username']?></a>
      </li>
  </ul>
  </div>


  </div>
</nav>
    <div class="container text-light">
    <h1 class="text-center my-5 fw-bold">Resume Form</h1>
    <div class="form-container">
        <form action="submit.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="token" value="HGsZOXpfNC">
            <div class="border border-dark p-3 mb-3">    
                <h2>Profile Image</h2>
                <div class="mb-3">
                    <label class="form-label">Select a square image 1:1 (Recommended)</label>
                    <input class="form-control" name="profile_image" type="file" required>
                </div>
            </div>
            <div class="border border-dark p-3 mb-3">    
                <h2>Name & Contact Details</h2>
                <div class="d-flex justify-content-between mb-3">
                    <div>
                        <label class="form-label">First Name</label>
                        <input type="text" name="first_name" class="form-control" required>
                    </div>
                    <div>
                        <label class="form-label">Last Name</label>
                        <input type="text" name="last_name" class="form-control" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Profession</label>
                    <input type="text" class="form-control" name="profession" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email address</label>
                    <input type="email" class="form-control" name="email" required>
                    <div class="form-text text-light">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Phone number</label>
                    <input type="tel" class="form-control" id="phone" name="phone" placeholder="0300-1234567" pattern="[0-9]{4}-[0-9]{7}" required>
                </div>
            </div>
            <div class="border border-dark p-3 mb-3">    
                <h2>Skills (Max:5)</h2>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Skillset Name</label>
                    <input type="text" class="form-control" name="skill1" required>
                    <select class="form-select mt-2" name="skill_level1" required>
                        <option value="">Select stars based upon your skill level</option>
                        <option value="1">1 - Novice</option>
                        <option value="2">2 - Advanced Beginner</option>
                        <option value="3">3 - Competent</option>
                        <option value="4">4 - Proficient</option>
                        <option value="5">5 - Expert</option>
                    </select>
                </div>
                <div id="addSkill"></div>
                <div class="mb-3">
                    <button type="button" id="skill_hide" class="btn btn-primary form-control" onclick="addSkill()">+</button>
                </div>
            </div>
            <div class="border border-dark p-3 mb-3">    
                <h2>Hobbies (Max:4)</h2>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Hobby</label>
                    <input type="text" name="hobby1" class="form-control" required>
                </div>
                <div id="addHobby"></div>
                <div class="mb-3">
                    <button type="button" id="hobby_hide" class="btn btn-primary form-control" onclick="addHobby()">+</button>
                </div>
            </div>
            <div class="border border-dark p-3 mb-3">    
                <h2>About Me</h2>
                <div class="form-floating">
                    <textarea class="form-control" name="about_me" style="height: 100px" required></textarea>
                </div>
            </div>
            <div class="border border-dark p-3 mb-3">    
                <h2>Education (Max:3)</h2>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">School/College/University</label>
                    <input type="text" name="institute1" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Degree Name</label>
                    <input type="text" name="degree1" class="form-control">
                </div>
                <div class="mb-3 d-flex justify-content-between">
                    <div>
                        <label for="exampleInputEmail1" class="form-label">From</label>
                        <input type="text" name="from1" class="form-control">
                    </div>
                    <div>
                        <label for="exampleInputEmail1" class="form-label">To</label>
                        <input type="text" name="to1" class="form-control">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Grade/Score/CGPA</label>
                    <input type="text" name="grade1" class="form-control">
                </div>
                <div id="addEducation"></div>
                <div class="mb-3">
                    <button type="button" id="education_hide" class="btn btn-primary form-control" onclick="addEducation()">+</button>
                </div>
            </div>
            <div class="border border-dark p-3 mb-3">    
                <h2>Experience (Max:3)</h2>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Title</label>
                    <input type="text" name="title1" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Description</label>
                    <input type="text" name="description1" class="form-control">
                </div>
                <div id="addExperience"></div>
                <div class="mb-3">
                    <button type="button" id="experience_hide" class="btn btn-primary form-control" onclick="addExperience()">+</button>
                </div>
            </div>
            <input type="submit" class="form-control my-2 bg-danger text-white rounded-pill mt-2">
        </form>
    </div>
    </div>
    <footer class="page-footer font-small unique-color-dark pt-4 text-light">

  <!-- Footer Elements -->
  <div class="container">

    <!-- Call to action -->
    <ul class="list-unstyled list-inline text-center py-2">
      <li class="list-inline-item">
        <h5 class="mb-1"></h5>
      </li>
    </ul>
    <!-- Call to action -->

  </div>
  <!-- Footer Elements -->

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2021Copyright:
    <a href="index.php">Unique CV Creators</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->

    
    <script src="app.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>