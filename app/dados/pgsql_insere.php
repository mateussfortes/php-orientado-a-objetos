<?php 

$conn = pg_connect("host=postgres dbname=livro user=db_user password=db_password");

pg_query($conn, "INSERT INTO famosos (codigo, nome) VALUES (1, 'Érico Veríssimmo)");

pg_query($conn, "INSERT INTO famosos (codigo, nome) VALUES (2, 'John Lennon)");

pg_query($conn, "INSERT INTO famosos (codigo, nome) VALUES (3, 'Mahatma Gandhi')");

pg_query($conn, "INSERT INTO famosos (codigo, nome) VALUES (4, 'Ayrton Senna')");

pg_query($conn, "INSERT INTO famosos (codigo, nome) VALUES (5, 'Charlie Chaplin')");

pg_close($conn);