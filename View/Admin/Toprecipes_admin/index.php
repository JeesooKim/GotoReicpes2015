<?php  include "c:/xampp/htdocs/GotoReicpes2015/config.php";  

#File name: index.php
#File for Toprecipes_admin
#Team Project: PHP project-gotorecipes.com
#Author: Jaden (Ju Won) Lee @Humber College 2015
#Created: April 12 2015
#Modified: 
#Reference: Class material -PDO Class

require(PATH_DATABASE);
require(PATH_MODEL_TOPRECIPE);
require(PATH_MODEL_TOPRECIPE_DB);
require(PATH_MODEL_CATEGORY);
require(PATH_MODEL_PAGENATOR);

// Get the current action value
if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'toprecipes_list';
}

if ($action == 'toprecipes_list') {

    $cntPerPage = 5;
    $pgLinkCnt = 5;

    $pgSelf = "index.php";
    $category_parm = "";
    $condition = "&action=".$action;

    // Get the current page
    if(isset($_GET['pgPage'])){
        $pgPage = $_GET['pgPage'];
    }else{
        $pgPage = 1;
    }
    // Get the current category
    if(isset($_GET['category'])){
        $category_parm = $_GET['category'];
        $condition = "&category=".$category_parm;
    }
    // Get categories, totCnt and toprecipesadminPage data
    $categories = ToprecipeDB::getRecipeCategory();
    $totCnt = ToprecipeDB::getTotCountByAdmin($category_parm);
    $toprecipesadminPage = ToprecipeDB::getPageTopRecipeByCategoryByAdmin($category_parm, $cntPerPage, $pgPage);

    // Display the toprecipes list
    include('toprecipes_list.php');
    
}else if ($action == 'update_toprecipes') {
    // Get the disy_yn
    if (isset($_POST['disp_yn'])) {
        $disp_yn = $_POST['disp_yn'];
    } else if (isset($_GET['disp_yn'])) {
        $disp_yn = $_GET['disp_yn'];
    } else {
        $disp_yn = '';
    }
    // Get the dish_id, category and pgPage
    $dish_id = $_GET['dish_id'];
    $category = $_GET['category'];
    $pgPage = $_GET['pgPage'];

    // Delete Toprecipes data
    ToprecipeDB::deleteTopRecipes($dish_id);

    if ($disp_yn == "" ){
        
        $toprecipedisplay = new TopRecipeDisplay($dish_id,"N");
        // Add Toprecipes data
        ToprecipeDB::addTopRecipes($toprecipedisplay);
    }
    // Display the toprecipes list page for the current category
    header("Location: .?pgPage=$pgPage&category=$category");
}
?>