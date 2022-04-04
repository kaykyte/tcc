--
-- PostgreSQL database dump
--

-- Dumped from database version 12.1
-- Dumped by pg_dump version 12.1

-- Started on 2022-03-31 09:00:53

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 205 (class 1259 OID 16674)
-- Name: ambiente; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.ambiente (
    id integer NOT NULL,
    tipo_ambiente character varying
);


ALTER TABLE public.ambiente OWNER TO postgres;

--
-- TOC entry 204 (class 1259 OID 16672)
-- Name: ambiente_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.ambiente_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.ambiente_id_seq OWNER TO postgres;

--
-- TOC entry 2837 (class 0 OID 0)
-- Dependencies: 204
-- Name: ambiente_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.ambiente_id_seq OWNED BY public.ambiente.id;


--
-- TOC entry 203 (class 1259 OID 16663)
-- Name: terminal; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.terminal (
    id integer NOT NULL,
    gas character varying,
    ambiente_id integer,
    data_afericao date,
    temperatura double precision,
    umidade integer,
    nivel_gas integer
);


ALTER TABLE public.terminal OWNER TO postgres;

--
-- TOC entry 202 (class 1259 OID 16661)
-- Name: terminal_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.terminal_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.terminal_id_seq OWNER TO postgres;

--
-- TOC entry 2838 (class 0 OID 0)
-- Dependencies: 202
-- Name: terminal_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.terminal_id_seq OWNED BY public.terminal.id;


--
-- TOC entry 2696 (class 2604 OID 16677)
-- Name: ambiente id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ambiente ALTER COLUMN id SET DEFAULT nextval('public.ambiente_id_seq'::regclass);


--
-- TOC entry 2695 (class 2604 OID 16666)
-- Name: terminal id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.terminal ALTER COLUMN id SET DEFAULT nextval('public.terminal_id_seq'::regclass);


--
-- TOC entry 2831 (class 0 OID 16674)
-- Dependencies: 205
-- Data for Name: ambiente; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.ambiente (id, tipo_ambiente) FROM stdin;
1	Interno
3	Externo
\.


--
-- TOC entry 2829 (class 0 OID 16663)
-- Dependencies: 203
-- Data for Name: terminal; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.terminal (id, gas, ambiente_id, data_afericao, temperatura, umidade, nivel_gas) FROM stdin;
10	Agua	1	0006-03-31	37	89	70
\.


--
-- TOC entry 2839 (class 0 OID 0)
-- Dependencies: 204
-- Name: ambiente_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.ambiente_id_seq', 3, true);


--
-- TOC entry 2840 (class 0 OID 0)
-- Dependencies: 202
-- Name: terminal_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.terminal_id_seq', 10, true);


--
-- TOC entry 2700 (class 2606 OID 16682)
-- Name: ambiente ambiente_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ambiente
    ADD CONSTRAINT ambiente_pkey PRIMARY KEY (id);


--
-- TOC entry 2698 (class 2606 OID 16671)
-- Name: terminal terminal_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.terminal
    ADD CONSTRAINT terminal_pkey PRIMARY KEY (id);


--
-- TOC entry 2701 (class 2606 OID 16688)
-- Name: terminal fk_terminal_ambiente; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.terminal
    ADD CONSTRAINT fk_terminal_ambiente FOREIGN KEY (ambiente_id) REFERENCES public.ambiente(id) NOT VALID;


-- Completed on 2022-03-31 09:00:53

--
-- PostgreSQL database dump complete
--

