$(document).ready(function(){
     
     function dashboard() { // this creates a function that loads the dashboard UI using ajax
          $.ajax({
               url: 'dashboard.php',
               method: 'GET',
               success: function(data) {
                  $('main').html(data);
               }
          });
     }
     function application() { // same goes for this
          $.ajax({
               url: 'application.php',
               method: 'GET',
               success: function(data) {
                  $('main').html(data);
               }
          });
     }

     dashboard(); // calls the function to load the dashboard

     $('.content main').on('click', '#apply_btn', ()=>{ // when 'apply' button is clicked
          application(); // calls application.php

          // changes the header that is shown at the very top
          $('.nav-heading-icon').html('<path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M4.5 9a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1zM4 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 1 0-1h4a.5.5 0 0 1 0 1z"/>');
          $('.nav-heading').html('Application Form');
     });
     $('.content main').on('click', '#apply_back_btn', ()=>{ // da back button that navigates back to the dashboard UI while resetting the forms
          $('.content main #apply_form input').val(''); // resets the input field for better performance
          dashboard();

          $('.nav-heading-icon').html('<path d="M6.5 0A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0zm3 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5z"/><path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1A2.5 2.5 0 0 1 9.5 5h-3A2.5 2.5 0 0 1 4 2.5zM10 8a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0zm-6 4a1 1 0 1 1 2 0v1a1 1 0 1 1-2 0zm4-3a1 1 0 0 1 1 1v3a1 1 0 1 1-2 0v-3a1 1 0 0 1 1-1"/>');
          $('.nav-heading').html('Scholar Dashboard');
     });

     $('.content main').on('submit', '#apply_form', (e)=>{ // ajax da shit out of all da input inside the form lezgow
          e.preventDefault();
          let data = $('#apply_form').serialize();
          
          $.ajax({
               type: "post", // type of request
               url: "ajax/ajax_application.php", // where the request will be sent
               data: data, // the request values
               cache: "false", // just false this shit
               dataType: "json", // what type of response we expect from the server. Basically makes the (response) accept json
               success: function(response) { // once success, we will serialize
                    if(response.type == 'success') {
                         $('.success').addClass('d-block');
                         $('.success .toast-body').html(response.msg);
                         
                         setInterval(()=>{
                              $('.success').fadeOut(1000);
                              setInterval(()=>{
                                   $('.success').removeClass('d-block');
                              },950);
                         },5000);
                    }
                    else if(response.type == 'error') {
                         $('.alert').addClass('d-block');
                         $('.alert .toast-body').html(response.msg);
                         
                         setInterval(()=>{
                              $('.alert').fadeOut(1000);
                              setInterval(()=>{
                                   $('.alert').removeClass('d-block');
                              },950);
                         },5000);
                    }
               }
          });
     });
});