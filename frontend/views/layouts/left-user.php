<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">

				<?=

				\common\widgets\Gravatar::widget([
					'email'		 => Yii::$app->user->identity->email,
					'size'		 => 45,
					'options'	 => [
						'class'	 => 'img-circle',
						'alt'	 => 'Gravatar image',
						'title'	 => 'Gravatar image',
					],
					'linkUrl'	 => FALSE,
				]);

				?>

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
        <?php
        	if(Yii::$app->user->can('/religion/index')) {
	        	echo dmstr\widgets\Menu::widget(
				[
					'options'	 => ['class' => 'sidebar-menu'],
					'items'		 => [
						['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
						[
							'label'	 => 'Master',
							'icon'	 => 'fa fa-th-list',
							'url'	 => '#',
							'items'	 => [
								[
									'label'	 => 'Religion',
									'icon'	 => 'fa fa-th',
									'url'	 => ['/religion'],
								],
							],
						],
					],
				]
			);
        }
        ?>

		<?=

		dmstr\widgets\Menu::widget(
			[
				'options'	 => ['class' => 'sidebar-menu'],
				'items'		 => [
					
					[
						'label'	 => 'Region (Wilayah)',
						'icon'	 => 'fa fa-thumb-tack',
						'url'	 => '#',
						'items'	 => [
							[
								'label'	 => 'Country',
								'icon'	 => 'fa fa-thumb-tack',
								'url'	 => ['/rgn-country'],
							],
							[
								'label'	 => 'Province',
								'icon'	 => 'fa fa-thumb-tack',
								'url'	 => ['/rgn-province'],
							],
							[
								'label'	 => 'City',
								'icon'	 => 'fa fa-thumb-tack',
								'url'	 => ['/rgn-city'],
							],
							[
								'label'	 => 'District',
								'icon'	 => 'fa fa-thumb-tack',
								'url'	 => ['/rgn-district'],
							],
							[
								'label'	 => 'Subdistrict',
								'icon'	 => 'fa fa-thumb-tack',
								'url'	 => ['/rgn-subdistrict'],
							],
							[
								'label'	 => 'Postcode',
								'icon'	 => 'fa fa-thumb-tack',
								'url'	 => ['/rgn-postcode'],
							],
						],
					],
					[
						'label'	 => 'Modules',
						'icon'	 => 'fa fa-folder',
						'url'	 => '#',
						'items'	 => [
							[
								'label'	 => 'Region',
								'icon'	 => 'fa fa-circle-o',
								'url'	 => '/region',
								'items'	 => [
									['label' => 'Country', 'icon' => 'fa fa-circle-o', 'url' => ['/region/country'],],
									['label' => 'Province', 'icon' => 'fa fa-circle-o', 'url' => ['/region/province'],],
									['label' => 'City', 'icon' => 'fa fa-circle-o', 'url' => ['/region/city'],],
									['label' => 'District', 'icon' => 'fa fa-circle-o', 'url' => ['/region/district'],],
									['label' => 'Subdistrict', 'icon' => 'fa fa-circle-o', 'url' => ['/region/subdistrict'],],
									['label' => 'Postcode', 'icon' => 'fa fa-circle-o', 'url' => ['/region/postcode'],],
								],
							],
						],
					],
				],
			]
		)

		?>

    </section>

</aside>
