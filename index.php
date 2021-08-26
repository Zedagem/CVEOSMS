<?php include 'header.php'; ?>

        <title>HomePage</title>
        <style>
            body{
                background-color: #C4E8F1;
            }
            button{
                width:20vw;
                height:3vw;
                color: white;
                background-color: #090A4E;
                font-size: 1vw;
            }
            .v-center{
                margin-top: 5vw;
            }
            img{
                width: 500px;
                
            }
            p{
                font-size: 1vw;
            }
          

        </style>


       
    </head>
    
    <body>
        <div class="container">

                <div class="row mt-5">
                    <div class="col v-center ">
                        <h1 class="text-center m-5" >Online Service Registration in Addis Ababa Woreda</h1>
                        <p class="text-justify m-5">Welcome to CVEOSMS. A system designed to make every 
                        civil and vital events services easily available to everyone. 
                        Here you can remotely request for every service from the 
                        comfort of your home. Never waste time, never miss work, 
                        welcome to the future...... 
                        </p>
                        <div class="text-center m-5">
                            <button onclick="location.href='loginPage.php'">LogIn</button>

                        </div>
           
                   
                </div>

                <?php include 'rightSideArt.php';?>

        	</div>
		</div>
    </body>
</html>
