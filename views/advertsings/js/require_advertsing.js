//LOADER Inicio
$(window).on("load", function() {
    "use strict";
    $(".loader").fadeOut(800);
});
jQuery(document).ready(function() {
    Dropzone.autoDiscover = false;
    if( $('.dropzone').length > 0 ) {


        $("#fileSubmit").dropzone({
            //paramName: "file",
            //url: "../../media",
            url:"../../app/controller/AdvertsingsController.php",
            addRemoveLinks: true,
            parallelUploads:100,
            maxFiles: 6,
            acceptedFiles:".jpeg,.jpg,.png",
            autoProcessQueue: true,
            ulpoadMultiple: true,
            init: function() {
                dzClosure = this; // Makes sure that 'this' is understood inside the functions below.
                dzClosure.processQueue();

                // for Dropzone to process the queue (instead of default form behavior):
                $("#new_ads").click(function(e) {
                    // Make sure that the form isn't actually being sent.

                    e.stopPropagation();

                });

                //send all the form data along with the files:
                this.on("sendingmultiple", function(data, xhr, formData) {

                });
                this.on("queuecomplete", function(file, responseText) {
                    $("form[name='formAdvertsing']").submit();
                    console.log("hecho");

                });

                this.on("addedfile", function(file) {
                    var expires = new Date();
                    expires.setTime(expires.getTime() + (1 * 24 * 60 * 60 * 1000));
                    document.cookie = 'CATEGORIA=' + $("#categoria").val() + ';expires=' + expires.toUTCString()+ ';path=/';
                    console.log("cookie guardada");
                    if (this.files.length) {
                        var _i, _len, _ref = this.files.slice();
                        for (_i = 0, _len = this.files.length; _i < _len - 1; _i++) {
                            if (_ref[_i].name === file.name && _ref[_i].size === file.size) {
                                this.removeFile(_ref[_i]);
                            }
                        }
                    }
                });
            }
        });
    }
});