$(document).ready(function(){
     
     function loadInterface(src) {
          $.ajax({
               url: src,
               method: 'GET',
               success: function(data) {
                  $('main').html(data);
               }
          });
     }

     function loadTableInterface(src, table, columns) {
          $.ajax({
               url: src,
               method: 'GET',
               success: function(data) {
                  $('main').html(data);
         
                    new DataTable(table, {
                         initComplete: function () {
                              this.api().columns(columns).every(function () {
                                   let column = this;
                    
                                   let select = document.createElement('select');
                                   select.add(new Option(''));
                                   column.footer().replaceChildren(select);
                    
                                   select.addEventListener('change', function () {
                                   var val = DataTable.util.escapeRegex(select.value);
                    
                                   column.search(val ? '^' + val + '$' : '', true, false).draw();
                                   });
                    
                                   column.data().unique().sort().each(function (d, j) {
                                        select.add(new Option(d));
                                   });
                              });
                         }
                    });
               }
          });
     }

     loadInterface('overview.php');

     /*
          sidebar tabs action event
     */
     $('#overview_tab').on('click', ()=>{
          loadInterface('overview.php');

          $('.nav-links div a').removeClass('active');
          $('#overview_tab a').addClass('active');

          $('.nav-heading-icon').html('<path d="M6.5 0A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0zm3 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5z"/><path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1A2.5 2.5 0 0 1 9.5 5h-3A2.5 2.5 0 0 1 4 2.5zM10 8a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0zm-6 4a1 1 0 1 1 2 0v1a1 1 0 1 1-2 0zm4-3a1 1 0 0 1 1 1v3a1 1 0 1 1-2 0v-3a1 1 0 0 1 1-1"/>');
          $('.nav-heading').html('Admin Dashboard');
     });
     $('.content main, .sidebar').on('click', '#applicationView_tab', ()=>{
          loadTableInterface('applicationView.php', '#application_table', [3, 4]);

          $('.nav-links div a').removeClass('active');
          $('#applicationView_tab a').addClass('active');

          $('.nav-heading-icon').html('<path d="M6.5 0A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0zm3 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5z"/><path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1A2.5 2.5 0 0 1 9.5 5h-3A2.5 2.5 0 0 1 4 2.5zM10 8a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0zm-6 4a1 1 0 1 1 2 0v1a1 1 0 1 1-2 0zm4-3a1 1 0 0 1 1 1v3a1 1 0 1 1-2 0v-3a1 1 0 0 1 1-1"/>');
          $('.nav-heading').html('Application List');
     });
     // end =========================


    /*
          application table actions
    */
     $('main').on('click', '#appDetails_btn', function() {
          let row_id = $(this).attr('data-id');

          $.ajax({
               type: "POST",
               url: "applicationDetails.php",
               data: {id: row_id},
               cache: "false",
               success: function(response) {
                    $('main').html(response);
               }
          });
     });
     
     $('main').on('click', '#approve_btn', function() {
          $('main .approve-container').toggleClass('d-none', 'd-flex');
          $('main .reject-container').removeClass('d-flex').addClass('d-none');
     });
     $('main').on('click', '#reject_btn', function() {
          $('main .reject-container').toggleClass('d-none', 'd-flex');
          $('main .approve-container').removeClass('d-flex').addClass('d-none');
     });
     $('main').on('click', '#appliCancel', function() {
          $('main .approve-container').removeClass('d-flex').addClass('d-none');
          $('main .reject-container').removeClass('d-flex').addClass('d-none');
     });
});