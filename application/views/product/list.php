<!-- Content Section Start-->
<div class="section content_section">
    <div class="container">
        <div class="filable_form_container">
            <div class="mange_buttons">
                <ul>
                    <!--<li class="search_div">
                 <div class="Search">
                     <input name="search" type="text" />
                     <input type="submit" class="submit" value="submit">
                 </div>
                    </li>-->
                    <li><a href="<?php echo base_url() ?>">Category List</a></li>
                    <li><a href="<?php echo base_url('product/add') ?>" > Add Product</a></li>
                    <li><a href="" class="btn btn_edit"  id="delete_product" name="delete" >Delete</a></li>
                </ul>
            </div>
            <div class="table_container_block">
                <?php if (isset($results)) { ?>
                <table width="100%">
                    <thead>
                    <tr>

                        <th width="10%">
                            <input type="checkbox" class="checkbox" id="bulk_select" /> <label class="css-label mandatory_checkbox_fildes" for="bulk_select"></label>
                        </th>
                        <th style="">Product Name <!--<a href="#" class="sort_icon"><img src="images/sort.png"></a>--></th>
                        <th style="">Product Image</th>
                        <th style="">Product Price</th>
                        <th style="">Product Category <!--<a href="#" class="sort_icon"><img src="images/sort.png"></a>--></th>
                        <th>Action</th>
                    </tr>

                    </thead>
                    <tbody>
                    <?php foreach ($results as $data) { ?>

                    <tr id="<?php echo $data->id ?>" >
                        <td>
                            <input type="checkbox" class="checkbox" value="<?php echo $data->id ?>" name="checkbox[]" id="checkbox_sample<?php echo $data->id ?>" />
                            <label class="css-label mandatory_checkbox_fildes" for="checkbox_sample<?php echo $data->id ?>"></label>
                        </td>
                        <td><?php echo ''.ucwords($data->name).'' ?></td>

                      <td><img class="image" src="<?php echo base_url()."public/photo/".$data->image ?>"></td>


                        <td><?php echo $data->price ?></td>


                        <td><?php echo ''.ucwords($data->c_name).'' ?></td>



                        <td>
                            <div class="buttons">
                                <a href="<?php echo base_url("product/edit/".$data->id);?>" class="btn btn_delete" >Edit</a>
                                <?php /*echo anchor('category/edit?id='.$row->id,'Edit')*/?>
                                <a href="<?php echo base_url("product/delete/".$data->id);?>" class="btn btn_edit" onclick="return deleteConfirm()">Delete</a>
                            </div>
                        </td>
                    </tr>
                    <?php } ?>
                    </td>
                    </tr>
                    </tbody>
                </table>
                <?php } ?>
            </div>

            <div>
                <?php if (isset($links)) { ?>
                    <?php echo $links ?>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<!-- Content Section End-->



   