INSERT INTO test_db_table
(name, email, naiyou, datetime)
VALUES
('TDさん', 'test03@gs.jp', '検索', sysdate())

SELECT * FROM test_db_table

SELECT name FROM test_db_table

SELECT * FROM test_db_table WHERE id = 3;

SELECT * FROM test_db_table WHERE email LIKE '%@test%'

SELECT * FROM test_db_table WHERE email LIKE '%@%' ORDER BY id DESC

SELECT * FROM test_db_table WHERE email LIKE '%@%' ORDER BY id ASC LIMIT 2


INSERT INTO test_db_table
(name, email, naiyou, datetime)
VALUES
(:id, :email, :naiyou, sysdate())