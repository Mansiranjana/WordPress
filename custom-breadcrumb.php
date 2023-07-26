<?php
/*
Template Name: Your Template Name
*/
get_header(); 

global $wp;
$current_url= home_url( $wp->request );

?>
<div class="custom-breadcrumb">
	<span>
    <span><?php $parent_field=get_field('parent_field'); ?>
        <a href="<?= $parent_field['link'];?>"><?= $parent_field['name'];?></a> » 
	
		<?php $sub_child_field=get_field('sub_child_field'); ?>
		<?php $sub_child =  $sub_child_field['sub_child'];?>
            <?php
			foreach( $sub_child as $sub_child ) { ?>
<span>
            <a href="<?= $sub_child['sub_child_link'];?>"><?= $sub_child['sub_child_name'];?></a> » 
			
							<?php    } ?>
							<!-- <?php $child_field=get_field('child_field'); ?> -->
							<span class="breadcrumb_last" aria-current="page">
							<?php the_title(); ?>
                        </span>
                    </span>
                </span>
            </span>
        </span>
    </span> 
</div>
<style type="text/css">
  /* To disable default breadcrumb */
	.breadcrumb{
		display:none;
	}
	.custom-breadcrumb {
    padding: 0 28px;
    font-size: 14px;
    font-weight: 500;
    position: relative;
    z-index: 1000;
    background: #fff;
}
</style>
/* Your page or post content goes here */

<?php
get_footer(); 
?>
