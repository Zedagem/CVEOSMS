<?php include '../header.php'; ?>

        <title>Login Page</title>
        <style>
            body{
                background-color: #C4E8F1;
            }
            .btn{
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

            input[type=text], input[type=password]{
                width:30vw;
                height:3.5vw;
                background-color:#C4E8F1;
                border-color:#662D8D;
                border-radius:12px;
                color: black;
                padding:10px;
                margin-bottom:10px;
                font-size: 1.5vw;
                box-sizing: border-box;
            }
          

        </style>


       
    </head>
    
    <body>
        <div class="container">

                <div class="row ">
                    <div class="col v-center">
                        

                        <div class="form-signin m-5 text-center">
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                           
                            <h1 class="mb-4">SIGN IN </h1>

                                <div class="form-floating mb-3">
                                    <input type="text" name="idNumber" placeholder="ID Number" 
                                    
                                    required>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="password" name="password" placeholder="Password" required>
                                </div>

                                <div > 
                                    <input class = "btn"type="submit" name="submit" value="SIGN IN">
                            
                                </div>
                           
                            
                           

                    
                        
                            </form>

                        </div>
                 </div>


                 <div class="col v-center">
                    <div class="row">

                            <div class="position-absolute m-5">
                                <img class="overlay" src="../img/LandingArts@2x.png" alt="LandingArts ">
                            </div>
                            
                            <div class="text-center "> 
                                <img src="../img/ethiopia.svg" alt="ethiopia">
                            </div>    
            
                    </div>
                 </div>
        
                

        	</div>
		</div>
    </body>
</html>
