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
      <select name="parent_location" id="parent_location" class="form-control filter-select" onchange="myFunction()">
        <option value="">Tỉnh/TP</option>
        <?php foreach( get_terms( 'property_location', array( 'hide_empty' => false, 'parent' => 0 ) ) as $parent_term ) { ?>
            <?php
              echo "<option value='".$parent_term->slug."' ".($_GET['parent_location'] == $parent_term->slug ? ' selected' : '').">".$parent_term->name."</option>";
            ?>
         <?php } ?>
       </select>
    </label>
</div>

<div class="form-group">
		<label for="child_location" class="select-style">
      <select name="child_location" id="child_location" class="form-control filter-select <?php echo $_GET['parent_location']; ?>">
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
  var parent = document.getElementById("parent_location");
  var child = document.getElementById("child_location");

  var x = parent.value;

  child.className = "form-control filter-select " + x;

  child.selectedIndex = 0;

  child.style.color = "#999";

  if (parent.value === "") {
      parent.style.color = "#999";
  } else {
      parent.style.color = "#000";
  }
}
</script>
<script>
document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll('.filter-select').forEach(select => {
        if (select.value === "") {
            select.style.color = "#999";
        } else {
            select.style.color = "#000";
        }

        select.addEventListener('change', function () {
            if (this.value === "") {
                this.style.color = "#999";
            } else {
                this.style.color = "#000";
            }
        });
    });
});
</script>