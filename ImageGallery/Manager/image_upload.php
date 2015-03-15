<?php include '../../view/header.php'; ?>

<div id="main">
    <h1>Upload Image</h1>

     <form action="index.php" method="post" enctype="multipart/form-data">         
          <table>                
                <tr>
                    <td><label>Category:</label></td>
                    <td> 
                        <!--$categories = CategoryDB::getCategories();-->
                        <select name="category_id">
                            <?php foreach ($categories as $category) : ?>
                            <option value="<?php echo $category->getCatID(); ?>"><?php echo $category->getCatName(); ?>                              
                            </option>
                        <?php endforeach; ?>
                </select>
                    </td>
                </tr>
                
                <tr>
                    <td><label>Upload Image File: </label></td>
                    <td><input type="file" name="file_upload" /></td>
                </tr>
                <tr>
                    <td><label>Title:</label></td>
                    <td> <input type="input" name="img_title" /></td>
                </tr>
                <tr>
                    <td><label>Key Ingredient:</label></td>
                    <td><input type="input" name="img_key" /></td>
                </tr>
                <tr>
                    <td><label>Description:</label></td>
                    <td><input type="input" name="img_detail" /></td>
                </tr>
                <tr>
                    <td><label>Author:</label></td>
                    <td><input type="input" name="img_author" /></td>
                </tr>
                <tr>
                    <td><label>Source:</label></td>
                    <td><input type="input" name="img_source" placeholer="http://" /></td>
                </tr>
                
        </table>
        <label>&nbsp;</label>
        <input type="submit" name="action" value="Upload Image" />  
        <br />
    </form>
    <p><a href="index.php?action=list_images">View Image List</a></p>

</div>
<?php include '../../view/footer.php'; ?>