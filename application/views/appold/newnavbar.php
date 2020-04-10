<?php echo form_open('/'); ?>
<div class="container-fluid">
    <div class="row bg-primary">
        <div class="col-sm-6 border">
            <div class="row ">
                <div class="col-sm-4 mt-sm-3 border text-white text-center">
                    <a class="brand-name text-white" href="#">WASTEBIN</a>
                    <div class="brand-phrase">
                            For trash code
                    </div>
                </div>
                <div class="col-sm-4 border">
                    <div class="text-center">
                        Language
                    </div>
                    <select class="selectpicker form-control shadow" name="language" id="languageSelect" data-style="btn-success" data-width="100%" data-live-search="true">
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
                </div>
                <div class="col-sm-4 border">
                    <div class="text-center">
                        Theme
                    </div>
                    <select class="selectpicker shadow" name="theme" id="themeSelect" data-style="btn-danger"  data-width="100%" data-live-search="true">
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
                </div>
            </div>
            
            
        </div>


    </div>
</div>