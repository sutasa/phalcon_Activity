<html>
<head>
    <meta charset="utf-8">
    {{ get_title() }}
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    {{ stylesheet_link('css/bootstrap.min.css') }} 
    {{ stylesheet_link('css/templete/custom-styles.css') }} 
    {{ stylesheet_link('css/templete/flexslider.css') }} 
    {{ stylesheet_link('css/templete/prettyPhoto.css') }} 
    {{ stylesheet_link('css/templete/.style-ie.css') }} 
    {{ javascript_include('js/jquery.min.js') }}
    {{ javascript_include('js/jquery.custom.js') }}
    {{ javascript_include('js/jquery.easing.1.3.js') }}
    {{ javascript_include('js/jquery.flexslider.js') }}
    {{ javascript_include('js/jquery.min.js') }}
    {{ javascript_include('js/bootstrap.min.js') }}
    {{ javascript_include('js/jquery.prettyPhoto.js') }}
    {{ javascript_include('js/jquery.quiclsand.js') }}
    {{ javascript_include('js/script.js') }}
  
     
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
        {{ content() }}
    </div>
    <br>
    <br>
    
 


</body>
</html>