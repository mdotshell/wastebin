
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