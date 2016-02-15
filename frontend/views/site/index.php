<?php

use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'Yii 2 Boilerplate';

?>
<style>
	dd {
		margin-bottom: 30px;
	}
	dt {
		margin-top: 20px;
	}

</style>
<div class="site-index">

	<div
		class="fb-like"
		data-share="true"
		data-width="450"
		data-show-faces="true"
		style="float: right;"
		>
	</div>    

    <div class="body-content">

		
		<br/>

		<p style="text-align: justify;">
			Depedency yang digunakan:
		</p>

		<ul>
			<li style="text-align: justify;">
				<a href="https://github.com/yiisoft/yii2-app-advanced" target="_blank"><strong>Yii2-app-advance</strong></a>
			</li>
			<li style="text-align: justify;">
				<a href="https://github.com/dektrium/yii2-user" target="_blank"><strong>Dektrium User Management</strong></a>
			</li>
			<li style="text-align: justify;">
				<a href="https://github.com/mdmsoft/yii2-admin" target="_blank"><strong>RBAC mdmsoft</strong></a>
			</li>
			<li style="text-align: justify;">
				<a href="https://github.com/dmstr/yii2-adminlte-asset" target="_blank"><strong>adminLTE</strong></a>
			</li>
			<li style="text-align: justify;">
				<a href="https://github.com/cahyadsn/daerah" target="_blank"><strong>Database wilayah Indonesia</strong></a>.
			</li>
		</ul>
		&nbsp;

		<?php if (Yii::$app->user->isGuest): ?>

			<p align="center">
				<?= Html::a('Login', ['/user/security/login'], ['class' => 'btn btn-lg btn-info', 'title' => 'masuk ke sistem']) ?>
				&nbsp;
				<?= Html::a('Lupa Password', ['/user/recovery/request'], ['class' => 'btn btn-lg btn-warning', 'title' => 'reset password']) ?>
			</p>

			<p align="center">
				<?= Html::a('Register', ['/user/registration/register'], ['class' => 'btn btn-lg btn-info', 'title' => 'mendaftarkan akun baru']) ?>
				&nbsp;
				<?= Html::a('Resend Confirmation', ['/user/registration/resend'], ['class' => 'btn btn-lg btn-info', 'title' => 'kirim ulang email konfirmasi akun']) ?>
			</p>

		<?php else: ?>

			<strong>Tambahan:</strong>

			Dari saya ada bebera class, fungsi serta extend dari komponen bawaan. Tapi yg utama ada 2, yaitu:

			<dl>

				<dt>1. Access Control tiap Model</dt>
				<dd>
					Fitur ini terbagi jadi 2 tipe class extend dari ModelAccess dan ModelOperation. ModelAccess untuk mengatur hak akses ke model seperti menampilkan tabel data & create data baru. Sedang ModelOperation mengelola operasi apa saja yg tersedia untuk suatu model.
				</dd>

				<dt>2. Module Database Daerah</dt>
				<dd>
					Ini adalah implementasi data wilayah indonesia. Untuk mengelola data ini disediakan modul tersendiri (frontend) dan juga controller frontend. Sebenarnya isinya sama saja. Module ini dibuat hanya sebagai contoh untuk menunjukan perbedaan komponen yg dikelompokkan tersendiri dalam satu module dengan komponen yg bercampur jadi satu di frontend. Secara coding sih lebih rapi tentunya. Satu-satunya yg terasa agak gimana cuma penyebutan namespace. Itupun hanya sedikit saat deklarasi class & use class.
				</dd>

			</dl>

			<p style="text-align: justify;">
				bisa di download di github
				<a href="#" target="_blank"><strong>Github</strong></a>.
			</p>

			
			

		<?php endif; ?>

    </div>
</div>

