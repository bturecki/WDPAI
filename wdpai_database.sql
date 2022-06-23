--
-- PostgreSQL database dump
--

-- Dumped from database version 14.4 (Ubuntu 14.4-1.pgdg20.04+1)
-- Dumped by pg_dump version 14.3

-- Started on 2022-06-23 19:19:13

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
-- TOC entry 211 (class 1259 OID 8054198)
-- Name: t_car; Type: TABLE; Schema: public; Owner: mxcbqopgvfyrji
--

CREATE TABLE public.t_car (
    make character varying(200),
    model character varying(200),
    id integer NOT NULL,
    image character varying(250),
    car_owner integer,
    city_id integer
);


ALTER TABLE public.t_car OWNER TO mxcbqopgvfyrji;

--
-- TOC entry 216 (class 1259 OID 9859659)
-- Name: t_car_comment; Type: TABLE; Schema: public; Owner: mxcbqopgvfyrji
--

CREATE TABLE public.t_car_comment (
    id integer NOT NULL,
    car_id integer,
    comment character varying(4000),
    i_user integer,
    i_date date DEFAULT CURRENT_DATE NOT NULL
);


ALTER TABLE public.t_car_comment OWNER TO mxcbqopgvfyrji;

--
-- TOC entry 215 (class 1259 OID 9859658)
-- Name: t_car_comment_id_seq; Type: SEQUENCE; Schema: public; Owner: mxcbqopgvfyrji
--

CREATE SEQUENCE public.t_car_comment_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.t_car_comment_id_seq OWNER TO mxcbqopgvfyrji;

--
-- TOC entry 4351 (class 0 OID 0)
-- Dependencies: 215
-- Name: t_car_comment_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: mxcbqopgvfyrji
--

ALTER SEQUENCE public.t_car_comment_id_seq OWNED BY public.t_car_comment.id;


--
-- TOC entry 212 (class 1259 OID 8150593)
-- Name: t_car_id_seq; Type: SEQUENCE; Schema: public; Owner: mxcbqopgvfyrji
--

CREATE SEQUENCE public.t_car_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.t_car_id_seq OWNER TO mxcbqopgvfyrji;

--
-- TOC entry 4352 (class 0 OID 0)
-- Dependencies: 212
-- Name: t_car_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: mxcbqopgvfyrji
--

ALTER SEQUENCE public.t_car_id_seq OWNED BY public.t_car.id;


--
-- TOC entry 219 (class 1259 OID 10391482)
-- Name: t_city; Type: TABLE; Schema: public; Owner: mxcbqopgvfyrji
--

CREATE TABLE public.t_city (
    id integer NOT NULL,
    city_name character varying(100),
    coordinates character varying(50)
);


ALTER TABLE public.t_city OWNER TO mxcbqopgvfyrji;

--
-- TOC entry 218 (class 1259 OID 10391481)
-- Name: t_city_id_seq; Type: SEQUENCE; Schema: public; Owner: mxcbqopgvfyrji
--

CREATE SEQUENCE public.t_city_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.t_city_id_seq OWNER TO mxcbqopgvfyrji;

--
-- TOC entry 4353 (class 0 OID 0)
-- Dependencies: 218
-- Name: t_city_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: mxcbqopgvfyrji
--

ALTER SEQUENCE public.t_city_id_seq OWNED BY public.t_city.id;


--
-- TOC entry 209 (class 1259 OID 8008878)
-- Name: t_user; Type: TABLE; Schema: public; Owner: mxcbqopgvfyrji
--

CREATE TABLE public.t_user (
    email character varying(255),
    password character varying(255),
    id_user_details integer,
    id integer NOT NULL,
    is_admin integer DEFAULT 0
);


ALTER TABLE public.t_user OWNER TO mxcbqopgvfyrji;

--
-- TOC entry 210 (class 1259 OID 8054184)
-- Name: t_user_details; Type: TABLE; Schema: public; Owner: mxcbqopgvfyrji
--

CREATE TABLE public.t_user_details (
    name character varying(400),
    surname character varying(400),
    id integer NOT NULL,
    phone character varying(15)
);


ALTER TABLE public.t_user_details OWNER TO mxcbqopgvfyrji;

--
-- TOC entry 214 (class 1259 OID 8150617)
-- Name: t_user_details_id_seq; Type: SEQUENCE; Schema: public; Owner: mxcbqopgvfyrji
--

CREATE SEQUENCE public.t_user_details_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.t_user_details_id_seq OWNER TO mxcbqopgvfyrji;

--
-- TOC entry 4354 (class 0 OID 0)
-- Dependencies: 214
-- Name: t_user_details_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: mxcbqopgvfyrji
--

ALTER SEQUENCE public.t_user_details_id_seq OWNED BY public.t_user_details.id;


--
-- TOC entry 213 (class 1259 OID 8150607)
-- Name: t_user_id_seq; Type: SEQUENCE; Schema: public; Owner: mxcbqopgvfyrji
--

CREATE SEQUENCE public.t_user_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.t_user_id_seq OWNER TO mxcbqopgvfyrji;

--
-- TOC entry 4355 (class 0 OID 0)
-- Dependencies: 213
-- Name: t_user_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: mxcbqopgvfyrji
--

ALTER SEQUENCE public.t_user_id_seq OWNED BY public.t_user.id;


--
-- TOC entry 217 (class 1259 OID 9863798)
-- Name: v_user_car_comments; Type: VIEW; Schema: public; Owner: mxcbqopgvfyrji
--

CREATE VIEW public.v_user_car_comments AS
 SELECT d.name,
    d.surname,
    u.email,
    t.car_id,
    c.make,
    c.model,
    t.comment
   FROM (((public.t_car_comment t
     JOIN public.t_car c ON ((t.car_id = c.id)))
     JOIN public.t_user u ON ((u.id = t.i_user)))
     JOIN public.t_user_details d ON ((d.id = u.id_user_details)));


ALTER TABLE public.v_user_car_comments OWNER TO mxcbqopgvfyrji;

--
-- TOC entry 4178 (class 2604 OID 8150594)
-- Name: t_car id; Type: DEFAULT; Schema: public; Owner: mxcbqopgvfyrji
--

ALTER TABLE ONLY public.t_car ALTER COLUMN id SET DEFAULT nextval('public.t_car_id_seq'::regclass);


--
-- TOC entry 4179 (class 2604 OID 9859662)
-- Name: t_car_comment id; Type: DEFAULT; Schema: public; Owner: mxcbqopgvfyrji
--

ALTER TABLE ONLY public.t_car_comment ALTER COLUMN id SET DEFAULT nextval('public.t_car_comment_id_seq'::regclass);


--
-- TOC entry 4181 (class 2604 OID 10391485)
-- Name: t_city id; Type: DEFAULT; Schema: public; Owner: mxcbqopgvfyrji
--

ALTER TABLE ONLY public.t_city ALTER COLUMN id SET DEFAULT nextval('public.t_city_id_seq'::regclass);


--
-- TOC entry 4175 (class 2604 OID 8150608)
-- Name: t_user id; Type: DEFAULT; Schema: public; Owner: mxcbqopgvfyrji
--

ALTER TABLE ONLY public.t_user ALTER COLUMN id SET DEFAULT nextval('public.t_user_id_seq'::regclass);


--
-- TOC entry 4177 (class 2604 OID 8150618)
-- Name: t_user_details id; Type: DEFAULT; Schema: public; Owner: mxcbqopgvfyrji
--

ALTER TABLE ONLY public.t_user_details ALTER COLUMN id SET DEFAULT nextval('public.t_user_details_id_seq'::regclass);


--
-- TOC entry 4337 (class 0 OID 8054198)
-- Dependencies: 211
-- Data for Name: t_car; Type: TABLE DATA; Schema: public; Owner: mxcbqopgvfyrji
--

COPY public.t_car (make, model, id, image, car_owner, city_id) FROM stdin;
fernando	alonso	18	Alonso_2016.jpg	3	1
pog	champ	19	549-5499146_167kib-560x943-animated-sad-frog-pepe-the-frog.png	3	1
Ferrari	Szybkie	23	388411.jpg	3	1
Ferrari	Wolne	24	tipo-184-kit-1.jpg	3	2
Szybkie	Auto	25	km1.png	3	2
\.


--
-- TOC entry 4342 (class 0 OID 9859659)
-- Dependencies: 216
-- Data for Name: t_car_comment; Type: TABLE DATA; Schema: public; Owner: mxcbqopgvfyrji
--

COPY public.t_car_comment (id, car_id, comment, i_user, i_date) FROM stdin;
1	18	TEST	3	2022-06-07
2	18	test2	3	2022-06-08
3	19	witam	3	2022-06-08
4	18	witam	3	2022-06-11
5	18	cyk	3	2022-06-19
6	23	test	3	2022-06-20
\.


--
-- TOC entry 4344 (class 0 OID 10391482)
-- Dependencies: 219
-- Data for Name: t_city; Type: TABLE DATA; Schema: public; Owner: mxcbqopgvfyrji
--

COPY public.t_city (id, city_name, coordinates) FROM stdin;
1	Cracow	{"point": [19.944, 50.049]}
2	Warsaw	{"point": [21.017, 52.237]}
\.


--
-- TOC entry 4335 (class 0 OID 8008878)
-- Dependencies: 209
-- Data for Name: t_user; Type: TABLE DATA; Schema: public; Owner: mxcbqopgvfyrji
--

COPY public.t_user (email, password, id_user_details, id, is_admin) FROM stdin;
bartek@pk.pl	$2y$10$zSjlS7KvC0FwhSbaxtYIZO8Mc1IWJQyYnyZtIpd7VABo291FMVd9W	3	3	1
bartek2@pk.pl	$2y$10$nEcxmXu.4P0ktX0iZyOiyeYbQm41AN6s95fSMKDNtRn97UbDjOBbG	4	4	0
\.


--
-- TOC entry 4336 (class 0 OID 8054184)
-- Dependencies: 210
-- Data for Name: t_user_details; Type: TABLE DATA; Schema: public; Owner: mxcbqopgvfyrji
--

COPY public.t_user_details (name, surname, id, phone) FROM stdin;
Bartosz	Turecki	1	\N
Bar	Tur	2	123
BB	TT	3	123123123
User	Testowy	4	123
\.


--
-- TOC entry 4356 (class 0 OID 0)
-- Dependencies: 215
-- Name: t_car_comment_id_seq; Type: SEQUENCE SET; Schema: public; Owner: mxcbqopgvfyrji
--

SELECT pg_catalog.setval('public.t_car_comment_id_seq', 38, true);


--
-- TOC entry 4357 (class 0 OID 0)
-- Dependencies: 212
-- Name: t_car_id_seq; Type: SEQUENCE SET; Schema: public; Owner: mxcbqopgvfyrji
--

SELECT pg_catalog.setval('public.t_car_id_seq', 57, true);


--
-- TOC entry 4358 (class 0 OID 0)
-- Dependencies: 218
-- Name: t_city_id_seq; Type: SEQUENCE SET; Schema: public; Owner: mxcbqopgvfyrji
--

SELECT pg_catalog.setval('public.t_city_id_seq', 1, false);


--
-- TOC entry 4359 (class 0 OID 0)
-- Dependencies: 214
-- Name: t_user_details_id_seq; Type: SEQUENCE SET; Schema: public; Owner: mxcbqopgvfyrji
--

SELECT pg_catalog.setval('public.t_user_details_id_seq', 4, true);


--
-- TOC entry 4360 (class 0 OID 0)
-- Dependencies: 213
-- Name: t_user_id_seq; Type: SEQUENCE SET; Schema: public; Owner: mxcbqopgvfyrji
--

SELECT pg_catalog.setval('public.t_user_id_seq', 4, true);


--
-- TOC entry 4187 (class 2606 OID 8150596)
-- Name: t_car t_car_pkey; Type: CONSTRAINT; Schema: public; Owner: mxcbqopgvfyrji
--

ALTER TABLE ONLY public.t_car
    ADD CONSTRAINT t_car_pkey PRIMARY KEY (id);


--
-- TOC entry 4189 (class 2606 OID 10391595)
-- Name: t_city t_city_pkey; Type: CONSTRAINT; Schema: public; Owner: mxcbqopgvfyrji
--

ALTER TABLE ONLY public.t_city
    ADD CONSTRAINT t_city_pkey PRIMARY KEY (id);


--
-- TOC entry 4185 (class 2606 OID 8150620)
-- Name: t_user_details t_user_details_pkey; Type: CONSTRAINT; Schema: public; Owner: mxcbqopgvfyrji
--

ALTER TABLE ONLY public.t_user_details
    ADD CONSTRAINT t_user_details_pkey PRIMARY KEY (id);


--
-- TOC entry 4183 (class 2606 OID 8150610)
-- Name: t_user t_user_pkey; Type: CONSTRAINT; Schema: public; Owner: mxcbqopgvfyrji
--

ALTER TABLE ONLY public.t_user
    ADD CONSTRAINT t_user_pkey PRIMARY KEY (id);


--
-- TOC entry 4191 (class 2606 OID 9733223)
-- Name: t_car fk_car_owner; Type: FK CONSTRAINT; Schema: public; Owner: mxcbqopgvfyrji
--

ALTER TABLE ONLY public.t_car
    ADD CONSTRAINT fk_car_owner FOREIGN KEY (car_owner) REFERENCES public.t_user(id);


--
-- TOC entry 4192 (class 2606 OID 10391600)
-- Name: t_car fk_city_id; Type: FK CONSTRAINT; Schema: public; Owner: mxcbqopgvfyrji
--

ALTER TABLE ONLY public.t_car
    ADD CONSTRAINT fk_city_id FOREIGN KEY (city_id) REFERENCES public.t_city(id);


--
-- TOC entry 4194 (class 2606 OID 9860122)
-- Name: t_car_comment fk_t_car_comment_car_id; Type: FK CONSTRAINT; Schema: public; Owner: mxcbqopgvfyrji
--

ALTER TABLE ONLY public.t_car_comment
    ADD CONSTRAINT fk_t_car_comment_car_id FOREIGN KEY (car_id) REFERENCES public.t_car(id) ON DELETE CASCADE;


--
-- TOC entry 4193 (class 2606 OID 9860095)
-- Name: t_car_comment fk_t_car_comment_user_id; Type: FK CONSTRAINT; Schema: public; Owner: mxcbqopgvfyrji
--

ALTER TABLE ONLY public.t_car_comment
    ADD CONSTRAINT fk_t_car_comment_user_id FOREIGN KEY (i_user) REFERENCES public.t_user(id) ON DELETE CASCADE;


--
-- TOC entry 4190 (class 2606 OID 8200358)
-- Name: t_user fk_user_details; Type: FK CONSTRAINT; Schema: public; Owner: mxcbqopgvfyrji
--

ALTER TABLE ONLY public.t_user
    ADD CONSTRAINT fk_user_details FOREIGN KEY (id_user_details) REFERENCES public.t_user_details(id) ON DELETE CASCADE;


--
-- TOC entry 4350 (class 0 OID 0)
-- Dependencies: 850
-- Name: LANGUAGE plpgsql; Type: ACL; Schema: -; Owner: postgres
--

GRANT ALL ON LANGUAGE plpgsql TO mxcbqopgvfyrji;


-- Completed on 2022-06-23 19:19:17

--
-- PostgreSQL database dump complete
--

