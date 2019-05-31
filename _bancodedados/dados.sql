INSERT INTO "users" (id, "user", pass) VALUES (1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997');
INSERT INTO profiles (id, name, email, id_user, status) VALUES (1, 'Administrador', 'adm@mail.com', 1, 1);
INSERT INTO users_sessions (id, id_user, actions) VALUES (1, 1, 'usuarios');