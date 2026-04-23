<style>
  #child_location option{
    display:none;
  }
  #child_location option:first-child{
    display:block;
  }
  <?php foreach( get_terms( 'property_location', array( 'hide_empty' => false, 'parent' => 0 ) ) as $parent_term ) { ?>
    #child_location.<?php echo $parent_term->slug; ?> .<?php echo $parent_term->slug; ?>{
        display:block;
      }
  <?php } ?>
</style>

<div class="form-group">
		<label for="parent_location" class="select-style">
      <select name="property_location" id="parent_location" onchange="myFunction()">
        <option value="">Tỉnh/TP</option>
        <?php foreach( get_terms( 'property_location', array( 'hide_empty' => false, 'parent' => 0 ) ) as $parent_term ) { ?>
            <?php
              echo "<option value='".$parent_term->slug."' ".($_GET['property_location'] == $parent_term->slug ? ' selected' : '').">".$parent_term->name."</option>";
            ?>
         <?php } ?>
       </select>
    </label>
</div>

<div class="form-group">
		<label for="child_location" class="select-style">
      <select name="child_location" id="child_location" class="<?php echo $_GET['property_location']; ?>">
        <option value="">Quận/Huyện</option>
        <?php 
        foreach( get_terms( 'property_location', array( 'hide_empty' => false, 'parent' => 0 ) ) as $parent_term ) { 
          foreach( get_terms( 'property_location', array( 'hide_empty' => false, 'parent' => $parent_term->term_id ) ) as $child_term ) { ?>
            <?php
              echo "<option class='".$parent_term->slug."' value='".$child_term->slug."'".($_GET['child_location'] == $child_term->slug ? ' selected="selected"' : '').">".$child_term->name."</option>";
            ?>
        <?php } }?>
      </select>
    </label>
</div>


<script>
function myFunction() {
  var x = document.getElementById("parent_location").value;
  var element = document.getElementById("child_location");
   element.className = x;
   document.getElementById("child_location").selectedIndex=0;
}
</script>