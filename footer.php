</body>
</html>

<script>
   $(document).on("ready", function () {
      console.log(window.screen.width);
  if(window.screen.width>checkDisplaySize){
     $('#horizontal-display').css('display', 'block');
  }else{
     $('#portrait-display').css('display', 'block');
  }

});

</script>