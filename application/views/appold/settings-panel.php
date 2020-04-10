<?php echo form_open('pastes/app'); ?>
    <div class="collapse" id="settingsPanel">
        <div class="row bg-secondary">
            
            <!-- Password Form -->
            <div class="col-sm-4 mt-sm-2 text-center ms-auto">
                <div class="text-center">
                    <small>Set a password for your paste.</small>
                </div>
                <div class="form-group">
                    <div class="form-inline justify-content-center" id="passwordForm">
                        <div class="form-group">
                            <input type="password" class="form-control shadow" id="password" name="password">
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Self Destruct -->
            <div class="col-sm-4 mt-sm-2 text-center ms-auto">
                <div class="text-center">
                    <small>Self destruct after</small>
                </div>
                <div class="form-group">
                    <div class="form-inline justify-content-center" id="selfDestruct">
                        <div class="form-group">
                            <select class="selectpicker shadow" name="expire_time" id="expire" data-style="bg-white" >
                                <option value='Never'>Never</option>";
                                <optgroup label="Minutes">
                                    <option value='15m'>15 Minutes</option>";
                                    <option value='15m'>30 Minutes</option>";
                                    <option value='15m'>45 Minutes</option>";
                                </optgroup>
                                <optgroup label="Hours">
                                    <option value='15m'>1 Hour</option>";
                                    <option value='15m'>3 Hours</option>";
                                    <option value='15m'>6 Hours</option>";
                                    <option value='15m'>12 Hours</option>";
                                </optgroup>
                                <optgroup label="Days">
                                    <option value='15m'>1 Day</option>";
                                    <option value='15m'>7 Days</option>";
                                    <option value='15m'>30 Days</option>";
                                </optgroup>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
            