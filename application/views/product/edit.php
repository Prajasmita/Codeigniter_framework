<div class="section banner_section who_we_help">
    <div class="container">
        <h4>Update Product</h4>
    </div>
</div>

<!-- Content Section Start-->
<div class="section content_section">
    <div class="container">
        <div class="filable_form_container">
            <?php extract($product) ?>

            <form action="" enctype="multipart/form-data" method="post">

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
                                <input type="hidden" name="id" value="<?php echo $id ; ?>">
                                <label>Product Name<span class="error">*</span></label>
                                <input type="text" name="product_name" value="<?php echo ''.ucwords($name).'' ; ?>" />
                                <span class="error"><?php echo form_error('product_name'); ?></span>

                            </div>
                        </li>
                        <li class="fileds">
                            <div class="name_fileds">
                                <label>Product Price<span class="error">*</span></label>
                                <input type="text" name="price" value="<?php echo $price ; ?>"  />
                                <span class="error"><?php echo form_error('price'); ?></span>

                            </div>
                        </li>
                        <li class="fileds">
                            <div class="upload_fileds">
                                <label>Upload Image<span class="error">*</span></label>
                                <input name="image" type="file" value="<?php echo $image ; ?>" placeholder="Choose File" >

                        </li>


                        <li class="fileds">
                            <div class="name_fileds">
                                <label>Select Category<span class="error">*</span></label>
                                <select name="category" class="select category">

                                    <?php foreach($result as $category){

                                        $selected = '';
                                        if($category->id == $category_id){
                                            $selected = 'selected';

                                        }
                                        ?>
                                        <option <?php echo $selected;?> value="<?php echo $category->id; ?>" > <?php echo $category->name; ?></option>                                        <?php
                                    }?>
                                </select>
                            </div>
                        </li>

                    </ul>

                    <div class="next_btn_block">
                        <div>

                            <input class="submit_buttons" type="submit" name="submit" value="update">
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
