<div class="section banner_section who_we_help">
    <div class="container">
        <h4>Create Category</h4>
    </div>
</div>

<!-- Content Section Start-->
<div class="section content_section">
    <div class="container">
        <div class="filable_form_container">
          <!-- <h1>hiiiiii</h1>-->
            <form action="#" method="post">
            <div class="form_container_block">

                <?php if ($this->session->flashdata('success')) {
                    ?>
                    <h4 class="success">
                        <?php echo $this->session->flashdata('success'); ?>
                    </h4>
                <?php
                }
                ?>

                <ul>
                    <li class="fileds">
                        <div class="name_fileds">
                            <label>Category Name<span class="error">*</span></label>
                            <input name="category_name" value="<?php echo set_value('category_name'); ?>"type="text" />
                            <span class="error"><?php echo form_error('category_name'); ?></span>
                        </div>
                    </li>
                </ul>
                <div class="next_btn_block">
                    <div class="nextbtn">

                        <input class="submit_buttons" type="submit" name="submit" value="submit">
                        <!--<span><img src="images/small_triangle.png"  alt="small_triangle"> </span></input>-->
                        <a href="<?php echo base_url();?>" class="cancle">Cancle</a>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Content Section End-->