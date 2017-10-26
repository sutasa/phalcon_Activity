<html>
<head>
    <meta charset="utf-8">
    <?= $this->tag->getTitle() ?>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <?= $this->tag->stylesheetLink('css/bootstrap.min.css') ?> 
    <?= $this->tag->stylesheetLink('css/templete/custom-styles.css') ?> 
    <?= $this->tag->stylesheetLink('css/templete/flexslider.css') ?> 
    <?= $this->tag->stylesheetLink('css/templete/prettyPhoto.css') ?> 
    <?= $this->tag->stylesheetLink('css/templete/.style-ie.css') ?> 
     
<style>
  
body {
    
background-image: url("/webActivity/public/img/imgActivity/bb5.png");
    
background-size: cover;
    
background-repeat : repeat-x;

    
background-position: left top;

    
background-attachment: fixed;
  
}

</style>



   
  
</head>
  

    
 <body>
    
    <div class="container">
    <br>
    <br>
    <br>
        <?= $this->getContent() ?>
    </div>
    <br>
    <br>
  <?= $this->tag->javascriptInclude('js/jquery.min.js') ?>
  <?= $this->tag->javascriptInclude('js/jquery.custom.js') ?>
   <?= $this->tag->javascriptInclude('js/jquery.easing.1.3.js') ?>
  <?= $this->tag->javascriptInclude('js/jquery.flexslider.js') ?>
   <?= $this->tag->javascriptInclude('js/jquery.min.js') ?>
  <?= $this->tag->javascriptInclude('js/bootstrap.min.js') ?>
   <?= $this->tag->javascriptInclude('js/jquery.prettyPhoto.js') ?>
  <?= $this->tag->javascriptInclude('js/jquery.quiclsand.js') ?>
</body>
</html>