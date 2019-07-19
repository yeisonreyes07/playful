<?php  get_header(); ?>

    <?php while(have_posts()): the_post(); ?>

 
    <div class="container-fluid imagenes-principales">
        <div class="row imagen-superior imagen">
            <div class="col-md-6 ">
                <div class="row justify-content-center align-items-center">
                    <div class="col-sm-8 col-md-8">
                        <div class="contenido  py-5">
                            <?php echo get_post_meta( get_the_ID(), 'edc_homepage_texto_superior_1', true); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 imagen-fondo" style="background-image:url(<?php echo get_post_meta( get_the_ID(), 'edc_homepage_imagen_superior_1', true); ?>);"></div>

           
        </div><!--.row-->
        <div class="row imagen-inferior imagen">
                <div class="col-md-6 bg-primary">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-sm-8 col-md-8">
                            <div class="contenido text-light py-5">
                                <?php echo get_post_meta( get_the_ID(), 'edc_homepage_texto_superior_2', true); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 imagen-fondo" style="background-image:url(<?php echo get_post_meta( get_the_ID(), 'edc_homepage_imagen_superior_2', true); ?>);"></div>
        </div><!--.row-->
    </div><!--.container-->

    
    <?php 
        $nosotros = new WP_Query('pagename=nosotros');
        while($nosotros->have_posts() ): $nosotros->the_post();
            get_template_part('template', 'parts/iconos');
        endwhile; wp_reset_postdata();
    ?>

    <section class="clases mt-5 py-5">
        <h1 class="separador mb-3">Working Process.</h1>

        <div class="container">
             <div class="row">
                 <?php 
                 $opciones = get_option('edc_theme_options');
                 if(isset($opciones['numero_clases'])) {
                    $clases = (int) $opciones['numero_clases'];
                 } else {
                    $clases = 3;
                 }
                 
                 edc_query_cursos( $clases ); ?>
             </div>
             <div class="row justify-content-end">
                 <div class="col-sm-5 col-md-3">
                     <a href="<?php echo get_permalink( get_page_by_title('Próximas Clases')) ?>" class="btn btn-primary d-block" >Ver Todas las Clases</a>
                 </div>
             </div>
        </div>
   </section>
          
            
   <div class="licenciatura" style="background-image:url(<?php echo get_post_meta( get_the_ID(), 'edc_homepage_imagen_licenciatura', true); ?>);">
       <div class="container">
           <div class="row justify-content-center align-items-center">
               <div class="col-md-8">
                   <div class="contenido text-light text-center">
                        <p><?php echo get_post_meta( get_the_ID(), 'edc_homepage_texto_licenciatura', true); ?></p>
                        <?php $contacto = get_page_by_title('Contacto'); ?>
                       <a href="<?php echo get_permalink($contacto->ID); ?>" class="btn btn-primary text-uppercase">Más Información</a>
                   </div>
               </div>
           </div>
       </div>
   </div>
<?php endwhile; ?>

<?php get_footer(); ?>