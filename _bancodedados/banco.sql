CREATE TABLE users
(
  id bigserial NOT NULL,
  "user" character varying NOT NULL,
  pass character varying NOT NULL,
  CONSTRAINT users_pkey PRIMARY KEY (id),
  CONSTRAINT users_user_key UNIQUE ("user")
);

CREATE TABLE users_tokens
(
  token character varying NOT NULL,
  creation_date timestamp without time zone NOT NULL,
  id bigserial NOT NULL,
  id_user bigint NOT NULL,
  status integer NOT NULL,
  CONSTRAINT users_tokens_pkey PRIMARY KEY (id),
  CONSTRAINT users_tokens_id_user_fkey FOREIGN KEY (id_user)
      REFERENCES users (id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
);

CREATE TABLE profiles
(
  id serial NOT NULL,
  name character varying NOT NULL,
  email character varying NOT NULL,
  image character varying,
  id_user integer NOT NULL,
  status integer NOT NULL,
  CONSTRAINT profiles_pkey PRIMARY KEY (id),
  CONSTRAINT profiles_id_user_fkey FOREIGN KEY (id_user)
      REFERENCES users (id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
);

CREATE TABLE logs
(
  id bigserial NOT NULL,
  id_user bigserial NOT NULL,
  action character varying NOT NULL,
  date_action timestamp without time zone NOT NULL,
  CONSTRAINT logs_pkey PRIMARY KEY (id),
  CONSTRAINT logs_id_user_fkey FOREIGN KEY (id_user)
      REFERENCES users (id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
);

CREATE TABLE users_sessions
(
  id serial NOT NULL,
  id_user integer NOT NULL,
  actions character varying NOT NULL,
  CONSTRAINT users_projects_sessions_pkey PRIMARY KEY (id),
  CONSTRAINT users_projects_sessions_id_user_fkey FOREIGN KEY (id_user)
      REFERENCES users (id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
);

CREATE OR REPLACE FUNCTION public.login(
    IN _user character varying,
    IN _pass character varying)
  RETURNS TABLE(id bigint) AS
$BODY$
DECLARE 
	_id RECORD;
BEGIN
	
	SELECT INTO _id u.id, p.name, p.image
		FROM users u
		INNER JOIN profiles p ON p.id_user = u.id
		WHERE u.user = _user
			AND u.pass = _pass
			AND p.status = 1;
		
	IF _id.id IS NOT NULL THEN
		INSERT INTO logs (id_user, action, date_action) VALUES (_id.id, 'entrou no sistema', CURRENT_TIMESTAMP);
		RETURN QUERY SELECT _id.id;
	ELSE
		RETURN QUERY SELECT _id.id;
	END IF;
	
END;
$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100
  ROWS 1000;