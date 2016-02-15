Yii 2 Boilerplate
===============================

PROSES INSTALASI



1 clone repo

2 install komponen
```
composer install
```

3 memulai project Yii
```
./yii init
```

4 Buat Database

5 Set database connetion di file common/config/main-local.php

6 migrasi database
```
./yii migrate/up --migrationPath=@vendor/dektrium/yii2-user/migrations
```

7  import sql db changelog `database/changelog`.

