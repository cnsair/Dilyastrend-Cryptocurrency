//===================================================================================
// WORKING SCRIPT AND USING
// FOR RIGHT-ADVERT

function sticky_relocate() {
    var window_top = $(window).scrollTop();
    var div_top = $('#sticky-anchor').offset().top;
    if (window_top > div_top) {
        $('#sticky').addClass('stick');
        $('#sticky-anchor').height($('#sticky').outerHeight());
    } else {
        $('#sticky').removeClass('stick');
        $('#sticky-anchor').height(0);
    }
}

$(function() {
    $(window).scroll(sticky_relocate);
    sticky_relocate();
});

var dir = 1;
var MIN_TOP = 200;
var MAX_TOP = 350;

function autoscroll() {
    var window_top = $(window).scrollTop() + dir;
    if (window_top >= MAX_TOP) {
        window_top = MAX_TOP;
        dir = -1;
    } else if (window_top <= MIN_TOP) {
        window_top = MIN_TOP;
        dir = 1;
    }
    $(window).scrollTop(window_top);
    window.setTimeout(autoscroll, 10);
}

/* ===============================================================
====================================================================*/

$.fn.followTo = function (pos) {
    var $this = this,
        $window = $(window);

    $window.scroll(function (e) {
        if ($window.scrollTop() > pos) {
            $this.css({
                position: 'fixed',
                top: top
            });
        } else {
            $this.css({
                position: 'fixed',
                top: 0
            });
        }
    });
};

$('#myDiv').followTo(100);

/* ========================================================================
========================================================================== */
  //Working SCRIPT BUT STOPPING SUMMER NOTE AND TOGGLE FRO WORKING

 // Cache selectors outside callback for performance. 
   // var $window = $(window),
   //     $stickyEl = $('#the-sticky-div'),
   //     elTop = $stickyEl.offset().top;

   // $window.scroll(function() {
   //      $stickyEl.toggleClass('sticky', $window.scrollTop() > elTop);
   //  });


/*
================================================================================
TOGGLE NEWS-FEED PUBLIC AND TARGET 
================================================================================
*/ 

$('body').on('change', '#BroadReach', function (){
    var selection=$(this).val();

      if(selection=="1")
      {
          $('#broadtype').hide();
      }

      else if(selection=="2" || selection=="3")
      {
          $('#broadtype').show();


      }

});

/*
================================================================================
TOGGLE REFERER CODE AND NAME 
================================================================================
*/ 

$('body').on('change', '#Referral', function (){
    var selection=$(this).val();

      if(selection=="1")
      {
          $('#referralarea').hide();
      }

      else if(selection=="2")
      {
          $('#referralarea').show();


      }

});


/*
================================================================================
TOGGLE REFERER CODE AND NAME 
================================================================================
*/ 

$('body').on('change', '#state', function (){
    var selection=$(this).val();

      if(selection=="1")
      {
          $('#statearea').hide();
      }

      else if(selection=="2")
      {
          $('#statearea').show();


      }

});


$('.summernote-lg').summernote({
      height: 400
    });

$('#summernote').summernote('undo');
$('#summernote').summernote('redo');

// if ($('#summernote').summernote('isEmpty')) {
//   alert('contents is empty');
// }

// @param {String} url
// @param {String|Function} filename - optional
// $('#summernote').summernote('insertImage', url, filename);
// $('#summernote').summernote('insertImage', url, function ($image) {
//   $image.css('width', $image.width() / 3);
//   $image.attr('data-filename', 'retriever');
// });

$('.summernote-sm').summernote({
      height: 200,
        toolbar: [
        //['style', ['style']], // no style button
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['font', ['strike']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']],
        ['insert', ['picture', 'link']], // no insert buttons
        //['table', ['table']], // no table button
        //['help', ['help']] //no help button
        ]
    });


/*
=========================================================================================
HANDLE DATE PICKER
==========================================================================================
*/


           $("#DOB").datepicker({
              inline: true,
               changeMonth: true,
               changeYear: true,
               dateFormat: 'yy-mm-dd',
               yearRange: '-80:+10'
          });

/*
=========================================================================================
HANDLE DATE TABLE
==========================================================================================
*/

$(document).ready(function(){
    $('#table1').DataTable();
    $('#table2').DataTable();
    $('#table3').DataTable();
    $('#table4').DataTable();
    $('#table5').DataTable();
});



//======================================================================
        //Page specific script (filterizr for gallery)
//======================================================================
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