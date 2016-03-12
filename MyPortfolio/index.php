<? get_header();?>
    <section id="about" class="section-about">
      <div class="container">
        <h2 class="section__title"><? 
$idObj = get_category_by_slug('s_about');
$id = $idObj->term_id;
echo(get_cat_name($id)) ?></h2>
        <div class="about">
          <? if( have_posts()) : query_posts('p=34');
			while(have_posts()) : the_post(); ?>
    	   <? the_content(); ?>
       		<? endwhile; endif; wp_reset_query(); ?>
        </div>
      </div>
    </section>
    <section id="portfolio" class="section-works">
      <div class="container">
        <h2 class="section__title"> <? 
				$idObj = get_category_by_slug('s_portfolio');
				$id = $idObj->term_id;echo(category_description($id)); ?></h2>
      </div>
      <div class="container">
        <div class="row">
          <div class="controls">
           
            <ul>
              <li data-filter="all" class="filter active">Все работы</li>
              <li data-filter=".sites" class="filter">Верстка</li>
              <li data-filter=".js" class="filter">js</li>
            </ul>
          </div>
          <div id="portfolio_show">
           <?php 
				$idObj = get_category_by_slug('s_portfolio');
				$id = $idObj->term_id;
        $count_id=0;
				if( have_posts()) : query_posts('cat=' . $id);
				while(have_posts()) : the_post(); ?>
    	   
            <figure class="mix col-md-3 col-sm-6 col-xs-12 portfolio__item <?php $tags = wp_get_post_tags($post->ID);
				if ($tags) {
					foreach ($tags as $tag) {
					echo (' '.$tag->name); }} ?> ">
          
            <?php the_post_thumbnail(array(293, 264)); ?>
                        
                         <figcaption class="item__content">
                <h3><? the_title(); ?></h3>
                <?php the_excerpt(); ?>
                <? $count_id++; ?>
                <a href="#a<? echo($count_id) ?>" class="popup_content">Посмотреть</a>
              </figcaption>
              <div class="hidden">
                <div id="a<? echo($count_id) ?>" class="podrt_descr">
                  <figure class="modal-box-content">
                    <button type="button" title="Закрыть (Esc)" class="mfp-close">×</button>
                      <h3><? the_title(); ?></h3>
                      <? the_content(); ?>
                      <p><a href=" <?php echo get_post_meta($post->ID, 'portfolio_url', true); ?> " target="_blank">URL проекта</a></p>
                    <img src="<?php
												$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );
												echo $large_image_url[0];
												?>" alt="<? the_title(); ?>">
                  </figure>
                </div>
              </div>
            </figure>
            
       		<?php endwhile; endif; wp_reset_query(); ?>
            
          </div>
        </div>
      </div>
    </section>
    <section id="mailMe" class="section-contacts">
      <div class="container">
        <h2 class="section__title"> Связаться со мной</h2>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <form id="form" novalidate class="main_form">
              <div class="control-group name_form">
                <label for="name" class="control-label">*Ваше имя:</label>
                <input id="name" type="text" name="name" placeholder="Ваше имя" required data-validation-required-message="Вы не ввели имя" aria-invalid="false"><span class="help-block"></span>
              </div>
              <div class="control-group mail_form">
                <label for="email" class="control-label">*Ваш E-mail:</label>
                <input id="email" type="email" name="email" placeholder="Ваш E-mail" required data-validation-required-message="Не корректно введен E-mail" aria-invalid="false"><span class="help-block"></span>
              </div>
              <div class="control-group">
                <label for="message" class="control-label">*Ваше сообщение:</label>
                <textarea id="message" name="message" placeholder="Ваше сообщение" required data-validation-required-message="Вы не ввели сообщение" aria-required="true" aria-invalid="true"></textarea><span class="help-block"></span>
              </div>
              <input type="submit" name="submit_form" value="Отправить" class="submit">
            </form>
          </div>
        </div>
      </div>
    </section>
<? get_footer(); ?>