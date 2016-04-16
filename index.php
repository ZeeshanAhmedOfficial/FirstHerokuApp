<?php
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
?>
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
