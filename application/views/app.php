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

        <!-- Bootstrap-select -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-select/bootstrap-select-1.13.12.min.css">
        <script src="<?php echo base_url(); ?>assets/js/bootstrap-select/bootstrap-select-1.13.12.min.js"></script>
        
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Russo+One&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
        
        
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom/custom.css">

        
        <script>var base_url = '<?php echo base_url() ?>';</script>
    </head>
    <body>
        
        <!-- Password Modal -->
        <?php 
            if(empty($paste["PASTE_ID"])){
                $paste['PASTE_ID'] = "";
            }
            $attrs = array('id' => 'unlockForm');
            echo form_open('/'.$paste["PASTE_ID"],$attrs);
        ?>
        <div class="modal fade" id="passwordModal" tabindex="-1" role="dialog" aria-labelledby="passwordModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header d-block">
                        <h5 class="modal-title text-center" id="passwordModalTitle">This paste requires a password</h5>
                    </div>
                    <div class="modal-body d-block">
                        <div class="form-group row">
                            <div class="col-sm-6 offset-sm-3 text-center">
                                <!--<label for="unlockPassword" class="col-sm-2 col-form-label">Password</label>-->
                                <input type="password" class="form-control" id="unlockPassword" name="unlockPassword">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer  d-block">
                        <div class="text-center">
                            <button type="button" id="passSubmitBtn" type="submit" value="Submit" class="btn btn-primary">Unlock</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        </form>
        
        <!-- Navbar -->
        <?php echo form_open('/'); ?>
        <nav class="navbar navbar-expand-md navbar-dark bg-primary" id="navbar">
            
            <a class="navbar-brand brand-name text-center" href="<? echo base_url(); ?>"><? echo (getenv("BRAND_NAME") ? $_ENV["BRAND_NAME"]:"WASTEBIN"); ?><div class="brand-phrase text-center"><? echo (getenv("BRAND_PHRASE") ? $_ENV["BRAND_PHRASE"]:"Because all my code is trash"); ?></div></a>
            
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
    
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                
                
                
                
                <ul class="nav navbar-nav col-md-2 m-2 m-sm-2 m-md-0">
                    <li class="nav-item active" style="width:100%" >
                        <select class="selectpicker" name="language" id="languageSelect" data-style="btn-secondary" data-width="100%" data-live-search="true">
                            <optgroup label="Common Languages">
                                <?php
                                    if(!($unlocked)){
                                        $paste['LANGUAGE'] = "markdown";
                                        $paste['THEME'] = "monokai";
                                    }
                                    foreach($languages as $language){
                                        if($language['COMMON'] == "TRUE"){
                                            if($language['NAME'] == $paste['LANGUAGE']){
                                                echo "<option value='".$language['NAME']."' selected='Selected'>".$language['DISPLAY_NAME']."</option>";
                                            }
                                            else {
                                                echo "<option value='".$language['NAME']."'>".$language['DISPLAY_NAME']."</option>";
                                            }
                                        }
                                    }
                                ?>
                            </optgroup>
                            <optgroup label="All Languages" >
                                <?php
                                    foreach($languages as $language){
                                        if($language['NAME'] == $paste['LANGUAGE'] && $language['COMMON'] == "FALSE"){
                                                echo "<option value='".$language['NAME']."' selected='Selected'>".$language['DISPLAY_NAME']."</option>";
                                        }
                                        else {
                                            echo "<option value='".$language['NAME']."'>".$language['DISPLAY_NAME']."</option>";
                                        }
                                    }
                                ?>
                            </optgroup>
                        </select>
                    </li>
                </ul>
                
        
                <ul class="nav navbar-nav col-md-2 m-2 m-sm-2 mr-md-auto">
                        <li class="nav-item active" style="width:100%">
                        <!-- Theme drop-down -->
                        <select class="selectpicker shadow mx-auto" name="theme" id="themeSelect" data-width="100%" data-style="btn-secondary"  data-live-search="true">
                            <optgroup label="Dark">
                            <?php
                                foreach($themes as $theme){
                                    if($theme["LIGHT_DARK"] == "dark"){
                                        if($theme['NAME'] == $paste['THEME']){
                                            echo "<option value='".$theme['NAME']."' selected='selected'>".$theme['DISPLAY_NAME']."</option>";
                                        }
                                        else{
                                            echo "<option value='".$theme['NAME']."'>".$theme['DISPLAY_NAME']."</option>";
                                        }
                                    }
                                }
                            ?>
                        </optgroup>
                            <optgroup label="Light">
                            <?php
                                foreach($themes as $theme){
                                    if($theme["LIGHT_DARK"] == "light"){
                                        if($theme['NAME'] == $paste['THEME']){
                                            echo "<option value='".$theme['NAME']."' selected='selected'>".$theme['DISPLAY_NAME']."</option>";
                                        }
                                        else{
                                            echo "<option value='".$theme['NAME']."'>".$theme['DISPLAY_NAME']."</option>";
                                        }
                                    }
                                }
                            ?>
                        </optgroup>
                        </select>
                    </li>
                </ul>
                
                <!-- SETTINGS TEST -->
                
                
                
                 
                 <ul class="nav navbar-nav col-md-3 m-2 m-sm-2 m-md-0 mr-md-0">
                     <li class="nav-item active w-100">
                        <div class="form-inline" id="selfDestruct">
                            <div class="form-group form-group-xs w-100 ml-auto">
                                <input type="number" class="form-control w-50 m-sm-0 shadow" placeholder="Self Destruct In" id="expireNumber" name="expireNumber">
                                <select class=" shadow ml-0 w-50 form-control" data-width="100%" name="expireUnit" id="expire" data-style="bg-white">
                                    <option value="minutes">Minutes</option>";
                                    <option value="hours">Hours</option>";
                                    <option value="days">Days</option>";
                                    <option value="days">Weeks</option>";
                                    <option value="months">Months</option>";
                                </select>
                            </div>
                        </div>
                    </li>
                </ul>
                
               
                <!--<ul class="nav navbar-nav col-md-1 m-1 m-sm-1 m-md-0">-->
                <!--    <li class="nav-item active" style="width:100%">-->
                <!--        <div class="form-inline" id="selfDestruct" >-->
                <!--            <select class="selectpicker shadow"  placeholder="Password"data-width="100%" name="expire_time" id="expire" data-style="bg-white" >-->
                <!--                <option value='Never' data-icon="fa-heart">Time Unit</option>";-->
                <!--                <option value='minutes'>Minutes</option>";-->
                <!--                <option value='hours'>Hours</option>";-->
                <!--                <option value='days'>Days</option>";-->
                <!--                <option value='months'>Months</option>";-->
                <!--            </select>-->
                <!--        </div>-->
                <!--    </li>-->
                <!--</ul>-->
                
                
                
                
                
                
                <!--<ul class="nav navbar-nav col-md-1 m-1 m-sm-1 m-md-0">-->
                <!--    <li class="nav-item active" style="width:100%">-->
                <!--        <div class="form-inline" id="selfDestruct" >-->
                <!--            <select class="selectpicker shadow"  placeholder="Password"data-width="100%" name="expire_time" id="expire" data-style="bg-white" >-->
                <!--                    <option value='Never' data-icon="fa-heart">Never</option>";-->
                <!--                    <optgroup label="Minutes">-->
                <!--                        <option value='15 Minutes'>15 Minutes</option>";-->
                <!--                        <option value='30 Minutes'>30 Minutes</option>";-->
                <!--                        <option value='45 Minutes'>45 Minutes</option>";-->
                <!--                    </optgroup>-->
                <!--                    <optgroup label="Hours">-->
                <!--                        <option value='1 Hour'>1 Hour</option>";-->
                <!--                        <option value='3 Hours'>3 Hours</option>";-->
                <!--                        <option value='6 Hours'>6 Hours</option>";-->
                <!--                        <option value='12 Hours'>12 Hours</option>";-->
                <!--                    </optgroup>-->
                <!--                    <optgroup label="Days">-->
                <!--                        <option value='1 Day'>1 Day</option>";-->
                <!--                        <option value='7 Days'>7 Days</option>";-->
                <!--                        <option value='30 Days'>30 Days</option>";-->
                <!--                    </optgroup>-->
                <!--            </select>-->
                <!--        </div>-->
                <!--    </li>-->
                <!--</ul>-->

                <ul class="nav navbar-nav col-md-2 m-2 m-sm-2 m-md-0">
                    <li class="nav-item active w-100">
                        <div class="form-inline" id="passwordForm">
                            <div class="form-group w-100">
                                <input type="password" class="form-control w-100 shadow" placeholder="Set Password" id="password" name="password">
                            </div>
                        </div>
                    </li>
                </ul>
                
                <ul class="nav navbar-nav m-2 m-sm-2 m-md-0">
                    <li class="nav-item active">
                        <button class="btn btn-info shadow w-100" id="saveBtn">Save Paste</button>
                    </li>
                </ul>
            </div>
        </nav>
        
        
        
        
        
        
        
        <?php echo form_open('pastes/app'); ?>
        <!-- Content -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12" id="editor_column">
                     <!-- Show the code if $unlocked is true -->
                    <div id="editor"></div>
                    <?php
                        if(!($unlocked)){
                          echo "<script>$('#passwordModal').modal({backdrop: 'static',focus: true,keyboard: false,})</script>"; 
                        }
                        else if($unlocked){
                            echo("<script>$('#editor').text(atob('".$paste['CODE']."'));</script>");
                        }
                    ?>
                    
                    <input type="hidden" name="code" id="editorInput" />
                    <script src="<?php echo base_url(); ?>assets/js/ace/ace.js" type="text/javascript" charset="utf-8"></script>
                    <script src="<?php echo base_url(); ?>assets/js/custom/ace_settings.js" type="text/javascript" charset="utf-8"></script>
                    <script src="<?php echo base_url(); ?>assets/js/custom/scripts.js" type="text/javascript" charset="utf-8"></script>
                    <script>
                        editor.session.setMode("ace/mode/<?php echo(trim($paste['LANGUAGE'])); ?>");
                        editor.setTheme("ace/theme/<?php echo(trim($paste['THEME'])); ?>");
                    </script>
                </div>
            </div>
        </div>
        </form>
    </body>
</html>
            
        