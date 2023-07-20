       <!--Potrait New--->

       <section class="display1 slider d-none">
           <!--Slider 1--> <?php 
          if(count($schedule_array)>0){
            $duplicate_value = 1;
            $length_array = count($schedule_array);
            // if($length_array % 2 === 0){
            //    $length_array = $length_array / 2;
               
            // }
            // else {
            //    $length_array = $length_array - $duplicate_value++;
            // }
               $length_as_per_slide = round($length_array/2);
          for($length_array == 1 ? $i = 0 : $i = 1; $i <= $length_as_per_slide; $i++){
            if($i == 1){
               $duplicate_value = 0;
            }
            else if ($i >= 3){
               $duplicate_value = $i - 1;
            }
            else{
              $duplicate_value = 1;
            }
            $sch_obj = array_key_exists($i - 1 + $duplicate_value, $schedule_array) ? $schedule_array[$i - 1 + $duplicate_value] : false;
            // $sch_obj2 = $i < count($schedule_array) ? $schedule_array[$i + 1] : false;
            $sch_obj2 = array_key_exists($i + $duplicate_value, $schedule_array) ? $schedule_array[$i + $duplicate_value] : false;

             
          ?> <div>
               <div class="col-xl-12 px-0 " style="width: 100vw">
                   <!--Image Section -->

                   <div>
                       <img style="max-width: 100%; width: 100%" class="back_ground_img_height_potrait_welcome"
                           src="./img/Synage_img/black-big-l-compressed.jpg" id="black_theme" />
                   </div>

                   <!-- <div> <?php
               /*if($isBlackTheme){

                ?> <img style="max-width: 100%; width: 100%" class="back_ground_img_height_potrait_welcome" src="./img/Synage_img/black big.png" id="black_theme"  /> <?php

               }else{
                ?> <img style="max-width: 100%; width: 100%" class="back_ground_img_height_potrait_welcome" src="./img/Synage_img/red-big.jpg" id="red_theme" /> <?php
               }*/
               ?> </div> -->


                   <div class="welcome_wrapper col-xl-12">
                       <!-- <h3 class="welcome_text">Welcome To Empire Cinema</h3> -->

                       <!--First data--->
                       <?php if($sch_obj){?>
                       <div class="col-xl-12 container-fluid temp_wrapper-potrait custom_potrait_margin">
                           <div class="col-xl-5 pl-0 d-block">
                               <!--Image Section -->
                               <!-- :style="
                        innerwidth > innerheight &&
                          `height:${innerheight}px;` &&
                          `width:${100}%;`
                      "
                       -->

                               <img style="max-height: 500px" class="custom_img_width_potrait border-top-temp" src="
											<?php echo $sch_obj["finalImage"] ? $sch_obj["finalImage"] : $sch_obj["artwork"]["rating"];?>"
                                   onerror="javascript:this.src='./img/Synage_img/dummyimageemp.png'" />

                               <!--Movie Name-->
                               <div class="mt-3 d-flex justify-content-between" style="gap:15px">
                                   <span> <?php echo $sch_obj["movie_name"];?> </span>

                                   <div class="">

                                       <!-- <img class="img-fluid pg-img" src="</*?php echo $sch_obj["pp_banner"];?>"   /> -->
                                       <?php /*if ($sch_obj["pp_banner"]): ?>
                                       <img src="<?php echo $sch_obj["pp_banner"];?>" class="pg-img-potrait"
                                           style="margin-left:auto" />
                                       <?php else: ?>
                                       <span> <?php echo $sch_obj["movie_details"]["rating"];?> </span>
                                       <?php endif; */?>
                                       <!-- onerror="javascript:this.src='./img/R15.svg'"  -->
                                       <!-- <h4> </*?php echo $sch_obj["movie_details"]["rating"];?> </h4> -->
                                       <span> <?php echo $sch_obj["movie_details"]["rating"];?> </span>
                                   </div>
                               </div>
                           </div>
                           <section class="col-xl-7 pl-0">
                               <!--Movie Detail Section-->
                               <div class="d-block">
                                   <!--Movie name section-->
                                   <div class="row movie-box-landscape d-none">

                                       <!--PG-->




                                       <!--Movie Name in arabic-->
                                       <div class="col-4 d-flex justify-content-end">
                                           <span class="arb_name"> <?php echo $sch_obj["movie_name_arabic"];?> </span>
                                       </div>
                                   </div>
                                   <!--Showtime section start-->

                                   <!--Screen 1 Start-->
                                   <section class="show_section_new_landscape d-flex">
                                       <!--Screen Name-->
                                       <!-- <div class="d-flex flex-wrap col-xl-12" style="gap:10px"> -->

                                       <!--Screen Schedule-->
                                       <!-- <div class="d-block col-xl-4">
                          <p> </*?php echo $screen_obj["screen_name"];?> </p>
                        </div> -->
                                       <div class="time_wrapper">
                                           <?php 
                        for($j=0; $j< count($sch_obj["screen_array"]); $j++){
                           $screen_obj = $sch_obj["screen_array"][$j];
                         ?>
                                           <?php 
                            // sort($sch_l_obj["ss_start_show_time"]);
                              for($k=0 ; $k < count($screen_obj["schedule_list"]);$k++){
                                $sch_l_obj = $screen_obj["schedule_list"][$k];
                                // sort($sch_l_obj["ss_start_show_time"])
                                // $newArr = array();
                                // for($x;$x < count($screen_obj["schedule_list"]);$x++)
                                //     array_push($newArr,$sch_l_obj[$x]['ss_start_show_time'])
                               ?>


                                           <button class="show_btn">
                                               <?php  echo $sch_l_obj["ss_start_show_time"];?>
                                           </button>


                                           <?php
                              }
                            ?>
                                           <?php 

                        }
              
                         ?>


                                       </div>

                                       <!-- </div> -->
                                   </section>

                                   <!--Screen 1 End-->
                                   <!--Showtime section End-->
                               </div>
                           </section>
                       </div>
                       <?php } ?>
                       <!--Second data--->
                       <?php if($sch_obj2){?>
                       <div class="col-xl-12 container-fluid temp_wrapper-potrait">
                           <div class="col-xl-5 pl-0 d-block">
                               <!--Image Section -->
                               <!-- :style="
                        innerwidth > innerheight &&
                          `height:${innerheight}px;` &&
                          `width:${100}%;`
                      "
                       -->

                               <img style="max-height: 500px" class="custom_img_width_potrait border-top-temp" src="
											<?php echo $sch_obj2["finalImage"] ? $sch_obj2["finalImage"] : $sch_obj2["artwork"]["rating"];?>"
                                   onerror="javascript:this.src='./img/Synage_img/dummyimageemp.png'" />

                               <!--Movie Name-->
                               <div class="mt-3 d-flex justify-content-between" style="gap:15px">
                                   <span> <?php echo $sch_obj2["movie_name"];?> </span>

                                   <div class="">

                                       <!-- <img class="img-fluid pg-img" src="</*?php echo $sch_obj2["pp_banner"];?>"   /> -->

                                       <?php /*if ($sch_obj2["pp_banner"]): ?>
                                       <img src="<?php echo $sch_obj2["pp_banner"];?>" class="pg-img-potrait"
                                           style="margin-left:auto" />
                                       <?php else: ?>
                                       <span> <?php echo $sch_obj2["movie_details"]["rating"];?> </span>
                                       <?php endif; */?>
                                       <!-- onerror="javascript:this.src='./img/R15.svg'"  -->
                                       <!-- <h4> </*?php echo $sch_obj2["movie_details"]["rating"];?> </h4> -->
                                       <span> <?php echo $sch_obj2["movie_details"]["rating"];?> </span>
                                   </div>
                               </div>
                           </div>
                           <section class="col-xl-7 pl-0">
                               <!--Movie Detail Section-->
                               <div class="d-block">
                                   <!--Movie name section-->
                                   <div class="row movie-box-landscape d-none">

                                       <!--PG-->




                                       <!--Movie Name in arabic-->
                                       <div class="col-4 d-flex justify-content-end">
                                           <span class="arb_name"> <?php echo $sch_obj2["movie_name_arabic"];?> </span>
                                       </div>
                                   </div>
                                   <!--Showtime section start-->

                                   <!--Screen 1 Start-->
                                   <section class="show_section_new_landscape d-flex">
                                       <!--Screen Name-->
                                       <!-- <div class="d-flex flex-wrap col-xl-12" style="gap:10px"> -->

                                       <!--Screen Schedule-->
                                       <!-- <div class="d-block col-xl-4">
                          <p> </*?php echo $screen_obj["screen_name"];?> </p>
                        </div> -->
                                       <div class="time_wrapper">
                                           <?php 
                        for($j=0; $j< count($sch_obj2["screen_array"]); $j++){
                           $screen_obj = $sch_obj2["screen_array"][$j];
                         ?>
                                           <?php 
                            // sort($sch_l_obj["ss_start_show_time"]);
                              for($k=0 ; $k < count($screen_obj["schedule_list"]);$k++){
                                $sch_2_obj = $screen_obj["schedule_list"][$k];
                                // sort($sch_l_obj["ss_start_show_time"])
                                // $newArr = array();
                                // for($x;$x < count($screen_obj["schedule_list"]);$x++)
                                //     array_push($newArr,$sch_l_obj[$x]['ss_start_show_time'])
                               ?>


                                           <button class="show_btn">
                                               <?php  echo $sch_2_obj["ss_start_show_time"];?>
                                           </button>


                                           <?php
                              }
                            ?>
                                           <?php 

                        }
              
                         ?>


                                       </div>

                                       <!-- </div> -->
                                   </section>

                                   <!--Screen 1 End-->
                                   <!--Showtime section End-->
                               </div>
                           </section>
                       </div>

                       <?php } ?>
                   </div>
               </div>
           </div> <?php 
           }
          }
          ?>
       </section>

       <section class="display2 slider d-none"> <?php 
            if(count($image_array)>0){

             foreach($image_array as $img_obj) {

             ?> <div class="img_main_section">

               <img src="<?php echo $img_obj["selected_url"];?>"
                   onerror="javascript:this.src='./img/Synage_img/L_Black_demo.jpg'" />

               <?php /*
               if($isBlackTheme){

                ?>
               <img src="<?php echo $img_obj["selected_url"];?>"
                   onerror="javascript:this.src='./img/Synage_img/L_Black_demo.jpg'" /> <?php

               }
               else{
                ?> <img src="<?php echo $img_obj["selected_url"];?>"
                   onerror="javascript:this.src='./img/Synage_img/L_red_demo.jpg'" /> <?php
               }
               */ ?>


               <!-- javascript:this.src='./img/Synage_img/dummyimageemp.png' -->
           </div>
           <?php   
              }
            }
            ?> </section>
       <section class="display3 d-none">
           <div class="img_main_section" id="video_display3"></div>
       </section>