<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>
					<?= Yii::$app->user->identity->username; ?>
				</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form ->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
				<span class="input-group-btn">
					<button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
					</button>
				</span>
            </div>
        </form>
        <!-- /.search form -->

		<?=

		dmstr\widgets\Menu::widget(
			[
				'options'	 => ['class' => 'sidebar-menu'],
				'items'		 => [
					['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
					[
						'label'	 => 'User Managemen',
						'icon'	 => 'fa fa-group',
						'url'	 => '#',
						'items'	 => [
							[
								'label'	 => 'New User',
								'icon'	 => 'fa fa-plus',
								'url'	 => ['/user/admin/create'],
							],
							[
								'label'	 => 'List User',
								'icon'	 => 'fa fa-group',
								'url'	 => ['/user/admin'],
							],
						],
					],
					[
						'label'	 => 'Role Based Access',
						'icon'	 => 'fa fa-lock',
						'url'	 => '#',
						'items'	 => [
							[
								'label'	 => 'Assignment',
								'icon'	 => 'fa fa-legal',
								'url'	 => ['/admin'],
							],
							[
								'label'	 => 'Roles',
								'icon'	 => 'fa fa-key',
								'url'	 => ['/admin/role'],
							],
							[
								'label'	 => 'Routes',
								'icon'	 => 'fa fa-link',
								'url'	 => ['/admin/route'],
							],
							
						],
					],
					
				],
			]
		)

		?>

    </section>

</aside>
