var displayCheck = "display1";

var setTimeValue = 5000;
var clear_slick = false;
var videoPlayValue = 0;
var schedule_array = [];
var image_array = [];
var video_array = [];

$(document).on("ready", function () {
  resetList();
  function resetList() {
    console.log("resetList");
    goToDisplay("display4");
    if (schedule_array.length > 0) {
      $(".display1").slick("unslick");
    }
    if (image_array.length > 0) {
      $(".display2").slick("unslick");
    }
    createData();
  }

  function videoPlay2() {
    var obj = ``;
    if (video_array[videoPlayValue]) {
      console.log(videoPlayValue, "videoPlayValue");
      obj +=
        '<video width="100%" height="100%" muted autoplay controls class="video_sec" id="video_' +
        videoPlayValue +
        '"><source src="' +
        video_array[videoPlayValue] +
        '" type="video/mp4"  /></video>';
      $("#video_display3").html("");
      $("#video_display3").append(obj);
      setTimeout(() => {
        var video22 = document.getElementById("video_" + videoPlayValue);
        console.log(video22, video22);

        video22.onended = function (e) {
          videoPlayValue = videoPlayValue + 1;
          videoPlay2();
        };
      });
    } else {
      console.log(video_array, videoPlayValue, "Video Tresttt");
      goToDisplay("display4");
    }
  }

  function showHeader() {
    $("#header_signage").removeClass("d-none");
    $("#footer_signage").removeClass("d-none");
    $("#header_signage_p").removeClass("d-none");
    $("#footer_signage_p").removeClass("d-none");
  }
  function hideHeader() {
    $("#header_signage").addClass("d-none");
    $("#footer_signage").addClass("d-none");
    $("#header_signage_p").addClass("d-none");
    $("#footer_signage_p").addClass("d-none");
  }

  function display1Show() {
    showHeader();
    $(".display1").removeClass("d-none");
    $(".display1").slick("slickGoTo", 0);
    $(".display1").slick("refresh");
    $(".display1").slick("play");
  }

  function display1Hide() {
    $(".display1").addClass("d-none");
    $(".display1").slick("pause");
  }

  function display2Show() {
    hideHeader();
    $(".display2").removeClass("d-none");
    $(".display2").slick("slickGoTo", 0);
    $(".display2").slick("refresh");
    $(".display2").slick("play");
  }

  function display2Hide() {
    $(".display2").addClass("d-none");
    $(".display2").slick("pause");
  }

  function display3Show() {
    hideHeader();
    $(".display3").removeClass("d-none");
    videoPlay2();
  }

  function display3Hide() {
    $(".display3").addClass("d-none");
    videoPlayValue = 0;
  }

  function display4Show() {
    showHeader();
    $(".display4").removeClass("d-none");
    // console.log('Stoped')
  }

  function display4Hide() {
    $(".display4").addClass("d-none");
  }

  function callDisplay1() {
    displayCheck = "display1";

    display2Hide();
    display3Hide();
    display4Hide();
    display1Show();
    if (schedule_array.length == 1) {
      setTimeout((z) => {
        goToDisplay("display2");
      }, setTimeValue);
    }
  }

  function callDisplay2() {
    displayCheck = "display2";
    display1Hide();
    display3Hide();
    display4Hide();
    display2Show();
    if (image_array.length == 1) {
      setTimeout((z) => {
        goToDisplay("display3");
      }, setTimeValue);
    }
  }

  function callDisplay3() {
    displayCheck = "display3";

    display1Hide();
    display2Hide();
    display4Hide();
    display3Show();
  }

  function callDisplay4() {
    displayCheck = "display4";

    display1Hide();
    display2Hide();
    display3Hide();
    display4Show();
  }

  function goToDisplay(checkOnlyDisplay) {
    if (checkOnlyDisplay == "display1") {
      if (schedule_array.length > 0) {
        callDisplay1();
      } else if (image_array.length > 0) {
        callDisplay2();
      } else if (video_array.length > 0) {
        callDisplay3();
      } else {
        goToDisplay("display4");
      }
    } else if (checkOnlyDisplay == "display2") {
      if (image_array.length > 0) {
        callDisplay2();
      } else if (video_array.length > 0) {
        callDisplay3();
      } else {
        goToDisplay("display4");
      }
    } else if (checkOnlyDisplay == "display3") {
      if (video_array.length > 0) {
        callDisplay3();
      } else {
        goToDisplay("display4");
      }
    } else {
      callDisplay4();
      setTimeout((z) => {
        console.log("ajit");
        goToDisplay("display1");
        // window.location.reload(true)
      }, setTimeValue);
    }

    // // this.showDisplay("display1");
  }

  function createData() {
    $("#portrait-data").html("");
    $("#horizontal-data").html("");
    var obj_dat = {
      display_id: display_id_new,
      cinema_id: cinema_id_new,
      screen_width: parseFloat(window.screen.width),
      checkDisplaySize: checkDisplaySize,
    };

    setTimeValue = 5000;
    videoPlayValue = 0;
    schedule_array = [];
    image_array = [];
    video_array = [];
    var request = $.ajax({
      url: "script.php",
      type: "POST",
      data: JSON.stringify(obj_dat),
      dataType: "JSON",
    });

    request.done(function (result) {
      if (result.Records.length > 0) {
        if (window.screen.width < checkDisplaySize) {
          $("#portrait-data").append(result.data_html);
        } else {
          $("#horizontal-data").append(result.data_html);
        }

        var recordsNew = result.Records[0];
        setTimeValue = recordsNew.timerSecond * 1000;
        videoPlayValue = 0;
        schedule_array = recordsNew.scedule_movie_array;
        image_array = recordsNew.image_array;
        video_array = recordsNew.video_array_new;

        $(".display1").on("afterChange", function (event, slick, currentSlide) {
          var slideCount = slick.slideCount;
          var isLastSlide = currentSlide == slideCount - 1;

          if (
            isLastSlide &&
            displayCheck == "display1" &&
            schedule_array.length > 1
          ) {
            setTimeout((z) => {
              goToDisplay("display2");
            }, setTimeValue);
            console.log("DDD1", "checkOnlyDisplay");
          }
        });

        $(".display2").on("afterChange", function (event, slick, currentSlide) {
          var slideCount2 = slick.slideCount;
          var isLastSlide2 = currentSlide == slideCount2 - 1;
          // console.log(image_array, "image_array", image_array.length);
          if (
            isLastSlide2 &&
            displayCheck == "display2" &&
            image_array.length > 1
          ) {
            setTimeout((z) => {
              goToDisplay("display3");
            }, setTimeValue);
            console.log("DDD2", "checkOnlyDisplay");
          }
        });

        $(".display1").slick({
          lazyLoad: "ondemand", // ondemand progressive anticipated
          infinite: true,
          autoplay: true,
          autoplaySpeed: setTimeValue,
        });

        $(".display2").slick({
          lazyLoad: "ondemand", // ondemand progressive anticipated
          infinite: true,
          autoplay: true,
          autoplaySpeed: setTimeValue,
        });
        clear_slick = true;
      } else {
      }
    });

    request.fail(function (jqXHR, textStatus) {
      // alert("Request failed: " + textStatus);
    });
  }

  setInterval(function () {
    resetList();
  }, 1000 * 60 * 15);
});
