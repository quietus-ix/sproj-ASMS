$(document).ready(function () {
   $("#notice_edit").on("click", function () {
      $(this).attr("disabled", "");
      $("#notice_save").toggleClass("invisible visible");
      $("#notice_form input").removeAttr("disabled");
      $("#notice_form textarea").removeAttr("disabled");
   });

   $("#notice_form").on("submit", function (e) {
      e.preventDefault();

      let data = $(this).serialize();

      $.ajax({
         type: "POST",
         url: "ajax/ajax_addCourse.php",
         data: data,
         dataType: "json",
         success: function (response) {
            //Do anything
         },
      });
   });
});
