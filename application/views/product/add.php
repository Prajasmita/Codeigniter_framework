<div class="section banner_section who_we_help">
    <div class="container">
        <h4>Add Product</h4>
    </div>
</div>

<!-- Content Section Start-->
<div class="section content_section">
    <div class="container">
        <div class="filable_form_container">
            <form action="" method="post">

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
                            <label>Product Name</label>
                            <input name="product_name" value="<?php echo set_value('product_name')?>" type="text" />
                            <span class="error"><?php echo form_error('product_name'); ?></span>

                        </div>
                    </li>
                    <li class="fileds">
                        <div class="name_fileds">
                            <label>Product Price</label>
                            <input name="price" value="<?php echo set_value('price')?>" type="text" />
                            <span class="error"><?php echo form_error('price'); ?></span>

                        </div>
                    </li>
                   <li class="fileds">
                        <div class="upload_fileds">
                            <label>Upload Image</label>
                            <input id="uploadFile" name="image" type="file" placeholder="Choose File" class="mandatory_fildes">
                        </div>
                      <!-- <p><?php /*echo anchor('product/file_view', 'Upload Another File!'); */?></p>-->

                   </li>
                    <!-- <li class="fileds">
                        <div class="name_fileds">
                            <label>Select Category</label>
                            <select name="category" class="select category">
                                <option value="mobile">Mobile</option>
                                <option value="automobile">Automobile</option>
                            </select>
                        </div>
                    </li>-->
                </ul>
                <div class="next_btn_block">
                    <div class="next_btn">
                        <input class="submit_buttons" type="submit" name="submit" value="submit">
                        <!--<span><img src="images/small_triangle.png"  alt="small_triangle"> </span></input>-->
                        <a href="<?php echo base_url()."product/index";?>" class="submit_buttons">Cancle</a>
                    </div>
                </div>

            </div>
            </form>
        </div>
    </div>
</div>
<!-- Content Section End-->
