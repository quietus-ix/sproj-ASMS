import { loadInterface } from "../script.js";

$(document).ready(function () {
   $("#addCourse_form").on("submit", function (e) {
      e.preventDefault();

      let data = $(this).serialize();

      $.ajax({
         type: "post",
         url: "ajax/ajax_addCourse.php",
         data: data,
         cache: "false",
         dataType: "json",
         success: function (response) {
            if (response.code == 1) {
               $(".success").addClass("d-block");
               $(".success .toast-body").html(response.msg);

               loadInterface("viewCourse.php");

               setTimeout(() => {
                  $(".success").fadeOut(1000);
                  setInterval(() => {
                     $(".success").removeClass("d-block");
                  }, 950);
               }, 5000);
            } else if (response.code == 2) {
               $(".alert").addClass("d-block");
               $(".alert .toast-body").html(response.msg);

               setTimeout(() => {
                  $(".alert").fadeOut(1000);
                  setInterval(() => {
                     $(".alert").removeClass("d-block");
                  }, 950);
               }, 5000);
            }
         },
      });
   });

   $("#editCourse_form").on("submit", function (e) {
      e.preventDefault();

      let data = $(this).serialize();

      $.ajax({
         type: "post",
         url: "ajax/ajax_editCourse.php",
         data: data,
         cache: "false",
         dataType: "json",
         success: function (response) {
            if (response.code == 1) {
               $(".success").addClass("d-block");
               $(".success .toast-body").html(response.msg);

               loadInterface("viewCourse.php");

               setTimeout(() => {
                  $(".success").fadeOut(1000);
                  setInterval(() => {
                     $(".success").removeClass("d-block");
                  }, 950);
               }, 5000);
            } else if (response.code == 2) {
               $(".alert").addClass("d-block");
               $(".alert .toast-body").html(response.msg);

               setTimeout(() => {
                  $(".alert").fadeOut(1000);
                  setInterval(() => {
                     $(".alert").removeClass("d-block");
                  }, 950);
               }, 5000);
            }
         },
      });
   });

   $("#editCourse_id").on("change", function () {
      let course_name = $(this).val();
      $("#editCourse_name").val(course_name);
   });
});
