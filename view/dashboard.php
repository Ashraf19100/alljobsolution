

<!doctype html>
<html class="no-js" lang="en">

<?php require "layouts/head.php" ?>

<body>
	<div class="wrapper p-2">	
        <div class="row">
        <?php require "layouts/sidemenu.php" ?>
        <div class="col-md-10">
            <div class="content container">
                <div class="search_area">
                    <?php require "layouts/searcharea.php" ?>
                </div>

               <?php
                require_once 'view/allpost.php';
               
               ?> 
              

                
                
            </div>
        </div>
        </div>
        		<?php require "layouts/footer.php" ?>
    
        

        
	
    </div>
	
	<!--==================================================================-->
	<?php require "layouts/scripts.php" ?>
	
</body>

</html>