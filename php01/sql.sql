SELECT * FROM gs_an_table;

INSERT INTO gs_an_table(name,email,naiyou,indate)VALUE('izumi','test@test.jp','テスト',sysdate());

SELECT * FROM gs_an_table WHERE naiyou LIKE '%テスト%' AND id>3;
SELECT * FROM gs_an_table WHERE id>3 ORDER BY id DESC;

