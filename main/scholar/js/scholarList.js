$(document).ready(function () {
   $("#scholar_search").on("input", function () {
      let txtValue, td, filter, table, tr, i;
      filter = $(this).val().toUpperCase();
      table = $("#scholars_tbl");
      tr = $("#scholars_tbl tr");

      for (i = 0; i < tr.length; i++) {
         td = tr[i].getElementsByTagName("td")[0];
         if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
               tr[i].style.display = "";
            } else {
               tr[i].style.display = "none";
            }
         }
      }
   });
});
