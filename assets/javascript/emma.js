//to call all rta buttons
/*
$(document).ready(function() {
        $.rta($.rta.allButtons);
    });
*/

/*
$(document).ready(function() {
   $.rta($.rta.allButtons); 
});
*/

//Datatable for Articles
$(document).ready(function() {
  $('#books').DataTable();

  $('#books')
  .removeClass( 'display' )
  .addClass('table table-bordered');
});

$(document).ready(function() {
   $('#result').DataTable();
});
//Datatable for feedback
/*
$(document).ready(function() {
    $('#feedback').DataTable();
    
    $('#feedback').removeClass('display').addClass('table table-bordered');
});
*/

//Feedbacks delete checkbox
$(document).ready(function(e) {
        $('#selectbox').click(function(event) {
            //onclick the checkbox
            if (this.checked) {
                $('.checkbox1').each(function() {
                    this.checked = true;
                    //select all checkboxes with class checkbox1
                });
            } else {
                $('.checkbox1').each(function() {
                    //Delect all checkboxes with class checkbox1
                    this.checked = false;
                });
            }
        });
    });