<html>    
    <head>
        <meta name="viewport" content="width=device-width">
        <title><? echo (getenv("PAGE_TITLE") ? $_ENV["PAGE_TITLE"]:"WASTEBIN"); ?></title>
        
        <!-- jQuery -->
        <script src="<?php echo base_url(); ?>assets/js/jquery/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="></script>
        
        <!-- Bootstrap -->
        <script src="<?php echo base_url(); ?>assets/js/bootstrap/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap/bootstrap-4.4.1.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/bootstrap/bootstrap-darkly.min.css">
        
        <!-- Custom -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom/custom.css">

        <!-- Bootstrap-select -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-select/bootstrap-select-1.13.12.min.css">
        <script src="<?php echo base_url(); ?>assets/js/bootstrap-select/bootstrap-select-1.13.12.min.js"></script>
        
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Russo+One&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

        <script>var base_url = '<?php echo base_url() ?>';</script>
    </head>
    <body>
        <div class="container-fluid">
            <div class="h-100 row align-items-center">
                <div class="col-sm-4 offset-sm-4 text-center bg-secondary card shadow">
                    <br>
                    You must enter the password to submit this paste<br><br>
                    <form method="post">
     
                        <input type="password" id="password" name="admin_password" placeholder="Password" style="width:50%">
                        <br><br>
                        <div class="text-center">
                            <button class="btn btn-info shadow" type="submit">Continue</button>
                        </div>
                        <br>
                        <div class="text-danger"><? 
                            if($incorrect_admin_password == true){
                                echo "Incorrect Password";
                            } 
                        ?></div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>