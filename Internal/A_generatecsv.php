<?php
include("../db_connection.php");

// header('Content-Type: text/csv; charset=utf-8');
// header('Content-Disposition: attachment; filename=testdata.csv');
// $output = fopen("php://output", "w");
// fputcsv($output, array('id', 'pid', 'match_played', 'run_scored', 'no_of_six', 'no_of_four', 'batting_avg', 'centuries', 'half_centuries', 'top_score', 'no_over_thrown', 'economy', 'wide_balls', 'no_balls', 'wickets', 'catches', 'run_outs', 'stumping', 'grade', 'status'));

// $query = "SELECT * FROM player_career WHERE status = 'Updated' group by pid";
// $result = mysql_query($query);
// while($row = mysql_fetch_array($result)) {
//     fputcsv($output, $row);
// }
// fclose($output);

header('Content-Type: text/csv; charset=utf-8');
      header('Content-Disposition: attachment; filename=testdata.csv');
       $output = fopen("php://output", "w");
       

       //fputcsv($output, array('id', 'pid', 'match_played', 'run_scored', 'no_of_six', 'no_of_four', 'batting_avg', 'centuries', 'half_centuries', 'top_score', 'no_over_thrown', 'economy', 'wide_balls', 'no_balls', 'wickets', 'catches', 'run_outs', 'stumping', 'grade', 'status'));
     fputcsv($output, array('pid', 'match_played', 'run_scored', 'batting_avg', 'top_score', 'economy', 'wide_balls', 'no_balls', 'wickets', 'catches', 'run_outs', 'stumping'));
         $query = "select *  from player_career WHERE status = 'Updated'" ;
         $result = mysql_query($query);
         while($row = mysql_fetch_array($result))
         {
              fputcsv($output,array($row['pid'],$row['match_played'],$row['run_scored'],$row['batting_avg'],$row['top_score'],$row['economy'],$row['wide_balls'],$row['no_balls'],$row['wickets'],$row['catches'],$row['run_outs'],$row['stumping']));
             
         }
      fclose($output);


?>