    <!--Footer-->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-sm-6 col-xs-12">
            <p class="footer__note">&copy; <? echo date("Y"); ?>  Александр Величко</p>
          </div>
          <div class="col-lg-6 col-sm-6 col-xs-12">
            <ul class="links">
            <? $idObj = get_category_by_slug('socials');
						$id = $idObj->term_id; ?>
             <? if( have_posts()) : query_posts('cat=' . $id);
					while(have_posts()) : the_post(); ?>
   	   		<li class="links__item"><a href="<? echo get_post_meta($post->ID, 'soc_url', true) ?>" target="_blank" title="<? the_title(); ?>"><i class="fa <? echo get_post_meta($post->ID, 'fonts_awesom', true) ?>"></i></a></li>
    	   		<? the_content(); ?>
       		<? endwhile; endif; wp_reset_query(); ?>
            </ul>
          </div>
        </div><a href="#home" class="up"><i class="fa fa-angle-double-up"></i><i class="fa fa-angle-double-up"></i></a>
      </div>
    </footer>
    <!-- css -->
    <!-- <link rel="stylesheet"  href="http://fonts.googleapis.com/css?family=Roboto:300,400,500" type="text/css" media="all"> -->
    <!-- <link rel="stylesheet"  href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" type="text/css" media="all"> -->
    <!-- <link rel="stylesheet"  href="http://alexander-velichko.com/wp-content/themes/MyPortfolio/css/bundle.css" type="text/css" media="all"> -->
    <!-- end css -->
    <!--End footer-->
    <!--Scripts-->
<? wp_footer(); ?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-70360269-1', 'auto');
  ga('send', 'pageview');

</script>
    <!--End Scripts-->
    
  </body>
</html>
<?php
$out = ob_get_clean();
$out = preg_replace('/(?![^<]*<\/pre>)[\n\r\t]+/', "\n", $out); //удаление тегов
$out = preg_replace('/<!--[\w\W]*?-->/', '', $out); //удаление комментариев 
$out = preg_replace('/[\s]{2,}/', ' ', $out); //удаление двойных пробелов
$out = preg_replace('/[\n\r]+/', '', $out); //удаление переносов строк
echo $out;
?>