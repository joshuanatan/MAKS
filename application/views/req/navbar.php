<div class="site-menubar">
    <div class="site-menubar-header">
        <div class="cover overlay">
            <div class="overlay-panel vertical-align overlay-background">
                <div class="vertical-align-middle">
                    <a class="avatar avatar-lg" href="javascript:void(0)">
                        <img src="<?php echo base_url();?>assets/images/default.jpg" alt="...">
                    </a>
                    <div class="site-menubar-info">
                        <h5 class="site-menubar-user"><?php echo $this->session->nama_user;?></h5>
                        <p class="site-menubar-email"><?php echo $this->session->email_user;?> </p>
                    </div>
                </div>
            </div>
        </div>
    </div>  
    <div class="site-menubar-body">
        <div>
            <div>
                <ul class="site-menu" data-plugin="menu">
                    <li class="site-menu-item">
                        <a href="<?php echo base_url();?>setup">
                            <i class="site-menu-icon wb-arrow-expand" aria-hidden="true"></i>
                            <span class="site-menu-title">Module Connection</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="<?php echo base_url();?>system_flow">
                            <i class="site-menu-icon wb-arrow-expand" aria-hidden="true"></i>
                            <span class="site-menu-title">System Flow</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="<?php echo base_url();?>user">
                            <i class="site-menu-icon wb-memory" aria-hidden="true"></i>
                            <span class="site-menu-title">User Administrator</span>
                        </a>
                    </li>
                </ul> 
            </div>
        </div>
    </div>
</div>