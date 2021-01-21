		<nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
		  <button id="sidebarToggleTop"  class="btn btn-link rounded-circle mr-3" >
            <i class="fab fa-youtube"></i>
          </button>
		  <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fab fa-discord"></i>
          </button>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
		<?php	
		include("fbaglan.php");
		$grupid = $user->data['group_id'];
		$grupidbul = mysqli_query($baglanti2, "SELECT * FROM phpbb_groups WHERE group_id = '$grupid'"); 
		if($grupidbul >= 1)
		{
			$f_bul = mysqli_query($baglanti2, "SELECT * FROM phpbb_groups WHERE group_id = '$grupid'");
			$ara = mysqli_fetch_assoc($f_bul);
			$grup = $ara['group_name'];
			
		}
		else if($grupidbul < 1)
		{
			$grup = "bulunamadı";
		}
		?>
                <span class="ml-2 d-none d-lg-inline text-white small"><strong><?php echo $user->data['username']; ?></strong><br><?php echo $grup ?>&nbsp;</span>
				<i style="margin-left: 7px;" class="fas fa-user"></i>  
				<i style="margin-left: 20px; margin-right: 10px;" class="fas fa-bell"></i>
			  </a>				
			  <?php include('includes/duye.php'); ?>
            </li>
          </ul>
        </nav>