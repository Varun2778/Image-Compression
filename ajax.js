 var ID = function () {
return Math.random().toString(36).substr(2, 9) +Math.random().toString(36).substr(2, 9) + Math.random().toString(36).substr(2, 9);
};
function validateSubmitForm() {
    var valid = true;  
    if($("#percentage").val().trim()==='0') {
        $("#percentage").css('background-color','#FFFFDF');
        $(".verificationpercentage").html("Required");
        valid = false;
    }else{
        $("#percentage").css('background-color','#FFFFFF');
        $(".verificationpercentage").html("");
    }
    return valid;
}
function formSubmit() {
    var element = new Array();
    var valid=validateSubmitForm();
    if (valid) {
        // $(".bodyarea").css({ opacity: 0.6 });
        // $(".compressionProcess").html("<div class='spinner-border text-warning'></div>");
        $(".compressionProcess").html("Proccessing...");
        $(".btn-compressed").html("<i class='fa fa-refresh fa-spin'></i>Loading..");
        $(".btn-compressed").prop('disabled', true);
    }
    if (valid) {
        jQuery.ajax({
            url: "phpajax.php",
            type: "POST",
            data:'percentage='+$("#percentage").val(),
            success:function(data){
                 
                if (data.trim()=='Error During Compression!!' || data.trim()=='No File Uploaded'|| data.trim()=='File Type Error!') {
                    $(".compressionProcess").html(data);
                }else{
                    element = jQuery.parseJSON(data);
                    console.log(element);
                    console.log(element[0]);
                    console.log(element[1]);
                    var downloadBtnsFiles =element[0]
                    var zipFileDownload = element[1]
                    for (var i = 0; i <= downloadBtnsFiles.length - 1; i++) {
                        $("#downloadArea").append("<a class='btn btn-warning btn-compress' id='downloadbtn' href='uploads/"+downloadBtnsFiles[i]+"' download='"+downloadBtnsFiles[i]+"'>Download</a>");
                    }

                    
                    $("#downloadZipArea").append("<a style='color: white;' class='btn btn-danger btn-compress' id='downloadbtn' href='uploads/zipfiles/"+zipFileDownload+"' download='"+zipFileDownload+"'>Download All In Zip</a>");

                    $(".compressionProcess").html('Files Compressed Successfully');
                    $(".btn-compressed").html("&#9832;&nbsp; Compress Now");
                    $(".btn-compressed").prop('disabled', false);

                }
            },
            error:function (){
               $(".compressionProcess").html("Something Went Wrong!");

            }
        });
    }
}

Dropzone.autoDiscover = false;
$(".dropzone").dropzone({
    init: function() {
},
maxFiles:10,
maxFilesize: 10,
clickable: true,
dictDefaultMessage: "Drop files here or click to upload",
acceptedFiles: ".gif',.png,.jpg,.jpeg",
dictCancelUpload: "Cancel upload.",

addRemoveLinks: true,
removedfile: function(file) {
    $.ajax({
    url: 'phpajax.php',
    type: 'post',
    data: {filenamedelete: file.name},
    success: function(data){
        $(".compressionProcess").html(data);
        
    }
    });
    file.previewElement.remove();
    return false;
}
});