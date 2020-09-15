<?php
/*
Template name: Fails page
*/

get_header(); 
?>

    <!-- start main-standart -->
    
    <div class="main-404">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p class="title-page">Платеж не прошел!</p>
                    <p class="paragraph-bigger text-indent">Платеж не прошел!</p>
                    <p><a class="button-white" href="<?php echo esc_url( home_url( '/' ) ); ?>">На главную</a></p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- end main-standart -->
     
    <script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('.back').click(function(){
            parent.history.back();
            return false;
        });
    });
    </script>
  
<?php get_footer(); ?>