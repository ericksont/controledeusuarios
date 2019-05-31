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