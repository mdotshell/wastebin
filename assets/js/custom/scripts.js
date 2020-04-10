
// User Interaction
$(document).ready(function(){
    var editor = ace.edit("editor");

    $("#languageSelect select").val("markdown");
    // Set Language from dropdown
    $('#languageSelect').change(function(e){
        editor.session.setMode("ace/mode/"+(this.value.trim()));
    });
    
    // Set Theme from dropdown
    $('#themeSelect').change(function(e){
        editor.setTheme("ace/theme/"+(this.value.trim()));
    });
    
    // Show/Hide password input on switch
    $('#passwordSwitch').change(function(){
        console.log("yes");
        if($('#passwordSwitch').is(':checked')){
            $('#passwordForm').css("display","inline");
        }
        else{
            $('#passwordForm').css("display","none");
        }
    });
    
    
    // Update hidden input before form is submitted
    $('#saveBtn').click(function() {
        var editor = ace.edit('editor');
        var hiddenInput = $('#editorInput');
        hiddenInput.val(btoa(editor.getSession().getValue()));
        return true;
    });
     
    // Submit Password form
    $("#passSubmitBtn").on('click', function() {
        $("#unlockForm").submit();
    });
    $( window ).resize(function() {
            $('#editor_column').css("height",$(window).height() - $('#navbar').outerHeight()+ "px");
            var editor = ace.edit("editor");
            editor.resize();
    });
    $('#editor_column').css("height",$(window).height() - $('#navbar').outerHeight()+ "px");
    
    
});

