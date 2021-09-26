<?php include 'header.php'; ?>

<title>HomePage</title>
<style>
    body {
        background-color: #C4E8F1;
    }

    button {
        width: 20vw;
        height: 3vw;
        color: white;
        background-color: #090A4E;
        font-size: 1vw;
    }

    .v-center {
        margin-top: 5vw;
    }

    img {
        width: 500px;

    }

    /* If the screen size is 601px wide or more, set the font-size of  to 80px */
    @media screen and (min-width: 601px) {
        h1 {
            font-size: 40px;
        }
        p {
            font-size: 20px;
        }
        span{
            font-size: 20px;
        }
        h4{
            font-size: 20px;
        }
    }

    /* If the screen size is 600px wide or less, set the font-size of <div> to 30px */
    @media screen and (max-width: 600px) {
        h1 {
            font-size: 20px;
        }
        p {
            font-size: 10px;
        }
        span{
            font-size: 10px;
        }
        h4{
            font-size: 10px;
        }
    }



    h4 {
        color: blue;
        display: inline;
    }
   
</style>



</head>

<body>
    <div class="container">

        <div class="row mt-5">
            <div class="col-lg-6 v-center ">
                <h1 class="text-center m-5">Online Service Registration in Addis Ababa Woreda</h1>
                <p class="text-justify m-5">Welcome to CVEOSMS. A system designed to make every
                    civil and vital events services easily available to everyone.
                    Here you can remotely request for every service from the
                    comfort of your home. Never waste time, never miss work
                </p>
                <hr style="border: solid 2px black;">
                <div  class="text-justify m-5" >
                <h4>Rule 1</h4>
                <span  >: To register online your household information needs to be registered first. To do that please go to your woreda  </span>
                
               
                <h4>Rule 2</h4>
                <span>: You must be at least 18 years old to register </span>
                </div>


                
                <div class="text-center m-5">
                    <button onclick="location.href='loginPage.php'">LogIn</button>

                </div>
            </div>





            <div class="col-lg-6 d-none d-lg-block d-xl-block v-center">

                <div class="position-absolute m-5">
                    <img class="overlay" src="img/LandingArts@2x.png" alt="LandingArts ">
                </div>

                <div class="text-center ">
                    <img src="img/ethiopia.svg" alt="ethiopia">
                </div>

            </div>


        </div>
    </div>
</body>

</html>