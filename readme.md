1. git clone .....
2. cd ....
3. composer install
4. Ganti nama file .env.example menjadi .env
    Pada windows bisa menggunakan perintah move .env.example .env
    Pada linux bisa menggunakan perintah mv .env.example .env
5. Ganti pengaturan database pada file .env dengan yang akan digunakan
6. php artisan key:generate
7. php aritsan migrate
8. php artisan db:seed
