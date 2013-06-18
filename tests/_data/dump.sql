--
-- PostgreSQL database dump
--

-- Dumped from database version 9.1.9
-- Dumped by pg_dump version 9.2.2
-- Started on 2013-06-18 16:37:12

SET statement_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 162 (class 1259 OID 24647)
-- Name: nowplaying; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE nowplaying (
    id integer NOT NULL,
    source character varying(255) NOT NULL,
    artist character varying(255) NOT NULL,
    title character varying(255) NOT NULL,
    updatetime timestamp(0) without time zone NOT NULL
);


ALTER TABLE public.nowplaying OWNER TO postgres;

--
-- TOC entry 161 (class 1259 OID 24645)
-- Name: nowplaying_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE nowplaying_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.nowplaying_id_seq OWNER TO postgres;

--
-- TOC entry 1871 (class 0 OID 0)
-- Dependencies: 161
-- Name: nowplaying_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE nowplaying_id_seq OWNED BY nowplaying.id;


--
-- TOC entry 1863 (class 2604 OID 24650)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY nowplaying ALTER COLUMN id SET DEFAULT nextval('nowplaying_id_seq'::regclass);


--
-- TOC entry 1865 (class 2606 OID 24655)
-- Name: nowplaying_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY nowplaying
    ADD CONSTRAINT nowplaying_pkey PRIMARY KEY (id);


--
-- TOC entry 1866 (class 1259 OID 24656)
-- Name: uniq_c79e5c995f8a7f73; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE UNIQUE INDEX uniq_c79e5c995f8a7f73 ON nowplaying USING btree (source);


-- Completed on 2013-06-18 16:37:12

--
-- PostgreSQL database dump complete
--

