// $(document).ready(function() {
    //     $('#summernote').summernote();
    // });
    $(function () {
        // Summernote
        $('#summernote').summernote()

        // CodeMirror
        CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
        mode: "htmlmixed",
        theme: "monokai"
        });
    })
    //For Bootstrap 4
    // $('#summernote').summernote({
    //     placeholder: 'Enter message here..',
    //     tabsize: 2,
    //     height: 400
    //   });

    //EVENT
    //Event Upload
    function eventUploadF(form) {
        form.eventUpload.disabled = true;
        form.eventUpload.value = "Creating...";
        return true;
    }
    function eventUploadR(form) {
        form.eventUpload.disabled = false;
        form.eventUpload.value = "CREATE";
    }
    //Event Update
    function eventUpdateF(form) {
        form.eventUpdate.disabled = true;
        form.eventUpdate.value = "Updating...";
        return true;
    }
    function eventUpdateR(form) {
        form.eventUpdate.disabled = false;
        form.eventUpdate.value = "UPDATE";
    }
    //BLOG=====================================
    //Create Blog
    function blogUploadF(form) {
        form.blogUpload.disabled = true;
        form.blogUpload.value = "Posting...";
        return true;
    }
    function blogUploadR(form) {
        form.blogUpload.disabled = false;
        form.blogUpload.value = "POST";
    }
    //Blog Update
    function blogUpdateF(form) {
        form.blogUpdate.disabled = true;
        form.blogUpdate.value = "Updating...";
        return true;
    }
    function blogUpdateR(form) {
        form.blogUpdate.disabled = false;
        form.blogUpdate.value = "UPDATE";
    }
    //GALLERY=====================================
    //Gallery Upload
    function galUploadF(form) {
        form.galUpload.disabled = true;
        form.galUpload.value = "Uploading...";
        return true;
    }
    function galUploadR(form) {
        form.galUpload.disabled = false;
        form.galUpload.value = "UPLOAD";
    }
    //Gallery Update
    function galUpdateF(form) {
        form.galUpdate.disabled = true;
        form.galUpdate.value = "Updating...";
        return true;
    }
    function galUpdateR(form) {
        form.galUpdate.disabled = false;
        form.galUpdate.value = "UPDATE";
    }
    //MESSAGE PICTURE=====================================
    //Gallery Upload
    function mesUploadF(form) {
        form.mesUpload.disabled = true;
        form.mesUpload.value = "Uploading...";
        return true;
    }
    function mesUploadR(form) {
        form.mesUpload.disabled = false;
        form.mesUpload.value = "UPLOAD";
    }
    //PRODCUT TITLE UPLOAD=====================================
    //Gallery Upload
    function proUploadF(form) {
        form.proUpload.disabled = true;
        form.proUpload.value = "Uploading product...";
        return true;
    }
    function proUploadR(form) {
        form.proUpload.disabled = false;
        form.proUpload.value = "UPLOAD";
    }
    //SLIDER=====================================
    //Slide Upload
    function slideUploadF(form) {
        form.slideUpload.disabled = true;
        form.slideUpload.value = "Uploading...";
        return true;
    }
    function slideUploadR(form) {
        form.slideUpload.disabled = false;
        form.slideUpload.value = "UPLOAD";
    } 
    //Slide Edit
    function slideUpdateF(form) {
        form.slideUpdate.disabled = true;
        form.slideUpdate.value = "Updating...";
        return true;
    }
    function slideUpdateR(form) {
        form.slideUpdate.disabled = false;
        form.slideUpdate.value = "UPDATE";
    }
    //PROFILE Edit
    function profileUpdateF(form) {
        form.profileUpdate.disabled = true;
        form.profileUpdate.value = "Updating...";
        return true;
    }
    function profileUpdateR(form) {
        form.profileUpdate.disabled = false;
        form.profileUpdate.value = "UPDATE";
    }
    //JOB=====================================
    //Create Job
    function jobUploadF(form) {
        form.jobUpload.disabled = true;
        form.jobUpload.value = "Posting...";
        return true;
    }
    function blogUploadR(form) {
        form.jobUpload.disabled = false;
        form.jobUpload.value = "POST";
    }
    //Blog Update
    function jobUpdateF(form) {
        form.jobgUpdate.disabled = true;
        form.jobUpdate.value = "Updating...";
        return true;
    }
    function jobUpdateR(form) {
        form.jobUpdate.disabled = false;
        form.jobUpdate.value = "UPDATE";
    }



//Light box for GALLERY
    $(function () {
        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox({
                alwaysShowClose: true
            });
        });

        $('.filter-container').filterizr({gutterPixels: 3});
        $('.btn[data-filter]').on('click', function() {
            $('.btn[data-filter]').removeClass('active');
            $(this).addClass('active');
        });
    })

    // $(document).ready(function() {
    //     $('#summernote').summernote();
    // });
    $(function () {
        // Summernote
        //$('#summernote').summernote();

         //For Bootstrap 4
        $('#summernote').summernote({
            placeholder: 'Enter story here..',
            tabsize: 2,
            height: 400
        });

        // CodeMirror
        CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
        mode: "htmlmixed",
        theme: "monokai"
        });
    })

/*
    ====================================================
    DATA-TABLE CONTROLS
    =====================================================
*/
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });

  
        /*
    ====================================================
    PREVIEW IMAGE BEFORE UPLOAD
    =====================================================
    */

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#image-preview').css({'background-image':"url("+e.target.result+") ", 
                                            'background-size':"100% 100%",
                                            'width': "100px",
                                            'height': "100px",
                                            'padding': "0px"
                                        });
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#inputFile").change(function () {
        readURL(this);
    });


//INPUT SPECIAL CONTROLS
$(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });
    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

  })
  // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  });

  // DropzoneJS Demo Code Start
  Dropzone.autoDiscover = false;

  // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
  var previewNode = document.querySelector("#template");
  previewNode.id = "";
  var previewTemplate = previewNode.parentNode.innerHTML;
  previewNode.parentNode.removeChild(previewNode);

  var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
    url: "/target-url", // Set the url
    thumbnailWidth: 80,
    thumbnailHeight: 80,
    parallelUploads: 20,
    previewTemplate: previewTemplate,
    autoQueue: false, // Make sure the files aren't queued until manually added
    previewsContainer: "#previews", // Define the container to display the previews
    clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
  });

  myDropzone.on("addedfile", function(file) {
    // Hookup the start button
    file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file); };
  });

  // Update the total progress bar
  myDropzone.on("totaluploadprogress", function(progress) {
    document.querySelector("#total-progress .progress-bar").style.width = progress + "%";
  });

  myDropzone.on("sending", function(file) {
    // Show the total progress bar when upload starts
    document.querySelector("#total-progress").style.opacity = "1";
    // And disable the start button
    file.previewElement.querySelector(".start").setAttribute("disabled", "disabled");
  });

  // Hide the total progress bar when nothing's uploading anymore
  myDropzone.on("queuecomplete", function(progress) {
    document.querySelector("#total-progress").style.opacity = "0";
  });

  // Setup the buttons for all transfers
  // The "add files" button doesn't need to be setup because the config
  // `clickable` has already been specified.
  document.querySelector("#actions .start").onclick = function() {
    myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED));
  };
  document.querySelector("#actions .cancel").onclick = function() {
    myDropzone.removeAllFiles(true);
  };
  // DropzoneJS Demo Code End