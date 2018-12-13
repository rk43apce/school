

<?php

echo '<pre>';

var_dump($_GET);
echo '</pre>';

?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Combo Dropdown - Semantic UI</title>
  
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.3/semantic.min.css"/>


  
  
</head>

<body>
<form>
 <select name="subject[]" class="ui fluid search dropdown" multiple="">
  <option value="">State</option>
  <option value="AL">Alabama</option>
  <option value="AK">Alaska</option>
  <option value="AZ">Arizona</option>
 
</select>
<input type="submit" name="">
</form>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.3/semantic.min.js"></script>


  <script>
  $('.ui.dropdown')
  .dropdown();


</script>


</body>

</html>
