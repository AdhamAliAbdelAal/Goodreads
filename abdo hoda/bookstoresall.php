<?php
  $connect=mysqli_connect('localhost','root','','goodreads');
session_start();
//$_SESSION['handle']='@abdo';
// $bookauthor=addslashes($_SESSION['handle']);
// #$sql='SELECT bookImage, title, price FROM book where $bookauthor=handle '  WHERE BookAuthor = $bookauthor;
// $sql1="SELECT bookImage, title, price,Fname FROM book,author  WHERE BookAuthor = '$bookauthor' and Handle='$bookauthor'";
// $result=mysqli_query($connect,$sql1);
// $abook=mysqli_fetch_all($result,MYSQLI_ASSOC);
$bookstores="SELECT NAME,Location,StoreImage,ID FROM store ";
$result=mysqli_query($connect,$bookstores);
$mystore=mysqli_fetch_all($result,MYSQLI_ASSOC);
// $other="SELECT Fname,NumberOfBooks FROM author WHERE Handle !='$bookauthor' ";
// $result=mysqli_query($connect,$other);
// $otherauthor=mysqli_fetch_all($result,MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="../Footer/footerStyle.css">
    <link rel="stylesheet" href="../WebsiteHeader/2headerStyle.css">
    <!-- <link rel="stylesheet" href="../Adham/formStyle.css"> -->
    <link rel="stylesheet" href="homepage.css">
    <style>
    /* .navbar-dark .navbar-nav .nav-link:focus,
    .navbar-dark .navbar-nav .nav-link:hover {
        color: rgb(255 255 255);
    } */
    .card {
        margin: 10%;
    }

    .card-img-top {
        margin-top: 4%;
    }

    .card-title {
        font-size: 26px;
        font-weight: bold;
    }

    .btn {
        background-color: #1b8bcb;
    }
    </style>
</head>

<body>
    <?php include '../WebsiteHeader/2header.php' ?>

    <div class=" mb-2">
        <h1 class="text-center black py-5 ">Book stores</h1>
    </div>

    </div>
    <div class="container">
        <div class="books row d-flex justify-content-center " style="grid-gap: 5%;">
            <?php foreach($mystore as $pizza){ ?>
            <div class="col-sm col-md-5 col-lg-3 book row justify-content-center bh">
                <div class="card " style="width: 18rem; ">
                    <img class="card-img-top" src="../images/<?php echo htmlspecialchars($pizza['StoreImage']); ?>"
                        alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($pizza['NAME']); ?></h5>
                        <p class="card-text"> <?php echo htmlspecialchars($pizza['Location']); ?></p>
                        <a href="../abdo hoda/bookstoreone.php?ID=<?php echo $pizza['ID'] ?>" class="btn btn-primary">Visit</a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>


    </div>
    </div>


    <!-- js link -->
    <?php include '../Footer/footer.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

</body>