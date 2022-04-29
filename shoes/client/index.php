<?php
session_start();
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Cipő bolt</title>
</head>
<body>
    <script>
        $(document).ready(function() {
            $('.dropdown-submenu a.test').on("click", function(e) {
                $(this).next('ul').toggle();
                e.stopPropagation();
                e.preventDefault();
            });
        });
    </script>
    <style>
        .dropdown-submenu {
            position: relative;
        }

        .dropdown-submenu .dropdown-menu {
            top: 0;
            left: 100%;
            margin-top: -1px;
        }
    </style>
    <div class="container-fluid margin10">
        <nav class="navbar navbar-expand-sm nav-dark bg-dark navbar-dark">
            <div class="d-flex w-100">
                <div class="mr-auto">
                    <div class="navbar-nav">
                        <a href="index.php?program=home.php" class="nav-link navbar-brand mt-2">1-Shoe-3</a>
                        <div class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle mt-2" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Cipők</a>
                            <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="index.php?program=products.php">Összes cipő</a></li>
                                <li><a class="dropdown-item" href="index.php?program=products.php&open=M">Férfi cipők</a></li>
                                <li><a class="dropdown-item" href="index.php?program=products.php&open=W">Női cipők</a></li>
                                <li class="dropdown-submenu">
                                    <a class="test dropdown-item" href="#">Gyermek cipők <svg class="ml-1" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                                            <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z" />
                                        </svg></a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="index.php?program=products.php&open=C">Összes gyerek cipő</a></li>
                                        <li><a class="dropdown-item" href="index.php?program=products.php&open=G">Lány cipők</a></li>
                                        <li><a class="dropdown-item" href="index.php?program=products.php&open=B">Fiú cipők</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>

                        <?php
                        if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') :
                        ?>
                            <a href="index.php?program=products_delete.php" class="nav-link mt-2">Cipő törlése</a>
                            <a href="index.php?program=products_edit.php" class="nav-link mt-2">Cipők módosítása</a>
                            <a href="index.php?program=products_insert.php" class="nav-link mt-2">Cipő felvétele</a>
                        <?php
                        endif
                        ?>
                    </div>
                </div>
                
                <?php
                        if (isset($_SESSION['username'])) :
                        ?>
                <div id="kosar" class="mt-2">
                    <a class="btn btn-success text-center" href="index.php?program=cart.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 
                            .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 
                            2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 
                            0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"></path>
                        </svg>
                        <span id="qty">
                            <?= isset($_SESSION['quantity']) ? ($_SESSION['quantity'] == 0 ? '' : $_SESSION['quantity']) : '' ?>
                        </span>
                    </a>
                </div>
                        <?php
                        endif;
                        ?>
                <div class="p-2">
                    <div class="navbar-nav loginSystem">
                        <?php
                        if (isset($_SESSION['username'])) :
                        ?>
                            <a href="#" class="nav-link"><?= $_SESSION['username'] ?></a>
                            <a href="../server/logout.php" class="nav-link">Kilépés</a>
                        <?php
                        else :
                        ?>
                            <a href="index.php?program=auth/login.php" class="nav-link">Belépés</a>
                            <a href="index.php?program=auth/register.php" class="nav-link">Regisztráció</a>
                        <?php
                        endif;
                        ?>
                    </div>

        </nav>
    </div>
    </div>
    </div>
    <div class="container">
        <?php
        if (isset($_GET["program"]))
            include $_GET["program"];
        else
            include "home.php";
        ?>
    </div>

    <script>
        console.log(document.URL)
        for (let obj of document.links)
            if (obj.href == document.URL)
                obj.style = "color: #007bff !important;"

        function filterFunction(obj) {
            let word = obj.value.toLowerCase()
            fetch(`../server/filterTitle.php?title=${word}`)
                .then(response => response.json())
                .then(data => console.log(data))


        }
    </script>

</body>

</html>