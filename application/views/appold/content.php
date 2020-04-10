<!-- Content -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                         <!-- Show the code if $unlocked is true -->
                        <div id="editor"></div>
                        <?php
                            if(!($unlocked)){
                              echo "<script>$('#passwordModal').modal({backdrop: 'static',focus: true,keyboard: false,})</script>"; 
                            }
                            else if($unlocked){
                                echo("<script>$('#editor').text(LZString.decompressFromBase64('".$paste['CODE']."'));</script>");
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