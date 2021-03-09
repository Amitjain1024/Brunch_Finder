<?php
$location = array (
  array("Volvo",21.32215, 81.36320),
  array("BMW",21.3225, 81.3330),
  array("Saab",21.32235, 81.35340),
  array("Land Rover",21.2245, 81.3310)
);

for ($x = 0; $x <=6; $x++) {
  echo "<div class='widget_wrap' style='width:auto;height:auto;display:inline-block;'><a href='https://www.zomato.com/Durg-bhilai/restaurants?utm_source=referral-widget&utm_medium=foodie_index_widget&utm_campaign=widget-developers' target='_newtab' title='Kothari Market - Foodie Index - 5.0'><img src='https://www.zomato.com/widgets/foodie_widget_img.php?widget_type=5&lat=".$location[$x][1]."&lon=".$location[$x][2]."' width='300' height='450'></a> </div>";
}
?>