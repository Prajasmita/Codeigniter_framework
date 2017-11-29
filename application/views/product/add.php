<div class="section banner_section who_we_help">
    <div class="container">
        <h4>Add Product</h4>
    </div>
</div>

<!-- Content Section Start-->
<div class="section content_section">
    <div class="container">
        <div class="filable_form_container">

           <form action="" enctype="multipart/form-data" method="post">
          <?php /*echo form_open_multipart('product/do_upload');*/?>



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
                            <label>Product Name<span class="error">*</span></label>
                            <input name="product_name" value="<?php echo set_value('product_name')?>" type="text" />
                            <span class="error"><?php echo form_error('product_name'); ?></span>

                        </div>
                    </li>
                    <li class="fileds">
                        <div class="name_fileds">
                            <label>Product Price<span class="error">*</span></label>
                            <input name="price" value="<?php echo set_value('price')?>" type="text" />
                            <span class="error"><?php echo form_error('price'); ?></span>

                        </div>
                    </li>


                   <li class="fileds">
                        <div class="upload_fileds">
                            <label>Upload Image<span class="error">*</span></label>
                            <input name="image" type="file" placeholder="Choose File" >

                   </li>
                     <li class="fileds">
                        <div class="name_fileds">
                            <label>Select Category<span class="error">*</span></label>
                            <select name="category" class="select category">

                                <?php foreach($result as $category){?>

                                <option value="<?php echo $category->id ?>"> <?php echo $category->name ?> </option>
                            <?php
                                }?>
                            </select>
                        </div>
                    </li>
                </ul>
                <div class="next_btn_block">
                    <div >
                        <input class="submit_buttons" type="submit" name="submit" value="submit">
                        <!--<span><img src="images/small_triangle.png"  alt="small_triangle"> </span></input>-->
                        <a href="<?php echo base_url()."product/index";?>" class="cancle">Cancle</a>
                    </div>
                </div>

            </div>
            </form>
        </div>
    </div>
</div>
<!-- Content Section End-->
