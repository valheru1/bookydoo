jQuery(document).ready(function() {
    // jQuery('#book_chapter').summernote({
    // height: 400,
    // focus: true,
    // toolbar: [
    //     ['style', ['bold', 'italic', 'underline', 'clear']],
    //     ['fontname', ['arial', 'cambria']],
    //     ['fontsize', ['fontsize']],
    //     ['fullscreen', ['fullscreen']]
    //     ]
    // });
    // categoryChecker();
    // descriptionChecker();

});

/* sprawdzenie ilości wybranych kategorii */
var categoryChecker = function(){
    var i=0;
    jQuery('.category').each(function(){
        if(jQuery(this).is(':checked'))
        {
            i=i+1;
        }

    });
    i=3-i;
    if(i==0)
    {
        jQuery('.category').each(function(){
            if(!jQuery(this).is(':checked'))
            {
                jQuery(this).attr('disabled','disabled');
            }
        });

    }
    jQuery('span.count').html(i);
 };


/* sprawdzanie liczby wybranych kategorii przy dodawaniu nowej książki */
 var inputChecker_step1 = function(){
    var check_title = jQuery("input.title").val();
    var check_description = jQuery("textarea.description").val();

    if(check_title != "") {
        if(check_description != ""){
            jQuery("a.step1").removeClass("disabled");
        } else {
            jQuery("a.step1").addClass("disabled");
        }
    } else {
        jQuery("a.step1").addClass("disabled");
    }
 };

jQuery(function() {

/* sprawdzanie wykorzystanych kategorii*/




 jQuery('.category').click(function(){
     var i = 3;



     jQuery('.category').each(function(){
            if(i>0)
            {
                jQuery('.count').css({color: "green"}) ;
                jQuery('.category').removeAttr('disabled');
                if(jQuery(this).is(':checked'))
                {
                    i = i-1;
                    jQuery("a.step2").removeClass("disabled");
                }
            }
        });

        if(i==0) {
            jQuery('.category').each(function(){
                    if(!jQuery(this).is(':checked'))
                        {
                            jQuery(this).attr('disabled','disabled');
                        }
                });
                jQuery('.count').css({color: "red"});

        }
        if(i==3){
            jQuery("a.step2").addClass("disabled");
        }

     jQuery('span.count').html(i);
 });

 /* liczba znaków w opisie przy dodawaniu nowej książki */
//  jQuery('textarea').keyup(function(){
//      var i = jQuery('textarea').val().length;
//      i = 1000 - i;

//      jQuery('span.count1').css({color: "green"}) ;
//      if(i==0)
//      {
//          jQuery('span.count1').css({color: "red"}) ;
//      }

//      jQuery('span.count1').html(i);
//      inputChecker_step1();

//  });
 /* walidacja tytułu nowej książki */
 jQuery('#book_title').keyup(function(){
    var data;
    var title = $(this).val();
    jQuery.get("/books/book_check", {book_title: title}, function(data) {
        var data = data;
        if(data=="1"){
            jQuery('span#helpblock').addClass("glyphicon-remove-circle").removeClass("glyphicon-ok-circle");
        } else {
            jQuery('span#helpblock').addClass("glyphicon-ok-circle").removeClass("glyphicon-remove-circle");

        }
        inputChecker_step1();
    });

 });


});
