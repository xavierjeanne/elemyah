jQuery(document).ready(function() 
{
   jQuery(".link").click(function(){
      window.location=$(this).find("a").attr("href");
      return false;
   });
});