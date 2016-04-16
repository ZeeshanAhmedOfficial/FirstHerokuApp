<!--
    require_once("_assets/config/dbc.php");
  if(isset($_POST['is_submit']) && $_POST['is_submit'] == 1)
  {
    $create_date = $_POST['inputDate'];
    $title = $_POST['inputTitle'];
    $slug = $_POST['inputSlug'];
    $brand_status = 'Deactive';
    $description = $_POST['inputMetaDescription'];
    $keywords = $_POST['inputKeyword'];


    if(isset($_FILES['file']))
    {
      $name = uniqid(time());
      $file_ext = pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION);
      $file_name = $name . "." . $file_ext;
      $file_size = $_FILES['file']['size'];
      $file_tmp = $_FILES['file']['tmp_name'];
      $file_type = $_FILES['file']['type'];
      $errors = NULL;
      $extensions = array("jpeg","jpg","giff","png");

      if(in_array($file_ext, $extensions) == false) $errors = "File of Such Extension is not allowed";
      if($file_size > 2097152) $errors = 'File size must be less tham 2 MB';
      if (empty($errors)==true) 
      {
          $isuploaded = move_uploaded_file($file_tmp, "../uploads/".$file_name);
          if($isuploaded)
          {
              mysql_query("INSERT INTO itl0_brand(create_date,title,slug,brand_img,brand_status,meta_description,meta_keywords)
              VALUES ('$create_date','$title','$slug','$file_name','$brand_status','$description','$keywords')  ");            
              header("Location: view_brand.php");       
          }
      }

      else 
        echo $errors;
    }  
  }
//-->
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title></title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width">
<?php include('_partials/links.php'); ?>
</head>
<body>
<div class="container">
  <div class="row">
    <div class="span12">
      <?php include("_partials/header.php"); ?>
      <?php include("_partials/menu.php"); ?>

      <div id="main-content" role="main"> 
        
        <!-- add reocrd file -->
        <section class="dark-box" id="inner-header">
          <div class="row">
            <div class="span5">
              <h1 class="article-page-title ic-48-article">Add Brand</h1>
            </div>
            <div class="span7 omega" id="article-page-toolbar">
              <ul class="article-page-buttons clearfix">
                <li><a href="javascript:;" id="btnSave"><span class="ic-32-save" title="Save"></span>Save</a></li>
                <li><a href="view_brand.php" id="btnCancel"><span class="ic-32-cancel" title="Cancel"></span>Cancel</a></li>
              </ul>
            </div>
          </div>
        </section>
        <section class="light-box" id="article-container">
          <article id="article-grid" role="main">
            <form class="form" id="formAdd" name="formAdd" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
            <input type="hidden" name="is_submit" id="is_submit" value="1">
              <div>
              <div class="row">
              <div class="span6">
                <fieldset>
                  <legend>Primary Detail</legend>
                  <div class="control-group">
                    <label for="inputDate"><strong>Date <span style="color: RED;">*</span></strong></label>
                    <input type="text" id="inputDate" name="inputDate" placeholder="Date" class="input-xlarge" >
                  </div>
                  <div class="control-group">
                    <label for="inputTitle"><strong>Title <span style="color: RED;">*</span></strong></label>
                    <input type="text" id="inputTitle" name="inputTitle" placeholder="Title" class="input-xlarge">
                  </div>
                  <div class="control-group">
                    <label for="inputSlug"><strong>Slug</strong></label>
                    <input type="text" id="inputSlug" name="inputSlug" placeholder="Slug" class="input-xlarge" >
                  </div>
                </fieldset>
              </div>
              <div class="span5">
              <fieldset>
              <legend>Extra Detail</legend>
              <div class="control-group">
                <label for="inputMetaDescription"><strong>Brand Thumbnail</strong></label>
                <input type="file" name="file" id="file">
              </div>
              
              <div class="control-group">
                <label for="inputMetaDescription"><strong>Meta Description</strong></label>
                <textarea id="inputMetaDescription" name="inputMetaDescription" rows="7" class="span5"></textarea>
              </div>
              <div class="control-group">
                <label for="inputKeyword"><strong>Keyword</strong></label>
                <input type="text" id="inputKeyword" name="inputKeyword" placeholder="Keyword" class="span5">
              </div>              
            </form>
            
            <!-- Validation Scripting -->
            <script>
              var frmvalidator = new Validator("formAdd");
              frmvalidator.addValidation("inputDate","req","Please select the Date");
              frmvalidator.addValidation("inputTitle","req","Please insert the Title");
            </script>

          </article>
        </section>
        
        <!-- add record file ended --> 
        
      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function(e){
    $("#btnSave").click(function(e){
    $("#formAdd").submit();
  });
    //SHow Date//
    $("#inputDate").datepicker();
    //Show Slug//
    $("#inputTitle").stringToSlug({
        setEvents: 'keyup keydown blur',
        getPut: '#inputSlug',
        space: '_'
      });

  });
</script>


</body>
</html>


<!-- View Brand -->
<!-- View Brand -->
<!-- View Brand -->
<!--

require("_assets/config/guard.php"); 



$page = isset($_GET['p']) ? $_GET['p'] : '1';
  
  $per_page  = '3';
  if($page > 0)
     $offset = ($page -1) * $per_page;
  else
    $offset = 0;

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title></title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width">
 include('_partials/links.php'); 

</head>
<body>
<div class="container">
  <div class="row">
    <div class="span12">
      <?php include("_partials/header.php"); ?>
      <?php include("_partials/menu.php"); ?>

      <div id="main-content" role="main">
        <!-- content file here -->
        <section class="dark-box" id="inner-header">
          <div class="row">
            <div class="span5">
              <h1 class="article-page-title ic-48-article">Manage Brand</h1>
            </div>
            <div class="span7 omega" id="article-page-toolbar">
              <ul class="article-page-buttons clearfix">
                <li><a href="add_brand.php" id="btnPublish"><span class="ic-32-publish" title="Add Brand"></span>Add</a></li>
                <li><a class="DeleteAll" id="btnDelete" href="#"><span class="ic-32-delete" title="Delete"></span>Delete</a></li>
                <li class="divider">&nbsp;</li>
                <li><a class="ActiveAllStatus" href="#" id="btnPublish"><span class="ic-32-publish" title="Active"></span>Active</a></li>
                <li><a class="DeactiveAllStatus" href="#" id="btnUnpublish"><span class="ic-32-unpublish" title="Deactive"></span>Deactive</a></li>
              </ul>
            </div>
          </div>
        </section>
        <section class="light-box" id="article-container">
          <article id="article-grid" role="main">
            <div id="viewData">
              
              <!-- content list items -->
              <form name="formView" id="formView" method="post">
                <input type="hidden" name="is_submit" value="1" />
                <input type="hidden" name="act" id="act" value="">
                <?php
                 require_once("_assets/config/dbc.php");
                  $count_pages = mysql_query("SELECT brand_id FROM itl0_brand");
                  $total_rows = mysql_num_rows($count_pages);
                  $end = ceil($total_rows / $per_page);
                $getAllBrands = mysql_query("SELECT * FROM itl0_brand ORDER BY brand_id DESC LIMIT $offset, $per_page");
                $countrows = mysql_num_rows($getAllBrands);
                if ($countrows > 0) {
                  
                ?>
                <table cellspacing="1" class="managelist">
                  

                  <thead>
                    <tr>
                      <th style="width: 5%"> # </th>
                      <th style="width: 5%;"> <input id="chkSelectAll" type="checkbox" class="chkSelectAll" name="chkSelectAll" /></th>
                      <th style="width: 45%; text-align:left;"> Title </th>
                      <th style="width: 15%;"> Image </th>
                      <th style="width: 15%;"> Status </th>
                      <th style="width: 10%;"> Date</th>
                      <th style="width: 5%;"> ID </th>
                    </tr>
                  </thead>
          <tbody class="itemsTbody">
              <?php 
              while ($viewAllBrands = mysql_fetch_array($getAllBrands)) {
              ?>
                                  
              <tr class="row0">

              <td style="text-align: center;"><?php  echo ++$offset; ?></td>

              <td style="text-align: center;">
              <input class="checkboxesParamId" id="chkParamId[]" type="checkbox" name="chkParamId[]" value="<?php echo $viewAllBrands['brand_id']; ?>" />
              </td>

              <td class="item-rows">
              <a href="edit_brand.php?b_id=<?php echo $viewAllBrands['brand_id']; ?>"><strong><?php echo $viewAllBrands['title']; ?></strong></a>
              <div class="row-action">
              <span class="trash">
              <a class="singleDelete" href="delete_brand.php?b_id=<?php echo $viewAllBrands['brand_id']; ?>"><i class="ic-48-trash"></i> Trash</a>
              </span>
              </div>
              </td>

              
              </td>
              <td style="text-align: center;"><img src="../uploads/<?php echo $viewAllBrands['brand_img']; ?>" width="50" height = "50" > </td>
              <td style="text-align: center">
              <a class = "linkStatus" href="status_brand.php?b_id=<?php echo $viewAllBrands['brand_id']; ?>"> <?php echo ($viewAllBrands['brand_status'] == 'Deactive') ? "<img src='_assets/img/publish_x.png'>" : "<img src='_assets/img/publish_g.png'>" ?></a></td>
              <td style="text-align: center"><?php echo $viewAllBrands['create_date']; ?></td>
              <td style="text-align: center;"><?php echo $viewAllBrands['brand_id']; ?></td>
              </tr>
              <?php } ?>
              </tbody>
              </table>
                <div class="pagination pagination-centered pagination-small">

                <ul class="pagination">
                
                <?php if($page > 1) : ?>
                <li><a href="/itechlaptop/admin/view_brand.php?p=<?php  echo ($page-1); ?>">Perv</a></li>
                <?php endif ?>
                
                
                <?php for ($i = 1; $i <= $end; $i++) : ?>
                <?php if ($i == $page) : ?>
                <li class="active"><a href="#"><?php echo $i; ?></a></li>
                <?php else : ?>
                <li><a  href="/itechlaptop/admin/view_brand.php?p=<?php  echo $i; ?>"><?php echo $i; ?></a></li>
                <?php endif; ?>
                <?php endfor; ?>
              
              
              <?php if($page < $end) : ?>
              <li><a href="/itechlaptop/admin/view_brand.php?p=<?php echo ($page+1); ?>">Next</a></li>
              <?php endif ?>
              </ul>
                </div>
                <!-- else message -->
                <?php } else { ?>
                
                <div class="alert alert-info"> <strong>
                  <div class="centeralign">No record found</div>
                  </strong> </div>
               <?php } ?>
              </form>

              <script>
						$("#chkSelectAll").click(function(e) {
                            var checked = $(this).is(":checked");
							$(".checkboxesParamId").attr('checked', checked);
                        });
	
						$(".item-rows").hover(function () {
							$(this).find("div.row-action").css("visibility", "visible");
						}, function () {
							$(this).find("div.row-action").css("visibility", "hidden"); ;
						});
					</script> 

              <!-- content list items ended --> 
            </div>
          </article>
        </section>
        
        <!-- content file ended --> 
        
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function()
  {
    //SINGLE STATUS ACTIVE JQUERY
    $(".linkStatus").click(function(e)
      {
        e.preventDefault();
        var href = $(this).attr('href');
        var self = $(this);

        self.html("<img src = '_assets/img/ajax-loader-small.gif' >")

        $.get(href,{},function(response){
          if (response == 1 ) 
            self.html("<img src = '_assets/img/publish_g.png' >");
          else 
            self.html("<img src = '_assets/img/publish_x.png' >");
        });
      });

    //ACTIVE ALL STATUS JQUERY

    $(".ActiveAllStatus").click(function(e){
    e.preventDefault();
    var self = $(".linkStatus");
    $("#act").val("Active");

    if ($(".checkboxesParamId:checked").length > 0) 
    {
        var serials =  $("#formView").serialize();
        self.html("<img src = '_assets/img/ajax-loader-small.gif' >")
        $.post("status_brand.php", serials, function(response){
          if(response > 0)
          {
            window.location.href = 'view_brand.php';
          }
        });
    }
    else
    {
        alert("Atleast select one!");
    }
  });
  

    //DEACTIVE ALL STATUS JQUERY
  $(".DeactiveAllStatus").click(function(e){
    e.preventDefault();
    var self = $(".linkStatus");
    $("#act").val("Deactive");
    if ($(".checkboxesParamId:checked").length > 0) 
    {
        var serials =  $("#formView").serialize();
        self.html("<img src = '_assets/img/ajax-loader-small.gif' >")
        $.post("status_brand.php", serials, function(response){
          if(response > 0)
          {
            window.location.href = 'view_brand.php';
          }
        });
    }
    else
    {
        alert("Atleast select one!");
    }
  });











  



  //DELETE ALL Brands using JQUERY

  $(".DeleteAll").click(function(e){
    e.preventDefault();
    var self = $(".linkStatus");
    $("#act").val("DeleteAll");

    if($(".checkboxesParamId:checked").length > 0)
    {
      var message = confirm("Are you sure to delete this item?");
      if(message)
      {
        self.html("<img src = '_assets/img/delete.gif' >")
        var serials = $("#formView").serialize();
        $.post("delete_brand.php",serials,function(response){
          if(response > 0)
            window.location.href = 'view_brand.php';
        });
      }
    }
    else
    {
      alert("Atleast select one");
    }
  });

























  //DELETE Single Brand using JQUERY
  
  $(".singleDelete").click(function(e){
    e.preventDefault();

    var href = $(this).attr('href');
    var self = $(this);
    var message = confirm("Are you sure to delete this item?");

    if(message)
    {
        self.html("<img src = '_assets/img/ajax-loader-small.gif' >")
        
        $.post(href,{},function(response){
          if(response == 1)
            {
              self.closest('tr');
              $(this).remove();
            }            
        });
      }
      else
      {
        return false;
      }
      
  });


  });
</script>

</body>
</html>

//-->
