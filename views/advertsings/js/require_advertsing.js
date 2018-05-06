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
            //url: "../../media/uploaded",
            url:"../../app/controller/AdvertsingsController.php",
            addRemoveLinks: true,
            parallelUploads:100,
            maxFiles: 2,
            acceptedFiles:".jpeg,.jpg,.png",
            autoProcessQueue: false,
            ulpoadMultiple: true,
            init: function() {
                dzClosure = this; // Makes sure that 'this' is understood inside the functions below.

                // for Dropzone to process the queue (instead of default form behavior):
                document.getElementById("new_ads").addEventListener("click", function(e) {
                    // Make sure that the form isn't actually being sent.
                    e.preventDefault();
                    e.stopPropagation();
                    dzClosure.processQueue();

                });

                //send all the form data along with the files:
                this.on("sendingmultiple", function(data, xhr, formData) {

                });
                this.on("queuecomplete", function(file, responseText) {
                    document.getElementById("formAdvertsing").submit();
                });

                this.on("addedfile", function(file) {
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