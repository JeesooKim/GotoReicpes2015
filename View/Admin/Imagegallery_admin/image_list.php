<?php include '../../Shared/header.php'; ?>
<!--<div id="main">-->
<section maing>

    <h1>Image List</h1>

    <div id="sidebar">
        <!-- display a list of categories -->
        <h2>Categories</h2>
        <ul class="nav">
            <?php foreach ($categories as $category) : ?>
                <!-- $categories : an object of Category class from $categories = CategoryDB::getCategories();  of index.php-->
                <li>
                    <a href="?category_id=<?php echo $category->getCatID(); ?>">  <!-- get category's id -->
                        <?php echo $category->getCatName(); ?>    <!-- get category's name -->
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <div id="content">
        <!-- display a table of products -->
        <h2><?php echo $current_category->getCatName(); ?></h2>
        <!--  $current_category = CategoryDB::getCategory($category_id);  from index.php -->
        <table>
                <tr>
                    <th>Title</th>
                    <th>Key Ingredient</th>
                    <th>Description</th>
                    <th>Author</th>
                    <th>Source</th>
                    <th>&nbsp;</th>
                </tr>


                <?php foreach ($images as $image) : ?>
                <!-- $images = ImageGalleryDB::getImagesByCategory($category_id); from index.php -->
                        <tr>
                            <td><?php echo $image->getTitle(); ?></td>
                            <td><?php echo $image->getKeyIngredient(); ?></td>
                            <td><?php echo $image->getDetail(); ?></td>
                            <td><?php echo $image->getAuthor(); ?></td>
                            <td><?php echo $image->getSource(); ?></td>
                            <td><form action="." method="post" id="delete_image_form">
                                            <input type="hidden" name="action" value="delete_image" />
                                            <input type="hidden" name="image_id" value="<?php echo $image->getID(); ?>" />
                                            <input type="hidden" name="category_id" value="<?php echo $current_category->getCatID(); ?>" />
                                            <input type="submit" value="Delete" onclick="return confirm('Are you sure to delete?')"/>
                                    </form></td>
                        </tr>
                <?php endforeach; ?>
        </table>
        <p><a href="?action=show_upload_form">Upload Image</a></p>
    </div>

</section>
<?php include '../../Shared/footer.php'; ?>

<!--
//PHP project-gotorecipes.com
//Image Gallery(Admin), File: image_list.php
//Humber College 2015
//Jeesoo Kim, March 16
-->