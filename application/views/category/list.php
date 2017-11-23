<div class="section banner_section who_we_help">
    <div class="container">
        <h4>Manage Category</h4>
    </div>
</div>

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
                    </li> -->
                    <li><a href="<?php echo base_url("product/index");?>">Product List</a></li>

                    <li><a href="<?php echo base_url("category/add");?>">Create Category</a></li>
                    <li><a href="#">Delete</a></li>

                </ul>
            </div>
            <div class="table_container_block">

                <?php if (isset($results)) { ?>
                <table width="100%">
                    <thead>
                    <tr>
                        <th width="10%">
                            <input type="checkbox" class="checkbox" id="checkbox_sample18" /> <label class="css-label mandatory_checkbox_fildes" for="checkbox_sample18"></label>
                        </th>
                        <th style="width:60%">Name <!--<a href="#" class="sort_icon"><img src="images/sort.png"></a>--></th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php foreach ($results as $data) { ?>
                    <tr>
                        <td>
                            <input type="checkbox" class="checkbox" id="checkbox_sample19" /> <label class="css-label mandatory_checkbox_fildes" for="checkbox_sample19"></label>
                        </td>
                        <td><?php echo ''.ucfirst($data->name).'' ?></td>
                        <td>
                            <div class="buttons">
                                <a href="<?php echo base_url("category/edit/".$data->id);?>" class="btn btn_delete" >Edit</a>
                                <?php /*echo anchor('category/edit?id='.$row->id,'Edit')*/?>
                                <a href="<?php echo base_url("category/delete/".$data->id);?>" class="btn btn_edit" onclick="doconfirm">Delete</a>
                            </div>
                        </td>

                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
                <?php } ?>
            </div>

            <div>
                <?php if (isset($links)) { ?>
                    <?php echo $links ?>
                <?php } ?>
            </div>
            <!--<div class="pagination_listing">
                <ul>
                    <li><a href="#">first</a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">Last</a></li>
                </ul>
            </div>-->

        </div>
    </div>
</div>
<!-- Content Section End-->