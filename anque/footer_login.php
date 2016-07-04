    </div>
  </div> <!-- /container -->
  
  <!-- The javascript =============================================
       (Placed at the end of the document so the pages load faster) -->
  <script>
    // this code improves bootstrap menus and adds dropdown support
    jQuery(function(){
      jQuery('.nav>li>a').each(function(){	        
        if(jQuery(this).parent().find('ul').length)
          jQuery(this).attr({'class':'dropdown-toggle','data-toggle':'dropdown'}).append('<b class="caret"></b>');
      });
      jQuery('.nav li li').each(function(){	        
        if(jQuery(this).find('ul').length)
          jQuery(this).children('a').contents().before('<i class="chevron-right"></i>'); 
      });
      if(jQuery(document).width()>=980) {
        jQuery('ul.nav li.dropdown').hover(function() {
          jQuery(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(); 
        }, function() {
          jQuery(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(); 
        });
      }
      jQuery('ul.nav li.dropdown a').click(function(){window.location=jQuery(this).attr('href');});
    });
  </script>  
  <script src="./js/bootstrap.min.js"></script>  
  <!--[if lt IE 7 ]>
      <script src="./js/dd_belatedpng.js"></script>
      <script> DD_belatedPNG.fix('img, .png_bg'); //fix any <img> or .png_bg background-images </script>
      <![endif]-->
</body>
</html>
