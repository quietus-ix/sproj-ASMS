<?php
require_once '../php/config.php';

$currentMonth  = (new DateTime())->format('M');
$currentYear   = (new DateTime())->format('Y');

$month = array();
$numOfApp = array();
$i = 0;

$query = $conn->query(
     "SELECT * 
          FROM tbl_scholar_application 
          WHERE scholar_dateOfReq
               BETWEEN MAKEDATE('$currentYear', 1) AND 
                    MAKEDATE(YEAR(CURDATE()), IF(MOD(YEAR(CURDATE()), 4), 365, 366))
                    AND scholar_status != 'verified'
               ORDER BY MONTH(scholar_dateOfReq) ASC"
);
$dataTrigger;
if ($query->num_rows > 0) {
     $dataTrigger = true;
     while ($application = $query->fetch_assoc()) {
          $appMonth = $application['scholar_dateOfReq'];
          $getMonth = DateTime::createFromFormat('Y-m-d', $appMonth);
          $numMonth = $getMonth->format('m');
          $dismonth = $getMonth->format('F');

          $getCount = $conn->query(
               "SELECT COUNT(*) 
                    FROM tbl_scholar_application
                    WHERE MONTH(scholar_dateOfReq) = '$numMonth'"
          );

          $fetchCount = $getCount->fetch_column();

          $month[$i]     = $dismonth;
          $numOfApp[$i]  = $fetchCount;

          if ($i > 0) { // once the index reaches greater than 1
               if (strcmp($dismonth, $month[$i - 1]) === 0) { // this statement will compare the $dismonth and the last index of $month
                    $i--; // if duplicate, decrement the array index to store the data there again
               }
               $i++;
          } else {
               $i++;
          }
     }
} else {
     $dataTrigger = false;
}
?>

<div class="dflex flex-column p-3 w-100 h-100" style="overflow-y: scroll;">
     <!-- counter cards -->
     <div class="counters d-flex mt-2 gap-3">
          <div class="card shadow-sm w-25">
               <div class="card-body d-flex flex-column">
                    <h5 class="fw-medium fs-6 d-flex align-items-center justify-content-between">
                         Applicants
                         <i class='bx bxs-graduation fs-2'></i>
                    </h5>
                    <p class="card-text fw-bold fs-4">
                         <?php
                         $query = $conn->query("SELECT COUNT(scholar_status) FROM tbl_scholar_application WHERE scholar_status = 'pending'");
                         $count = $query->fetch_column();

                         if ($count > 0) {
                              echo $count;
                         } else {
                              echo 0;
                         }
                         ?>
                    </p>
                    <hr class="mb-2 mt-0">
                    <div class="d-flex justify-content-center w-100" style="display: none;">
                         <a href="#" id="applicationView_tab" class="btn btn-link p-0">view</a>
                    </div>
               </div>
          </div>
          <div class="card shadow-sm w-25 h-75">
               <div class="card-body d-flex flex-column">
                    <h5 class="fw-medium fs-6 d-flex align-items-center justify-content-between">
                         Scholars
                         <i class='bx bxs-book-heart fs-2'></i>
                    </h5>
                    <p class="card-text fw-bold fs-4">
                         <?php
                         $query = $conn->query("SELECT COUNT(scholar_status) FROM tbl_scholar_application WHERE scholar_status = 'verified'");
                         $count = $query->fetch_column();

                         if ($count > 0) {
                              echo $count;
                         } else {
                              echo 0;
                         }
                         ?>
                    </p>
               </div>
          </div>
          <div class="card shadow-sm w-25 h-75">
               <div class="card-body d-flex flex-column">
                    <h5 class="fw-medium fs-6 d-flex align-items-center justify-content-between">
                         Awaiting Review
                         <i class='bx bxs-briefcase-alt-2 fs-2'></i>
                    </h5>
                    <p class="card-text fw-bold fs-4">
                         <?php
                         $query = $conn->query("SELECT COUNT(scholar_status) FROM tbl_scholar_application WHERE scholar_status = 'approved'");
                         $count = $query->fetch_column();

                         if ($count > 0) {
                              echo $count;
                         } else {
                              echo 0;
                         }
                         ?>
                    </p>
               </div>
          </div>
     </div>

     <!-- graph -->
     <div class="card shadow-sm mt-3" style="background-color: #fff;">
          <h5 class="card-header fs-6 d-flex align-items-center">
               <i class='bx bx-calendar-exclamation me-2'></i>
               Analysis
          </h5>
          <div class="card-body">
               <div id="overview_chart"></div>
          </div>
     </div>
     <!-- script to initialize the chart and configure it wao -->
     <script type="text/javascript">
          var myChart = echarts.init(document.getElementById('overview_chart'), null, {
               height: 450
          });

          var option = {
               title: {
                    text: 'Total applicants this year <?php echo $currentYear ?>'
               },
               tooltip: {},
               legend: {
                    data: ['applicants']
               },
               xAxis: {
                    type: 'category',
                    data: [<?php
                              $arrLenghtMonth = count($month);
                              for ($x = 0; $x < $arrLenghtMonth; $x++) {
                                   echo "'" . $month[$x] . "',";
                              } ?>]
               },
               yAxis: {},
               series: [{
                    name: 'Applicants',
                    type: 'bar',
                    data: [
                         <?php
                         $arrLenghtCount = count($numOfApp);
                         for ($x = 0; $x < $arrLenghtCount; $x++) {
                              echo $numOfApp[$x] . ",";
                         }
                         ?>
                    ]
               }]
          };
          myChart.setOption(option);
     </script>
</div>