<?php echo form_open('/'); ?>
    <nav class="navbar navbar-expand-md navbar-dark bg-primary">
        
        <a class="navbar-brand brand-name text-center" href="#">WASTEBIN<div class="brand-phrase text-center">Because all my code is trash</div></a>
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="nav navbar-nav mr-auto">
                <li class="nav-item active">
                    <select class="selectpicker shadow mx-auto" name="language" id="languageSelect" data-style="btn-success" data-width="100%" data-live-search="true">
                        <optgroup label="Common Languages">
                            <?php
                                if(!($unlocked)){
                                    $paste['LANGUAGE'] = "markdown";
                                    $paste['THEME'] = "monokai";
                                }
                                $handle = fopen(APPPATH."../assets/formdata/modes_common.txt", "r");
                                if ($handle)
                                {
                                    while (($line = fgets($handle)) !== false) {
                                        $line = trim($line);
                                        if (strtolower($line) == trim($paste['LANGUAGE'])){
                                            echo "<option value='".strtolower($line)."' selected='Selected'>".$line."</option>";
                                        }
                                        else{
                                            echo "<option value='".strtolower($line)."'>".$line."</option>";
                                        }
                                    }
                                    fclose($handle);
                                }
                            ?>
                        </optgroup>
                        <optgroup label="All Languages" >
                            <?php
                                $handle = fopen(APPPATH."../assets/formdata/modes.txt", "r");
                                if ($handle)
                                {
                                    while (($line = fgets($handle)) !== false) {
                                        echo "<option value='".strtolower($line)."'>".$line."</option>";
                                    }
                                    fclose($handle);
                                }
                            ?>
                        </optgroup>
                    </select>
                    <div class="d-block d-md-none mt-3"></div>
                </li>
                <li class="nav-item active">
                <!-- Theme drop-down -->
                    <select class="selectpicker shadow ml-sm-3 mx-auto" name="theme" id="themeSelect" data-style="btn-danger"  data-width="100%" data-live-search="true">
                <optgroup label="Dark">
                    <?php
                        $handle = fopen(APPPATH."../assets/formdata/themes_dark.txt", "r");
                        if ($handle)
                        {
                            while (($line = fgets($handle)) !== false) {
                                $value = explode(",",$line);
                                if(trim($value[1]) == trim($paste['THEME'])){
                                    echo "<option value='".$value[1]."' selected='selected'>".$value[0]."</option>";
                                }
                                else{
                                    echo "<option value='".$value[1]."'>".$value[0]."</option>";
                                }
                            }
                            fclose($handle);
                        }
                    ?>
                </optgroup>
                <optgroup label="Light">
                    <?php
                        $handle = fopen(APPPATH."../assets/formdata/themes_light.txt", "r");
                        if ($handle)
                        {
                            while (($line = fgets($handle)) !== false) {
                                $value = explode(",",$line);
                                if(trim($value[1]) == trim($paste['THEME'])){
                                    echo "<option value='".$value[1]."' selected='selected'>".$value[0]."</option>";
                                }
                                else{
                                    echo "<option value='".$value[1]."'>".$value[0]."</option>";
                                }
                            }
                            fclose($handle);
                        }
                    ?>
                </optgroup>
            </select>
                </li>
            </ul>
            <!-- Settings Button -->
            <button class="btn btn-secondary  btn-sm mr-sm-3"  data-toggle="collapse" data-target="#settingsPanel" aria-expanded="false" id="passwordBtn" type="button"><small>Settings</small></button>

            <div class="form-inline my-2 my-sm-0 mr-sm-3 mr-sm-0">
                    <button class="btn btn-info my-2 my-sm-0 shadow" id="saveBtn" data-toggle="popover" data-placement="bottom" data-content="You need to enter some code first">Save Paste</button>
            </div>
        </div>
    </nav>