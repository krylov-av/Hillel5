Hillel homework
mirrors:
- git@github.com:krylov-av/hillel_homework.git
- https://krylov_a@bitbucket.org/krylov_a/hillel_homework.git
- git@gitlab.com:krylov_av/hillel_homework.git

Fill the database:
open page
http://localhost:8081
and insert there data from
www/postgres_dump.txt


In this project exists 2 variants of class "Color" for using colors in project.
- index.php
    http://localhost
     Here we use class "byte" for save storing data. Using this class we restrict data
     in class "Color".
- index1.php
    http://localhost/index1.php
     Here we use only one class "Color" and filter data inside of this class.