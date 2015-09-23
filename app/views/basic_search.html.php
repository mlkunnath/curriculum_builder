<?php
$api =  new EBSCOAPI($c,$customparams);
$Info = $api->getInfo();
?>
<div id="toptabcontent"> 
<div class="searchHomeContent">
<div class="searchHomeForm">
    <div class="searchform">
<h1>Basic Search</h1>
<form action="results.php">
    <p>
        <input type="text" name="query" style="width: 350px;" id="lookfor" />
        <input type="hidden" name="expander" value="<?php
            $expanderarray = array();
            foreach ($Info['expanders'] as $expanderoption) {
                if ((isset($expanderoption['DefaultOn'])) && ($expanderoption['DefaultOn'] == "y")) {
                    $expanderarray[] = $expanderoption['Id'];
                }
            }
            echo implode(',',$expanderarray);
        ?>" />
        <?php
            foreach ($Info['limiters'] as $limiteroption) {
                if ((isset($limiteroption['DefaultOn'])) && ($limiteroption['DefaultOn'] == "y")) {
                    echo '<input type="hidden" name="limiter[]" value="'.$limiteroption['Id'].':y" />';
                }
            }  
        ?>
        <input type="submit" value="Search" />
    </p>
    <table>
        <tr>
            <td>
                <input type="radio" id="type-keyword" name="fieldcode" value="keyword" checked="checked"/>
                <label for="type-keyword">Keyword</label>
            </td>
      <?php if(!empty($Info['search'])){ ?>
      <?php foreach($Info['search'] as $searchField){
          if($searchField['Label']=='Author'){
              $fieldCode = $searchField['Code']; ?>
      
            <td>
                <input type="radio" id="type-author" name="fieldcode" value="<?php echo $fieldCode; ?>" />
                <label for="type-author">Author</label>
            </td>
      <?php   
          }
          if($searchField['Label']=='Title'){
              $fieldCode = $searchField['Code']; ?>
            <td>
                <input type="radio" id="type-title" name="fieldcode" value="<?php echo $fieldCode; ?>" />
                <label for="type-title">Title</label>                             
            </td>          
      <?php
          }
      } ?>
      <?php } ?>          
        </tr>
    </table>
</form>
</div>
</div>
</div>
</div>
