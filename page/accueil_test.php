<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Test navbar</title>
</head>

<body>
    <!-- Navbar-->
    <nav class="navbar navbar-expand-md navbar-light" 
         style="background-color: blueviolet;">
    <a href="#"><i class="fas fa-anchor text-warning fa-2x"></i></a>
    <ul class="navbar-nav">
        <li class="nav-item">
            <a  class="nav-link text-light 
                    font-weight-bold text-uppercase px-3" 
                href="#">Home</a>
        </li>
        <li class="nav-item">
            <a  class="nav-link text-light 
                    font-weight-bold text-uppercase px-3" 
                href="#">Skills</a>
        </li>
        <li class="nav-item dropdown">
            <a  class="nav-link text-light 
                    font-weight-bold text-uppercase px-3"
                href="#">Projects</a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Project 1</a>
                <a class="dropdown-item" href="#">Project 2</a>
                <a class="dropdown-item" href="#">Project 3</a> 
            </div>
        </li>
    </ul>
    <!-- Ajoutez les 3barres pour pouvoir choisir de ce login ou se register -->
</body>
</html>
