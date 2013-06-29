--
-- PostgreSQL database dump
--

-- Dumped from database version 9.1.9
-- Dumped by pg_dump version 9.2.2
-- Started on 2013-06-29 15:06:36

SET statement_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- TOC entry 167 (class 3079 OID 11645)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 1893 (class 0 OID 0)
-- Dependencies: 167
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 162 (class 1259 OID 24686)
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
-- TOC entry 161 (class 1259 OID 24684)
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
-- TOC entry 1894 (class 0 OID 0)
-- Dependencies: 161
-- Name: nowplaying_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE nowplaying_id_seq OWNED BY nowplaying.id;


--
-- TOC entry 163 (class 1259 OID 24696)
-- Name: spot; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE spot (
    id integer NOT NULL,
    track_id integer,
    source character varying(3) NOT NULL,
    createdate timestamp(0) without time zone NOT NULL
);


ALTER TABLE public.spot OWNER TO postgres;

--
-- TOC entry 166 (class 1259 OID 24716)
-- Name: spot_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE spot_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.spot_id_seq OWNER TO postgres;

--
-- TOC entry 165 (class 1259 OID 24704)
-- Name: track; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE track (
    id integer NOT NULL,
    artist character varying(255) NOT NULL,
    title character varying(255) NOT NULL,
    flags integer NOT NULL,
    views integer NOT NULL,
    score integer NOT NULL,
    canonicalname character varying(255) NOT NULL,
    youtubeid character varying(16) DEFAULT NULL::character varying,
    status integer NOT NULL,
    createdate timestamp(0) without time zone DEFAULT NULL::timestamp without time zone NOT NULL
);


ALTER TABLE public.track OWNER TO postgres;

--
-- TOC entry 164 (class 1259 OID 24702)
-- Name: track_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE track_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.track_id_seq OWNER TO postgres;

--
-- TOC entry 1895 (class 0 OID 0)
-- Dependencies: 164
-- Name: track_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE track_id_seq OWNED BY track.id;


--
-- TOC entry 1866 (class 2604 OID 24689)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY nowplaying ALTER COLUMN id SET DEFAULT nextval('nowplaying_id_seq'::regclass);


--
-- TOC entry 1867 (class 2604 OID 24707)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY track ALTER COLUMN id SET DEFAULT nextval('track_id_seq'::regclass);


--
-- TOC entry 1881 (class 0 OID 24686)
-- Dependencies: 162
-- Data for Name: nowplaying; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY nowplaying (id, source, artist, title, updatetime) FROM stdin;
285	3FM	LAURA JANSEN	GOLDEN	2013-06-29 13:06:07
286	538	Robin Thicke Ft. Ti & Pharrell	Blurred Lines	2013-06-29 13:06:08
\.


--
-- TOC entry 1896 (class 0 OID 0)
-- Dependencies: 161
-- Name: nowplaying_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('nowplaying_id_seq', 286, true);


--
-- TOC entry 1882 (class 0 OID 24696)
-- Dependencies: 163
-- Data for Name: spot; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY spot (id, track_id, source, createdate) FROM stdin;
1	1	3FM	2013-06-18 16:09:08
2	2	538	2013-06-18 16:09:08
4	4	538	2013-06-18 16:11:07
5	5	3FM	2013-06-18 16:18:08
6	6	3FM	2013-06-18 16:20:08
7	7	538	2013-06-18 16:26:08
8	8	3FM	2013-06-18 16:28:08
9	9	538	2013-06-18 16:30:09
10	10	3FM	2013-06-18 16:40:08
11	11	538	2013-06-18 16:43:07
12	12	538	2013-06-18 16:44:08
13	13	3FM	2013-06-18 16:47:08
15	15	3FM	2013-06-18 16:50:07
16	16	3FM	2013-06-18 16:53:08
17	17	538	2013-06-18 16:54:07
18	18	538	2013-06-18 16:57:07
19	19	3FM	2013-06-18 17:16:45
20	20	538	2013-06-18 17:16:45
21	21	3FM	2013-06-18 17:17:07
22	22	538	2013-06-18 17:18:08
23	23	538	2013-06-18 17:20:08
24	24	3FM	2013-06-18 17:23:07
25	25	538	2013-06-18 17:25:08
27	27	538	2013-06-18 17:40:08
28	28	3FM	2013-06-18 17:41:07
29	29	538	2013-06-18 17:44:08
30	30	3FM	2013-06-18 17:45:07
31	31	538	2013-06-18 17:48:08
32	32	3FM	2013-06-18 17:50:07
33	33	538	2013-06-18 17:52:08
34	34	3FM	2013-06-18 17:54:07
35	35	538	2013-06-18 17:59:08
36	36	3FM	2013-06-18 18:06:08
37	37	538	2013-06-18 18:08:08
38	38	3FM	2013-06-18 18:10:07
39	39	538	2013-06-18 18:12:08
40	40	538	2013-06-18 18:16:07
41	41	3FM	2013-06-18 18:17:08
42	42	3FM	2013-06-18 18:20:08
43	43	538	2013-06-18 18:20:08
44	44	3FM	2013-06-18 18:23:08
45	45	538	2013-06-18 18:24:08
46	46	3FM	2013-06-18 18:27:07
47	47	538	2013-06-18 18:30:08
48	48	3FM	2013-06-18 18:33:08
49	49	538	2013-06-18 18:34:07
50	50	3FM	2013-06-18 18:40:07
51	51	538	2013-06-18 18:40:08
52	52	3FM	2013-06-18 18:44:08
53	53	538	2013-06-18 18:44:08
54	54	3FM	2013-06-18 18:49:07
55	55	3FM	2013-06-18 18:54:07
56	56	538	2013-06-18 18:57:08
57	57	538	2013-06-18 18:59:08
58	58	3FM	2013-06-18 19:04:07
59	59	3FM	2013-06-18 19:08:08
60	60	538	2013-06-18 19:11:08
61	61	3FM	2013-06-18 19:13:08
62	62	538	2013-06-18 19:14:08
63	63	538	2013-06-18 19:18:08
64	64	3FM	2013-06-18 19:19:08
65	65	538	2013-06-18 19:22:08
66	66	3FM	2013-06-18 19:24:08
67	67	538	2013-06-18 19:26:07
68	68	3FM	2013-06-18 19:28:08
69	69	3FM	2013-06-18 19:31:08
70	70	538	2013-06-18 19:35:08
71	71	3FM	2013-06-18 19:39:08
72	72	538	2013-06-18 19:42:07
73	73	3FM	2013-06-18 19:43:08
74	74	538	2013-06-18 19:46:07
75	75	3FM	2013-06-18 19:48:08
76	76	3FM	2013-06-18 19:54:07
77	77	538	2013-06-18 19:54:07
78	78	3FM	2013-06-18 19:55:08
79	79	538	2013-06-18 20:05:08
80	80	3FM	2013-06-18 20:06:07
81	81	538	2013-06-18 20:06:07
82	82	3FM	2013-06-18 20:10:07
83	83	538	2013-06-18 20:11:08
84	84	538	2013-06-18 20:14:08
85	85	3FM	2013-06-18 20:15:08
86	86	538	2013-06-18 20:18:08
87	87	3FM	2013-06-18 20:19:08
89	88	3FM	2013-06-18 20:24:07
90	89	538	2013-06-18 20:29:07
91	90	3FM	2013-06-18 20:32:07
92	91	538	2013-06-18 20:32:08
93	92	3FM	2013-06-18 20:36:07
94	93	3FM	2013-06-18 20:37:08
95	94	538	2013-06-18 20:38:08
96	95	538	2013-06-18 20:40:08
97	96	3FM	2013-06-18 20:41:07
98	97	538	2013-06-18 20:44:08
99	98	3FM	2013-06-18 20:46:07
101	99	3FM	2013-06-18 20:49:08
102	100	538	2013-06-18 20:52:08
103	101	3FM	2013-06-18 20:53:07
104	102	538	2013-06-18 20:54:07
105	103	3FM	2013-06-18 20:56:08
106	104	538	2013-06-18 20:58:07
107	105	3FM	2013-06-18 21:05:07
108	106	538	2013-06-18 21:11:08
109	107	538	2013-06-18 21:12:08
110	108	3FM	2013-06-18 21:15:08
111	109	538	2013-06-18 21:16:08
112	110	3FM	2013-06-18 21:19:07
113	111	538	2013-06-18 21:21:08
114	112	538	2013-06-18 21:24:08
115	113	3FM	2013-06-18 21:25:07
116	114	3FM	2013-06-18 21:29:07
117	115	538	2013-06-18 21:30:08
118	116	3FM	2013-06-18 21:34:08
119	117	538	2013-06-18 21:34:08
121	118	538	2013-06-18 21:38:08
122	119	538	2013-06-18 21:40:07
123	120	3FM	2013-06-18 21:42:07
124	121	538	2013-06-18 21:46:08
125	122	3FM	2013-06-18 21:47:07
126	123	3FM	2013-06-18 21:51:09
127	124	3FM	2013-06-18 21:54:08
128	125	538	2013-06-18 21:56:07
129	126	3FM	2013-06-18 21:58:08
130	127	538	2013-06-18 22:02:07
131	128	538	2013-06-18 22:06:08
132	129	3FM	2013-06-18 22:11:08
133	130	3FM	2013-06-18 22:14:08
134	131	538	2013-06-18 22:15:09
135	132	3FM	2013-06-18 22:18:08
136	133	538	2013-06-18 22:18:08
137	134	3FM	2013-06-18 22:24:08
138	135	538	2013-06-18 22:24:08
139	136	3FM	2013-06-18 22:26:08
140	137	538	2013-06-18 22:30:08
141	138	538	2013-06-18 22:37:26
142	139	3FM	2013-06-18 22:42:07
143	140	538	2013-06-18 22:46:11
144	141	3FM	2013-06-18 22:47:08
145	142	538	2013-06-18 22:48:08
146	143	3FM	2013-06-18 22:53:07
148	144	3FM	2013-06-18 22:57:08
149	145	3FM	2013-06-18 23:04:08
150	146	538	2013-06-18 23:04:08
151	147	3FM	2013-06-18 23:07:08
152	148	3FM	2013-06-19 06:44:07
153	149	538	2013-06-19 06:44:07
154	150	3FM	2013-06-19 17:46:48
155	151	538	2013-06-19 17:46:49
156	152	538	2013-06-19 17:48:08
157	153	3FM	2013-06-19 17:49:07
158	154	538	2013-06-19 17:51:08
160	155	538	2013-06-19 17:54:08
162	156	538	2013-06-19 18:04:07
163	157	3FM	2013-06-19 18:06:08
165	158	3FM	2013-06-19 18:09:07
166	159	538	2013-06-19 18:14:07
167	160	3FM	2013-06-19 18:16:07
168	161	3FM	2013-06-19 18:19:07
169	162	3FM	2013-06-19 18:23:08
170	163	538	2013-06-19 18:24:08
171	164	3FM	2013-06-19 18:26:07
172	165	538	2013-06-19 18:30:08
173	166	538	2013-06-19 18:32:07
174	167	3FM	2013-06-19 18:34:08
176	168	538	2013-06-19 18:40:08
177	169	538	2013-06-19 18:42:08
178	170	3FM	2013-06-19 18:43:07
179	171	3FM	2013-06-19 18:48:08
180	172	538	2013-06-19 18:50:08
181	173	538	2013-06-19 18:54:08
182	174	3FM	2013-06-19 18:55:08
183	175	538	2013-06-19 18:56:13
184	176	3FM	2013-06-19 19:05:08
185	177	3FM	2013-06-19 19:08:08
186	178	538	2013-06-19 19:08:08
187	179	3FM	2013-06-19 19:15:08
188	180	538	2013-06-19 19:18:08
189	181	538	2013-06-19 19:20:08
190	182	3FM	2013-06-19 19:22:07
191	183	538	2013-06-19 19:24:08
192	184	3FM	2013-06-19 19:25:07
193	185	3FM	2013-06-19 19:29:07
194	186	3FM	2013-06-19 19:33:07
195	187	538	2013-06-19 19:33:07
196	188	3FM	2013-06-19 19:36:07
197	189	538	2013-06-19 19:37:08
198	190	3FM	2013-06-19 19:40:08
199	191	538	2013-06-19 19:41:09
200	192	3FM	2013-06-19 19:43:09
201	193	538	2013-06-19 19:44:15
203	194	538	2013-06-19 19:53:10
204	195	3FM	2013-06-19 19:55:07
205	196	538	2013-06-19 20:03:08
206	197	3FM	2013-06-19 20:05:07
207	198	538	2013-06-19 20:05:12
208	199	3FM	2013-06-19 20:08:07
209	200	538	2013-06-19 20:12:08
210	201	3FM	2013-06-19 20:13:08
211	202	3FM	2013-06-19 20:16:08
212	203	538	2013-06-19 20:19:08
213	204	3FM	2013-06-19 20:22:08
214	205	538	2013-06-19 20:24:08
215	206	538	2013-06-19 20:26:08
216	207	3FM	2013-06-19 20:30:08
218	208	3FM	2013-06-19 20:34:08
219	209	538	2013-06-19 20:34:08
220	210	3FM	2013-06-19 20:37:07
221	211	538	2013-06-19 20:41:07
223	212	538	2013-06-19 20:46:07
224	213	538	2013-06-19 20:47:08
226	214	3FM	2013-06-19 20:53:08
227	215	538	2013-06-19 20:53:08
228	216	538	2013-06-19 20:57:08
229	217	3FM	2013-06-19 21:05:10
230	218	538	2013-06-19 21:07:08
231	219	538	2013-06-19 21:09:08
232	220	3FM	2013-06-19 21:15:07
233	221	538	2013-06-19 21:15:08
234	222	538	2013-06-19 21:17:08
236	223	538	2013-06-19 21:23:08
238	224	538	2013-06-19 21:25:07
239	225	3FM	2013-06-19 21:27:07
240	226	538	2013-06-19 21:29:08
241	227	3FM	2013-06-19 21:32:08
243	228	538	2013-06-19 21:38:09
244	229	538	2013-06-19 21:39:09
245	230	3FM	2013-06-19 21:44:07
246	231	538	2013-06-19 21:45:08
247	232	3FM	2013-06-19 21:48:08
248	233	3FM	2013-06-19 21:51:07
250	234	538	2013-06-19 21:57:13
251	235	538	2013-06-19 22:01:08
252	236	3FM	2013-06-19 22:06:08
253	237	538	2013-06-19 22:06:09
254	238	538	2013-06-19 22:10:08
255	239	3FM	2013-06-19 22:11:08
256	240	3FM	2013-06-19 22:14:08
257	241	3FM	2013-06-19 22:20:08
258	242	538	2013-06-19 22:22:08
259	243	3FM	2013-06-19 22:23:08
260	244	538	2013-06-19 22:28:07
262	245	538	2013-06-29 12:13:08
265	246	538	2013-06-29 12:22:08
266	247	538	2013-06-29 12:27:23
267	248	3FM	2013-06-29 12:29:08
268	249	3FM	2013-06-29 12:34:08
269	250	538	2013-06-29 12:40:08
270	251	3FM	2013-06-29 12:43:07
271	252	3FM	2013-06-29 12:44:08
272	253	538	2013-06-29 12:44:08
273	254	3FM	2013-06-29 13:02:39
275	255	3FM	2013-06-29 13:06:08
276	256	538	2013-06-29 13:06:08
\.


--
-- TOC entry 1897 (class 0 OID 0)
-- Dependencies: 166
-- Name: spot_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('spot_id_seq', 276, true);


--
-- TOC entry 1884 (class 0 OID 24704)
-- Dependencies: 165
-- Data for Name: track; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY track (id, artist, title, flags, views, score, canonicalname, youtubeid, status, createdate) FROM stdin;
168	R.i.o.	Miss Sunshine	0	0	0	RIOMISSSUNSHINE	C6pzuFiAGjY	10	2013-06-19 18:40:08
175	Miami Sound Mac/gloria Estefan	Dr. Beat	0	0	0	MIAMISOUNDMACGLORIAESTEFANDRBEAT	DatdPt3vXFE	10	2013-06-19 18:56:13
183	James Blunt	You're Beautiful	0	0	0	JAMESBLUNTYOUREBEAUTIFUL	zaEW2v1G4Cc	15	2013-06-19 19:24:08
105	Van She	Jamaica	0	1	0	VANSHEJAMAICA	5OaanwN1vFQ	10	2013-06-18 21:05:07
191	R. Kelly	Gotham City	0	0	0	RKELLYGOTHAMCITY	cdFcHc2yDQ0	15	2013-06-19 19:41:09
199	Beans & Fatback	Beggin	0	0	0	BEANSFEATFATBACKBEGGIN	r7ibdP7TPzI	10	2013-06-19 20:08:07
238	Bette Midler	To Deserve You	0	0	0	BETTEMIDLERTODESERVEYOU	WOadMCtWBpk	14	2013-06-19 22:10:08
106	Duffy	Mercy	0	2	0	DUFFYMERCY	y7ZEVA5dy-Y	15	2013-06-18 21:11:08
214	Kula Shaker	Hush	0	0	0	KULASHAKERHUSH	gsdjZi0CIjU	15	2013-06-19 20:53:08
215	John Legend	P.d.a. (we Just Don't Care)	0	0	0	JOHNLEGENDPDAWEJUSTDONTCARE	ZwbNesQeods	15	2013-06-19 20:53:08
206	Destiny's Child	Jumpin' Jumpin'	0	1	0	DESTINYSCHILDJUMPINJUMPIN	Vjw92oUduEM	15	2013-06-19 20:26:08
42	Offspring	Why Don't You Get A Job	0	1	0	OFFSPRINGWHYDONTYOUGETAJOB	yR6A-Bk9eZQ	15	2013-06-18 18:20:08
121	The Notorious B.i.g.	Hypnotize	0	0	0	NOTORIOUSBIGHYPNOTIZE	wk4ftn4PArg	10	2013-06-18 21:46:08
245	Keane & Afrojack	Sovereign Light Cafe	0	0	0	KEANEFEATAFROJACKSOVEREIGNLIGHTCAFE	bH13eUiDhmo	15	2013-06-29 12:13:08
116	Chvrches	Gun	0	0	0	CHVRCHESGUN	ktoaj1IpTbw	15	2013-06-18 21:34:08
17	Blu Cantrell Feat. Sean Paul	Breathe (rap Version)	0	0	0	BLUCANTRELLFEATSEANPAULBREATHERAPVERSION	h9YL6janzUQ	15	2013-06-18 16:54:07
47	Pink	Try	0	0	0	PINKTRY	yTCDVfMz15M	15	2013-06-18 18:30:08
134	Jagwar Ma	Let Her Go	0	0	0	JAGWARMALETHERGO	K8KCPw9kYpo	15	2013-06-18 22:24:08
92	Jimi Hendrix	Crosstown Traffic	0	0	0	JIMIHENDRIXCROSSTOWNTRAFFIC	oyl6reSJ7XY	10	2013-06-18 20:36:07
96	Depeche Mode	I Just Can't Get Enough (live)	0	0	0	DEPECHEMODEIJUSTCANTGETENOUGHLIVE	Txrjv7Jhjgk	15	2013-06-18 20:41:07
10	Marvin Gaye	Sexual Healing	0	0	0	MARVINGAYESEXUALHEALING	84zjW8a7Q3Y	15	2013-06-18 16:41:40
135	Guus Meeuwis	Geef Mij Je Angst	0	0	0	GUUSMEEUWISGEEFMIJJEANGST	wh-xIvXpBP8	15	2013-06-18 22:24:08
49	Sono	Keep Control (fedde Le Grand Edit)	1	2	0	SONOKEEPCONTROLFEDDELEGRANDEDIT	e54Jrv3nB4A	10	2013-06-18 18:34:07
28	Rhythms Del Mundo Ft Editors	Walk On The Wild Side	0	0	0	RHYTHMSDELMUNDOFEATEDITORSWALKONTHEWILDSIDE	bNmxd-BVhTM	10	2013-06-18 17:41:07
141	Lorde	Royals	0	0	0	LORDEROYALS	LFasFq4GJYM	14	2013-06-18 22:47:08
149	Moby	Porcelain (7" Version)	0	0	0	MOBYPORCELAIN7VERSION	GyCP05ABbJE	10	2013-06-19 06:44:07
127	Rob 'n' Raz	Clubhopping	0	0	0	ROBNRAZCLUBHOPPING	7YuCcIJk4F0	10	2013-06-18 22:02:07
117	Buckshot Lefonque	Another Day	0	0	0	BUCKSHOTLEFONQUEANOTHERDAY	hmmzBF72qSo	10	2013-06-18 21:34:08
148	Phillip Phillips	Home	0	0	0	PHILLIPPHILLIPSHOME	HoRkntoHkIE	15	2013-06-19 06:44:07
156	P!nk	Blow Me (one Last Kiss)	0	0	0	PNKBLOWMEONELASTKISS	3jNlIGDRkvQ	15	2013-06-19 18:04:07
67	Jan Wayne	Because The Night	0	0	0	JANWAYNEBECAUSETHENIGHT	R-XEUfGguNM	10	2013-06-18 19:26:07
68	Yellow Claw Ft. The Opposites	Thunder	0	0	0	YELLOWCLAWFEATTHEOPPOSITESTHUNDER	CnNU-EwYjaQ	15	2013-06-18 19:28:08
91	Veracocha	Carte Blanche	0	0	0	VERACOCHACARTEBLANCHE	dlSJAVNrA1U	15	2013-06-18 20:32:08
89	Beyonce	Best Thing I Never Had	0	0	0	BEYONCEBESTTHINGINEVERHAD	FHp2KgyQUFk	15	2013-06-18 20:29:07
6	Shaggy	Boombastic	1	0	0	SHAGGYBOOMBASTIC	6W5pq4bIzIw	15	2013-06-18 16:41:40
55	Michael Jackson	Beat It	0	0	0	MICHAELJACKSONBEATIT	oRdxUFDoQe0	15	2013-06-18 18:54:07
30	Skik	Op Fietse	0	0	0	SKIKOPFIETSE	d1bYRaihts0	10	2013-06-18 17:45:07
74	2 Brothers On The 4th Floor	The Sun Will Be Shining	0	1	0	2BROTHERSONTHE4THFLOORTHESUNWILLBESHINING	5ZHl2b8LVeE	10	2013-06-18 19:46:07
223	Akon Feat. Karidinal Offishall	Beautiful	0	0	0	AKONFEATKARIDINALOFFISHALLBEAUTIFUL	Ro7yHf_pU14	15	2013-06-19 21:23:08
230	Sigur Ros	Isjaki	0	0	0	SIGURROSISJAKI	dF6E47Pn6mY	14	2013-06-19 21:44:07
162	Lenka	Everything At Once	1	1	0	LENKAEVERYTHINGATONCE	4A3poKE6qnM	15	2013-06-19 18:23:08
50	Sergio Mendes & Black Eyed Peas	Mas Que Nada	0	1	0	SERGIOMENDESFEATBLACKEYEDPEASMASQUENADA	Tfa6fRjPlUE	10	2013-06-18 18:40:07
252	Will I Am Ft. Britney Spears	Scream And Shout	0	0	0	WILLIAMFEATBRITNEYSPEARSSCREAMANDSHOUT	kYtGl1dX5qI	15	2013-06-29 12:44:08
253	Shary-an	Easy Go	0	0	0	SHARYANEASYGO	EmG3hgRprXo	10	2013-06-29 12:44:08
169	The White Stripes	7 Nation Army	0	0	0	WHITESTRIPES7NATIONARMY	KMTUbNG7C7I	15	2013-06-19 18:42:08
176	The Killers	Runaways	0	0	0	KILLERSRUNAWAYS	TMbyWSGYUgc	15	2013-06-19 19:05:08
151	Dj Jose	Turn The Lights Off	0	1	0	DJJOSETURNTHELIGHTSOFF	o_oyhlIyIVc	10	2013-06-19 17:46:49
184	When We Are Wild	Scuse Me	0	0	0	WHENWEAREWILDSCUSEME	P3cvM5SnhfU	14	2013-06-19 19:25:07
34	Muse	Feeling Good	0	1	0	MUSEFEELINGGOOD	CmwRQqJsegw	14	2013-06-18 17:54:07
200	Usher	Dj Got Us Fallin' In Love	0	0	0	USHERDJGOTUSFALLININLOVE	C-dvTjK_07c	15	2013-06-19 20:12:08
86	Simple Plan	Your Love Is A Lie	0	1	0	SIMPLEPLANYOURLOVEISALIE	5P2LDM0s6Es	15	2013-06-18 20:18:08
43	Faithless	We Come 1	0	1	0	FAITHLESSWECOME1	65EfTFUFDwI	15	2013-06-18 18:20:08
36	Wax	Rosana	0	0	0	WAXROSANA	v0aRb4rAq0I	14	2013-06-18 18:06:08
110	Duke Dumont	Need U (100%) Feat. Ame	0	0	0	DUKEDUMONTNEEDU100FEATAME	FnJIb4A-DuY	10	2013-06-18 21:19:07
254	Verkeersinformatie	Anwb	0	0	0	VERKEERSINFORMATIEANWB	\N	0	2013-06-29 13:02:39
118	Dj Tiesto	Love Comes Again	0	0	0	DJTIESTOLOVECOMESAGAIN	yYwLLyy-hZQ	10	2013-06-18 21:38:08
122	Partysquad Feat. Jayh, Sjaak, R	Helemaal Naar De Klote	0	0	0	PARTYSQUADFEATJAYHSJAAKRHELEMAALNAARDEKLOTE	qvoCB-dNWJ8	15	2013-06-18 21:47:07
128	Red Hot Chili Peppers	Scar Tissue	0	0	0	REDHOTCHILIPEPPERSSCARTISSUE	mzJj5-lubeM	10	2013-06-18 22:06:08
136	Major Lazer	Bubble Butt	0	0	0	MAJORLAZERBUBBLEBUTT	MobfYnRRpys	14	2013-06-18 22:26:08
192	Babysitters Circus	Everything's Gonna Be Alright	0	1	0	BABYSITTERSCIRCUSEVERYTHINGSGONNABEALRIGHT	5o78kNeFBZs	14	2013-06-19 19:43:09
150	Cee Lo Green	Fuck You	0	0	0	CEELOGREENFUCKYOU	17eSUnQ-_ek	10	2013-06-19 17:46:48
157	Imagine Dragons	Radioactive	0	0	0	IMAGINEDRAGONSRADIOACTIVE	ktvTqknDobU	15	2013-06-19 18:06:08
163	Roxette	How Do You Do !	0	0	0	ROXETTEHOWDOYOUDO	MSlncHYgIeo	15	2013-06-19 18:24:08
19	Klangkarussell	Sonnentanz	0	0	0	KLANGKARUSSELLSONNENTANZ	JMPYmNINxrE	10	2013-06-18 17:16:45
38	Smallpools	Dreaming	0	0	0	SMALLPOOLSDREAMING	zJtKCzfyZP0	14	2013-06-18 18:10:07
76	Marteria Ft. Yasha & Miss Platn	Lila Wolken	0	0	0	MARTERIAFEATYASHAFEATMISSPLATNLILAWOLKEN	MBOkZcqhRPQ	15	2013-06-18 19:54:07
77	The Game Ft. 50 Cent	Hate It Or Love It	0	0	0	GAMEFEAT50CENTHATEITORLOVEIT	BuMBmK5uksg	15	2013-06-18 19:54:07
90	Eefje De Visser	Hartslag	0	0	0	EEFJEDEVISSERHARTSLAG	QqUjhn5PZ18	10	2013-06-18 20:32:07
79	Freestylers	Push Up	0	0	0	FREESTYLERSPUSHUP	uikiBuLfUDg	10	2013-06-18 20:05:08
81	Keane	Bend And Break	0	0	0	KEANEBENDANDBREAK	KcwmQUi6Nn4	14	2013-06-18 20:06:07
82	Drums	Let's Go Surfing	0	0	0	DRUMSLETSGOSURFING	VkQrJ3SVXko	15	2013-06-18 20:10:07
15	John Mayer	Who Says	0	0	0	JOHNMAYERWHOSAYS	akvu1AOnUIw	15	2013-06-18 16:50:07
13	Temper Trap	Sweet Disposition	0	0	0	TEMPERTRAPSWEETDISPOSITION	4C8e7nNLZNs	15	2013-06-18 16:47:08
57	Titiyo	Come Along	0	0	0	TITIYOCOMEALONG	yLsVGwNWOA4	10	2013-06-18 18:59:08
95	Mary J. Blige & U2	One	0	0	0	MARYJBLIGEFEATU2ONE	ZpDQJnI4OhU	15	2013-06-18 20:40:08
9	Alicia Keys	Girl On Fire	0	0	0	ALICIAKEYSGIRLONFIRE	J91ti_MpdHA	15	2013-06-18 16:41:40
51	Lily Allen	Not Fair	0	0	0	LILYALLENNOTFAIR	ydMAJUpE1JE	15	2013-06-18 18:40:08
56	Far East Movement	Turn Up The Love	0	0	0	FAREASTMOVEMENTTURNUPTHELOVE	UqXVgAmqBOs	15	2013-06-18 18:57:08
88	Sohn	Bloodflows	0	0	0	SOHNBLOODFLOWS	C6zv_5zGEso	14	2013-06-18 20:24:07
12	The Spin Doctors	Two Princes	0	0	0	SPINDOCTORSTWOPRINCES	wsdy_rct6uo	15	2013-06-18 16:44:08
73	Groove Armada	Superstylin'	0	0	0	GROOVEARMADASUPERSTYLIN	_kE0pxRkMtQ	15	2013-06-18 19:43:08
8	Kings Of Leon	Back Down South	0	0	0	KINGSOFLEONBACKDOWNSOUTH	DBOuqyqmtJk	15	2013-06-18 16:41:40
40	Estelle Feat. Kanye West	American Boy	0	0	0	ESTELLEFEATKANYEWESTAMERICANBOY	Ic5vxw3eijY	10	2013-06-18 18:16:07
41	Pitbull	I Know You Want Me (calle Ocho)	0	0	0	PITBULLIKNOWYOUWANTMECALLEOCHO	qAi4cvQdE9o	10	2013-06-18 18:17:08
98	Broken Bells	High Road	0	0	0	BROKENBELLSHIGHROAD	gWBG1j_flrg	15	2013-06-18 20:46:07
44	Peter Fox	Haus Am See	0	0	0	PETERFOXHAUSAMSEE	gMqIuAJ92tM	14	2013-06-18 18:23:08
46	Major Lazer	Watch Out For This (bumaye)	0	0	0	MAJORLAZERWATCHOUTFORTHISBUMAYE	n4ZIPIwGkGk	14	2013-06-18 18:27:07
207	Boaz Van De Beatz	99 Lights	0	0	0	BOAZVANDEBEATZ99LIGHTS	AbV-Q6tz4B8	10	2013-06-19 20:30:08
216	Modjo	Lady (hear Me Tonight)	0	0	0	MODJOLADYHEARMETONIGHT	HzpCcNdhy5w	10	2013-06-19 20:57:08
224	Tina Cousins	Killin' Time	0	0	0	TINACOUSINSKILLINTIME	tOYmjULduJY	14	2013-06-19 21:25:07
231	Shola Ama	You Might Need Somebody	0	0	0	SHOLAAMAYOUMIGHTNEEDSOMEBODY	4swgfp17kkk	10	2013-06-19 21:45:08
239	M83	Midnight City	0	0	0	M83MIDNIGHTCITY	dX3k_QDnzHE	14	2013-06-19 22:11:08
84	Supafly Vs. Fishbowl	Let's Get Down	0	1	0	SUPAFLYVSFISHBOWLLETSGETDOWN	J9t8cUYhRww	10	2013-06-18 20:14:08
80	Jack Penate	Be The One	0	1	0	JACKPENATEBETHEONE	vKRchFtlkEI	10	2013-06-18 20:06:07
99	Energy 52	Cafe Del Mar	0	1	0	ENERGY52CAFEDELMAR	RVoYWHlxEzE	10	2013-06-18 20:49:08
83	Madonna & Justin Timberlake	4 Minutes	0	3	0	MADONNAFEATJUSTINTIMBERLAKE4MINUTES	bHHUhcV2eVY	10	2013-06-18 20:11:08
142	Ashanti	Happy	0	1	0	ASHANTIHAPPY	MrCsubL_OSQ	15	2013-06-18 22:48:08
246	John Newman	Love Me Again	1	1	0	JOHNNEWMANLOVEMEAGAIN	CfihYWRWRTQ	15	2013-06-29 12:22:08
209	Summerlove	Remember (na Na Na Hey He)	0	0	0	SUMMERLOVEREMEMBERNANANAHEYHE	jEMa2DIvxQA	10	2013-06-19 20:34:08
27	Ben Howard	Keep Your Head Up	0	1	0	BENHOWARDKEEPYOURHEADUP	ADP65wbBUpc	15	2013-06-18 17:40:08
177	Daft Punk Vs Rihanna	Lucky Diamonds	0	0	0	DAFTPUNKVSRIHANNALUCKYDIAMONDS	3r3BOZ6QQtU	10	2013-06-19 19:08:08
104	Coldplay	Lovers In Japan	0	1	0	COLDPLAYLOVERSINJAPAN	TYyN935tN7A	14	2013-06-18 20:58:07
185	Bruno Mars	Treasure	0	0	0	BRUNOMARSTREASURE	nPvuNsRccVw	10	2013-06-19 19:29:07
193	Yellow Claw Ft. Sjaak & Mr. Pol	Krokobil (edit)	0	0	0	YELLOWCLAWFEATSJAAKFEATMRPOLKROKOBILEDIT	vqlhaZZC2XA	10	2013-06-19 19:44:15
107	The Script & Will.i.am	Hall Of Fame	0	1	0	SCRIPTFEATWILLIAMHALLOFFAME	mk48xRzuNvA	15	2013-06-18 21:12:08
137	Dj Jazzy Jeff & Fresh Prince	Boom! Shake The Room	0	1	0	DJJAZZYJEFFFEATFRESHPRINCEBOOMSHAKETHEROOM	4AVWZwZq_QU	15	2013-06-18 22:30:08
70	Gnarls Barkley	Crazy	0	2	0	GNARLSBARKLEYCRAZY	bd2B6SjMh_w	10	2013-06-18 19:35:07
100	Backstreet Boys	I Want It That Way	0	0	0	BACKSTREETBOYSIWANTITTHATWAY	4fndeDfaWCg	15	2013-06-18 20:52:08
170	Train	Mermaid	0	1	0	TRAINMERMAID	nilUlU6fM0s	15	2013-06-19 18:43:07
7	The Beach Boys	Kokomo	0	0	0	BEACHBOYSKOKOMO	9ChADh1zt5I	10	2013-06-18 16:41:40
93	Disclosure Ft. Eliza Doolittle	You & Me	0	0	0	DISCLOSUREFEATELIZADOOLITTLEYOUME	W_vM8ePGuRM	10	2013-06-18 20:37:08
97	Nerd	Lapdance	0	0	0	NERDLAPDANCE	I_uDcCZDrxg	15	2013-06-18 20:44:08
108	The Real Youth	We Are	0	0	0	REALYOUTHWEARE	Kp-ozDY-bU8	14	2013-06-18 21:15:08
123	The 1975	Chocolate	0	0	0	1975CHOCOLATE	FfBKqaVk2Co	14	2013-06-18 21:51:09
111	Pussycat Dolls Ft. Snoop Dogg	Buttons	0	0	0	PUSSYCATDOLLSFEATSNOOPDOGGBUTTONS	VCLxJd1d84s	15	2013-06-18 21:21:08
129	Lou Bega	Mambo No.5	0	0	0	LOUBEGAMAMBONO5	EK_LN3XEcnw	15	2013-06-18 22:11:08
23	Da Brat Feat. Tyrese	What'chu Like	0	1	0	DABRATFEATTYRESEWHATCHULIKE	pKrVAznccZ0	15	2013-06-18 17:20:08
5	Vampire Weekend	Holiday	0	0	0	VAMPIREWEEKENDHOLIDAY	dqGXMcNVl7E	15	2013-06-18 16:41:40
119	Blof	Mens	0	0	0	BLOFMENS	WpyUiIE_Gzs	15	2013-06-18 21:40:07
152	Amy Macdonald	This Is The Life	0	0	0	AMYMACDONALDTHISISTHELIFE	iRYvuS9OxdA	15	2013-06-19 17:48:08
158	Maroon 5 Ft. Christina Aguilera	Moves Like Jagger	0	0	0	MAROON5FEATCHRISTINAAGUILERAMOVESLIKEJAGGER	iEPTlhBmwRg	15	2013-06-19 18:09:07
164	Queens Of The Stone Age	I Sat By The Ocean	0	0	0	QUEENSOFTHESTONEAGEISATBYTHEOCEAN	rpj1OXT6o2E	15	2013-06-19 18:26:07
24	Acda & De Munnik	Het Regent Zonnestralen	0	0	0	ACDAFEATDEMUNNIKHETREGENTZONNESTRALEN	dZkbhA1NcTM	15	2013-06-18 17:23:07
29	Ricky L	Born Again	0	0	0	RICKYLBORNAGAIN	lq54j47PVY0	10	2013-06-18 17:44:08
48	R.e.m.	One I Love	0	0	0	REMONEILOVE	j7oQEPfe-O8	15	2013-06-18 18:33:08
33	Avicii	*as: Wake Me Up	0	0	0	AVICIIASWAKEMEUP	AT29gXp6mss	15	2013-06-18 17:52:08
75	Radical Face	Welcome Home	0	0	0	RADICALFACEWELCOMEHOME	P8a4iiOnzsc	10	2013-06-18 19:48:08
4	John Mayer	Heartbreak Warfare	0	0	0	JOHNMAYERHEARTBREAKWARFARE	GeCClzNCfcA	15	2013-06-18 16:41:40
94	Train	Drive By	0	0	0	TRAINDRIVEBY	oxqnFJ3lp5k	15	2013-06-18 20:38:08
2	Justin Timberlake	Sexy Back	0	0	0	JUSTINTIMBERLAKESEXYBACK	-oqXwnXjgDE	15	2013-06-18 16:41:40
87	Will Smith	Gettin' Jiggy With It	0	0	0	WILLSMITHGETTINJIGGYWITHIT	3JcmQONgXJM	15	2013-06-18 20:19:08
11	Armin Van Buuren	Serenity (sensation White 2005)	0	0	0	ARMINVANBUURENSERENITYSENSATIONWHITE2005	YoLJ4CWSLSI	14	2013-06-18 16:43:07
69	Bob Marley	No Woman No Cry	0	0	0	BOBMARLEYNOWOMANNOCRY	n4kpqDF9j6Q	14	2013-06-18 19:31:08
71	Las Ketchup	Ketchup Song	0	0	0	LASKETCHUPKETCHUPSONG	V0PisGe66mY	10	2013-06-18 19:39:08
102	Kate Ryan	Ella Elle L'a	0	0	0	KATERYANELLAELLELA	CoPyXKqsDJo	15	2013-06-18 20:54:07
52	Weezer	Island In The Sun	0	0	0	WEEZERISLANDINTHESUN	0C3zgYW_FAM	15	2013-06-18 18:44:08
39	Daniel Powter	Bad Day	0	0	0	DANIELPOWTERBADDAY	gH476CxJxfg	10	2013-06-18 18:12:08
201	White Lies	There Goes Our Love Again	0	0	0	WHITELIESTHEREGOESOURLOVEAGAIN	7d_HD89ZlJE	15	2013-06-19 20:13:08
143	Bakermat	Vandaag (radio Edit)	0	1	0	BAKERMATVANDAAG	ESxU4uYrewU	14	2013-06-18 22:53:07
217	Foo Fighters	Rope	0	0	0	FOOFIGHTERSROPE	kbpqZT_56Ns	15	2013-06-19 21:05:10
85	M.i.a.	Bring The Noize	0	1	0	MIABRINGTHENOIZE	2uYs0gJD-LE	10	2013-06-18 20:15:08
225	Alt-j	Dissolve Me	0	0	0	ALTJDISSOLVEME	Ab0Cw38AbWo	10	2013-06-19 21:27:07
232	Mumford & Sons	Babel	0	0	0	MUMFORDFEATSONSBABEL	doO_nIEKEfE	15	2013-06-19 21:48:08
240	Otis Redding	Sitting On The Dock Of The Bay	0	0	0	OTISREDDINGSITTINGONTHEDOCKOFTHEBAY	UCmUhYSr-e4	10	2013-06-19 22:14:08
208	Mister And Mississippi	Northern Sky #serioustalent	1	1	0	MISTERANDMISSISSIPPINORTHERNSKYSERIOUSTALENT	\N	0	2013-06-19 20:34:08
178	Mark Van Dale/enrico	Water Verve (remix)	2	1	0	MARKVANDALEENRICOWATERVERVEREMIX	jPk0U50EgqE	10	2013-06-19 19:08:08
247	Michael Buble	It's A Beautiful Day	0	0	0	MICHAELBUBLEITSABEAUTIFULDAY	5QYxuGQMCuU	10	2013-06-29 12:27:23
53	John Legend	Ordinary People	0	1	0	JOHNLEGENDORDINARYPEOPLE	PIh07c_P4hc	15	2013-06-18 18:44:08
63	The Veronicas	Untouched	0	1	0	VERONICASUNTOUCHED	ykW4rtW2eu0	14	2013-06-18 19:18:08
255	Laura Jansen	Golden	0	0	0	LAURAJANSENGOLDEN	\N	0	2013-06-29 13:06:08
256	Robin Thicke Ft. Ti & Pharrell	Blurred Lines	0	0	0	ROBINTHICKEFEATTIFEATPHARRELLBLURREDLINES	\N	0	2013-06-29 13:06:08
165	Armin Van Buuren	This Is What It Feels Like	0	0	0	ARMINVANBUURENTHISISWHATITFEELSLIKE	Uibm_RQfZ-M	14	2013-06-19 18:30:08
171	Franz Ferdinand	This Fire	0	0	0	FRANZFERDINANDTHISFIRE	IJr5l7j8VeU	10	2013-06-19 18:48:07
179	Fata	Geile Donder	0	0	0	FATAGEILEDONDER	WizvoH-gEGI	14	2013-06-19 19:15:08
186	Red Hot Chili Peppers	Dani California	0	0	0	REDHOTCHILIPEPPERSDANICALIFORNIA	Sb5aq5HcS1A	10	2013-06-19 19:33:07
187	Britney Spears	Oops!...i Did It Again	0	0	0	BRITNEYSPEARSOOPSIDIDITAGAIN	CduA0TULnow	15	2013-06-19 19:33:07
124	Grandmaster Flash	The Message	0	1	0	GRANDMASTERFLASHTHEMESSAGE	O4o8TeqKhgY	10	2013-06-18 21:54:08
101	Mumford & Sons	Reminder	0	0	0	MUMFORDFEATSONSREMINDER	FHnGJvYmQKg	10	2013-06-18 20:53:07
112	R.e.m.	Losing My Religion	0	0	0	REMLOSINGMYRELIGION	2KXmY3gGgNA	15	2013-06-18 21:24:08
120	Allah-las	Tell Me	0	0	0	ALLAHLASTELLME	fiJYecS0vU0	10	2013-06-18 21:42:07
109	The Prodigy	Firestarter	0	0	0	PRODIGYFIRESTARTER	wmin5WkOuPw	14	2013-06-18 21:16:08
130	Kavinsky Feat. Lovefoxx	Nightcall	0	0	0	KAVINSKYFEATLOVEFOXXNIGHTCALL	MV_3Dpw-BRY	10	2013-06-18 22:14:08
144	Blawan	Why They Hide Their Bodies Under Their Garage	0	0	0	BLAWANWHYTHEYHIDETHEIRBODIESUNDERTHEIRGARAGE	KL_Bbyi3ub8	10	2013-06-18 22:57:08
153	Kids In Glass Houses	Drive	0	0	0	KIDSINGLASSHOUSESDRIVE	SEUmYtJ-J78	15	2013-06-19 17:49:07
159	Dj Paul Elstak	Rainbow In The Sky	0	0	0	DJPAULELSTAKRAINBOWINTHESKY	8xvkYaldSd0	10	2013-06-19 18:14:07
113	Black Crowes	Hotel Illness	0	0	0	BLACKCROWESHOTELILLNESS	Y_mAA_QJ7-s	10	2013-06-18 21:25:07
1	Chris Malinchak	So Good To Me	0	0	0	CHRISMALINCHAKSOGOODTOME	oVcG9lpZV24	10	2013-06-18 16:41:40
16	Kanye West	Black Skinhead	0	0	0	KANYEWESTBLACKSKINHEAD	xuhl6Ji5zHM	15	2013-06-18 16:53:08
78	Macy Gray	Sweet Baby	0	0	0	MACYGRAYSWEETBABY	yJdh3oNa0bc	10	2013-06-18 19:55:08
138	Robbie Williams	Come Undone	0	1	0	ROBBIEWILLIAMSCOMEUNDONE	4D35vfQ7eZg	15	2013-06-18 22:37:26
202	Nirvana	Come As You Are	0	0	0	NIRVANACOMEASYOUARE	vabnZ9-ex7o	15	2013-06-19 20:16:08
210	Kooks	Naive	0	0	0	KOOKSNAIVE	jkaMiaRLgvY	10	2013-06-19 20:37:07
218	Toni Braxton	He Wasn't Man Enough	0	0	0	TONIBRAXTONHEWASNTMANENOUGH	9_hKXk2qSuw	15	2013-06-19 21:07:08
226	Will Smith	Men In Black	0	0	0	WILLSMITHMENINBLACK	1RVRCd6J2NA	15	2013-06-19 21:29:08
233	T Rex	Get It On	0	0	0	TREXGETITON	19IqwU3itFk	10	2013-06-19 21:51:07
248	Bruno Mars	Locked Out Of Heaven	0	0	0	BRUNOMARSLOCKEDOUTOFHEAVEN	U_qVXj7ugDU	14	2013-06-29 12:29:08
194	Anastacia	I'm Outta Love	0	1	0	ANASTACIAIMOUTTALOVE	TnOy6HEf7HU	15	2013-06-19 19:53:10
241	Kodaline	Brand New Day	0	1	0	KODALINEBRANDNEWDAY	mtf7hC17IBM	15	2013-06-19 22:20:08
172	Pitbull	Hotel Room Service	0	0	0	PITBULLHOTELROOMSERVICE	2up_Eq6r6Ko	15	2013-06-19 18:50:08
180	Ne-yo	Closer	0	0	0	NEYOCLOSER	z_aC5xPQ2f4	15	2013-06-19 19:18:07
195	Crystal Fighters	You & I	0	0	0	CRYSTALFIGHTERSYOUI	efUEeZdmgZo	15	2013-06-19 19:55:07
203	Krezip	I Would Stay	0	0	0	KREZIPIWOULDSTAY	kfrGFGHU6YA	15	2013-06-19 20:19:08
211	Jordin Sparks	Battlefield	0	0	0	JORDINSPARKSBATTLEFIELD	suPlYwJ3YvM	15	2013-06-19 20:41:07
219	Dr. Dre	Keep Their Heads Ringin'	0	0	0	DRDREKEEPTHEIRHEADSRINGIN	ISbnf9qCmhI	10	2013-06-19 21:09:08
227	Jeugd Van Tegenwoordig	De Formule	0	0	0	JEUGDVANTEGENWOORDIGDEFORMULE	c-W9GCtI2nM	15	2013-06-19 21:32:08
234	Puff Daddy	Come With Me	0	0	0	PUFFDADDYCOMEWITHME	rnxBSOFl_3o	10	2013-06-19 21:57:13
242	Melissa Etheridge	Like The Way I Do	0	0	0	MELISSAETHERIDGELIKETHEWAYIDO	ZAHVKCBMnmM	14	2013-06-19 22:22:08
249	Coldplay	Viva La Vida	0	0	0	COLDPLAYVIVALAVIDA	9ldOuVuas1c	15	2013-06-29 12:34:08
18	Infernal	From Paris To Berlin	1	1	0	INFERNALFROMPARISTOBERLIN	THt5u-i2d9k	14	2013-06-18 16:57:07
188	Tessa Rose Jackson	Lost And Found (edit)	1	1	0	TESSAROSEJACKSONLOSTANDFOUNDEDIT	hVhbiW8JJCo	10	2013-06-19 19:36:07
166	Lauryn Hill & Bob Marley	Turn Your Lights Down Low	0	0	0	LAURYNHILLFEATBOBMARLEYTURNYOURLIGHTSDOWNLOW	JREcKmXDeAs	10	2013-06-19 18:32:07
125	The Corrs	Breathless	0	1	0	CORRSBREATHLESS	LNCofNac-98	14	2013-06-18 21:56:07
181	Darude	Sandstorm	0	0	0	DARUDESANDSTORM	PSYxT9GM0fQ	10	2013-06-19 19:20:08
22	Pakito	Living On Video	0	1	0	PAKITOLIVINGONVIDEO	D5di6Nz8EZk	14	2013-06-18 17:18:08
189	Tacabro	Tacata	0	1	0	TACABROTACATA	IAsjjSkaWVc	10	2013-06-19 19:37:08
196	Snoop Dogg & Wiz Khalifa	Young Wild & Free	0	0	0	SNOOPDOGGFEATWIZKHALIFAYOUNGWILDFREE	IjWUXh5nF0E	15	2013-06-19 20:03:08
212	Alain Clark	Blow Me Away	0	0	0	ALAINCLARKBLOWMEAWAY	9nMc0wqgr2E	10	2013-06-19 20:46:07
220	Phoenix	Trying To Be Cool	0	0	0	PHOENIXTRYINGTOBECOOL	Koyh3F6kicY	15	2013-06-19 21:15:07
221	Eric Prydz	Pjanoo	0	0	0	ERICPRYDZPJANOO	Rl9j6ZzUn0o	10	2013-06-19 21:15:08
228	The Cardigans	Lovefool	0	0	0	CARDIGANSLOVEFOOL	zpLCrEor_xY	14	2013-06-19 21:38:09
235	Junior Jack	Stupidisco	0	0	0	JUNIORJACKSTUPIDISCO	B0QvR1eP2yg	10	2013-06-19 22:01:08
66	Kensington	We Are The Young	0	0	0	KENSINGTONWEARETHEYOUNG	ekiooMTCKtY	14	2013-06-18 19:24:08
58	Douwe Bob	You Don't Have To Stay	0	0	0	DOUWEBOBYOUDONTHAVETOSTAY	LFplEwF1v_U	10	2013-06-18 19:04:07
35	King Africa	La Bomba	0	0	0	KINGAFRICALABOMBA	LerPYUP9P9g	14	2013-06-18 17:59:08
32	Armin Van Buuren & Trevor Guthr	This Is What It Feels Like	0	0	0	ARMINVANBUURENFEATTREVORGUTHRTHISISWHATITFEELSLIKE	BR_DFMUzX4E	10	2013-06-18 17:50:07
37	Sylver	Turn The Tide	0	0	0	SYLVERTURNTHETIDE	thZE5UoLahw	15	2013-06-18 18:08:08
25	James Morrison	Nothing Ever Hurt Like You	0	0	0	JAMESMORRISONNOTHINGEVERHURTLIKEYOU	72UwI3xOQHs	15	2013-06-18 17:25:08
45	Marco Borsato	Je Hoeft Niet Naar Huis Vannacht	0	0	0	MARCOBORSATOJEHOEFTNIETNAARHUISVANNACHT	La7SJojN8xc	15	2013-06-18 18:24:08
20	Kylie Minogue	Love At First Sight	0	0	0	KYLIEMINOGUELOVEATFIRSTSIGHT	EhDrJz4rBH0	10	2013-06-18 17:16:45
114	Great Minds	Doag	0	0	0	GREATMINDSDOAG	JcObkjl1x_o	10	2013-06-18 21:29:07
103	Empire Of The Sun	Walking On A Dream	0	0	0	EMPIREOFTHESUNWALKINGONADREAM	hN5X4kGhAtU	15	2013-06-18 20:56:08
131	Jennifer Lopez Feat. Pitbull	Dance Again	0	0	0	JENNIFERLOPEZFEATPITBULLDANCEAGAIN	bjgFH01k0gU	15	2013-06-18 22:15:09
139	Bruce Springsteen	The River	0	0	0	BRUCESPRINGSTEENTHERIVER	utVR3EgQkHs	15	2013-06-18 22:42:07
145	Fratellis	Chelsea Dagger	0	0	0	FRATELLISCHELSEADAGGER	sEXHeTcxQy4	15	2013-06-18 23:04:08
146	Funky Green Dogs	Fired Up !	0	0	0	FUNKYGREENDOGSFIREDUP	LzB-KAsOSrE	15	2013-06-18 23:04:08
154	Wayne Wonder	No Letting Go	0	0	0	WAYNEWONDERNOLETTINGGO	yFnwBtLrIYI	10	2013-06-19 17:51:08
160	Arctic Monkeys	Do I Wanna Know	0	0	0	ARCTICMONKEYSDOIWANNAKNOW	bpOSxM0rNPM	14	2013-06-19 18:16:07
243	Volbeat	Lola Montez	0	0	0	VOLBEATLOLAMONTEZ	jGlXyuHCeZE	14	2013-06-19 22:23:08
173	Michel Cleis	*ds: Lady Luck	0	0	0	MICHELCLEISDSLADYLUCK	9sqAuHHoZnI	10	2013-06-19 18:54:08
60	Nielson	Beauty & De Brains	0	1	0	NIELSONBEAUTYDEBRAINS	BSD_fTV2TXA	14	2013-06-18 19:11:08
21	Gorillaz	Feel Good Inc.	0	1	0	GORILLAZFEELGOODINC	MRyPSOyC7_c	15	2013-06-18 17:17:07
204	Bastille	Pompeii	0	1	0	BASTILLEPOMPEII	F90Cw4l-8NY	15	2013-06-19 20:22:08
250	Conor Maynard Ft. Ne-yo	Turn Around	0	0	0	CONORMAYNARDFEATNEYOTURNAROUND	OwP6U0LRzQM	15	2013-06-29 12:40:08
167	Keane	Somewhere Only We Know	0	0	0	KEANESOMEWHEREONLYWEKNOW	Oextk-If8HQ	15	2013-06-19 18:34:08
190	Rudimental Ft. Ella Eyre	Waiting All Night	0	0	0	RUDIMENTALFEATELLAEYREWAITINGALLNIGHT	M97vR2V4vTs	10	2013-06-19 19:40:08
197	Santigold	Disparate Youth	0	0	0	SANTIGOLDDISPARATEYOUTH	mIMMZQJ1H6E	10	2013-06-19 20:05:07
198	Katy Perry	I Kissed A Girl	0	1	0	KATYPERRYIKISSEDAGIRL	QmC5n5BgI28	15	2013-06-19 20:05:12
205	Paul Johnson	Get Get Down	0	0	0	PAULJOHNSONGETGETDOWN	I01ziKkA4Nw	10	2013-06-19 20:24:08
213	Rihanna	Where Have You Been	0	0	0	RIHANNAWHEREHAVEYOUBEEN	HBxt_v0WF6Y	15	2013-06-19 20:47:08
222	Lily Allen	Fuck You	0	0	0	LILYALLENFUCKYOU	o8VZX4sHn-4	10	2013-06-19 21:17:08
229	David Guetta Vs. The Egg	Love Don't Let Me Go (walking Away)	0	0	0	DAVIDGUETTAVSTHEEGGLOVEDONTLETMEGOWALKINGAWAY	Afrk0uBrYPY	15	2013-06-19 21:39:09
31	Lady Gaga	Paparazzi	0	0	0	LADYGAGAPAPARAZZI	d2smz_1L2_0	15	2013-06-18 17:48:08
61	Guns 'n Roses	Paradise City	0	0	0	GUNSNROSESPARADISECITY	Rbm6GXllBiw	15	2013-06-18 19:13:08
126	Flume	Holdin On	0	0	0	FLUMEHOLDINON	X_H3cIsenBQ	14	2013-06-18 21:58:08
65	Ne-yo	Because Of You	0	0	0	NEYOBECAUSEOFYOU	atz_aZA3rf0	15	2013-06-18 19:22:08
54	Jason Mraz	I'm Yours	0	0	0	JASONMRAZIMYOURS	EkHTsc9PU2A	14	2013-06-18 18:49:07
62	Robert Miles	Children	0	0	0	ROBERTMILESCHILDREN	CC5ca6Hsb2Q	10	2013-06-18 19:14:08
64	King Africa	Bomba	0	0	0	KINGAFRICABOMBA	jY48iTyLrmk	10	2013-06-18 19:19:08
72	Gavin Degraw	Not Over You	0	0	0	GAVINDEGRAWNOTOVERYOU	vDWhfsQHq1o	15	2013-06-18 19:42:07
115	Soulsearcher	Can't Get Enough	0	0	0	SOULSEARCHERCANTGETENOUGH	zhDIBY3hKmk	10	2013-06-18 21:30:08
132	Queens Of The Stone Age	Feel Good Hit Of The Summer	0	0	0	QUEENSOFTHESTONEAGEFEELGOODHITOFTHESUMMER	bAXPUN2z2CE	15	2013-06-18 22:18:08
133	Roxette	Fading Like A Flower	0	0	0	ROXETTEFADINGLIKEAFLOWER	8fGLiIvKKys	15	2013-06-18 22:18:08
147	Mister And Mississippi	Same Room, Different House	0	0	0	MISTERANDMISSISSIPPISAMEROOMDIFFERENTHOUSE	79IWXRA6ln4	10	2013-06-18 23:07:08
155	Elena	Disco Romancing	0	0	0	ELENADISCOROMANCING	ka5BtsfEfuU	14	2013-06-19 17:54:08
161	Macklemore & Ryan Lewis	Can't Hold Us (ft. Ray Dalton)	0	0	0	MACKLEMOREFEATRYANLEWISCANTHOLDUSFTRAYDALTON	xHRkHFxD-xY	10	2013-06-19 18:19:07
236	Tenacious D	Tribute	0	0	0	TENACIOUSDTRIBUTE	_lK4cX5xGiQ	15	2013-06-19 22:06:08
237	Gavin Degraw	I Don't Want To Be	0	0	0	GAVINDEGRAWIDONTWANTTOBE	8gFCW3PHBws	15	2013-06-19 22:06:09
244	Dario G	Sunchyme	0	0	0	DARIOGSUNCHYME	BY2OFztWiuY	10	2013-06-19 22:28:07
59	Feed Me/crystal Fighters	Love Is All I Got	0	1	0	FEEDMECRYSTALFIGHTERSLOVEISALLIGOT	hicCHaC_z5I	10	2013-06-18 19:08:08
182	Miss Montreal	I Know I Will Be Fine This Year	1	1	0	MISSMONTREALIKNOWIWILLBEFINETHISYEAR	aj4b1u6gSCI	14	2013-06-19 19:22:07
174	Naughty Boy Ft. Sam Smith	La La La	0	1	0	NAUGHTYBOYFEATSAMSMITHLALALA	3O1_3zBUKM8	15	2013-06-19 18:55:08
140	Sander Van Doorn	By Any Demand	1	1	0	SANDERVANDOORNBYANYDEMAND	Krt6Ly6t0Sk	10	2013-06-18 22:46:11
251	Jett Rebel	Do You Love Me At All	0	0	0	JETTREBELDOYOULOVEMEATALL	BV8wfechTGE	10	2013-06-29 12:43:07
\.


--
-- TOC entry 1898 (class 0 OID 0)
-- Dependencies: 164
-- Name: track_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('track_id_seq', 256, true);


--
-- TOC entry 1871 (class 2606 OID 24694)
-- Name: nowplaying_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY nowplaying
    ADD CONSTRAINT nowplaying_pkey PRIMARY KEY (id);


--
-- TOC entry 1875 (class 2606 OID 24700)
-- Name: spot_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY spot
    ADD CONSTRAINT spot_pkey PRIMARY KEY (id);


--
-- TOC entry 1877 (class 2606 OID 24713)
-- Name: track_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY track
    ADD CONSTRAINT track_pkey PRIMARY KEY (id);


--
-- TOC entry 1873 (class 1259 OID 24701)
-- Name: idx_1900d54d5ed23c43; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX idx_1900d54d5ed23c43 ON spot USING btree (track_id);


--
-- TOC entry 1878 (class 1259 OID 24714)
-- Name: uniq_1722d7a28c90cdff; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE UNIQUE INDEX uniq_1722d7a28c90cdff ON track USING btree (canonicalname);


--
-- TOC entry 1872 (class 1259 OID 24695)
-- Name: uniq_c79e5c995f8a7f73; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE UNIQUE INDEX uniq_c79e5c995f8a7f73 ON nowplaying USING btree (source);


--
-- TOC entry 1879 (class 2606 OID 24726)
-- Name: fk_1900d54d5ed23c43; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY spot
    ADD CONSTRAINT fk_1900d54d5ed23c43 FOREIGN KEY (track_id) REFERENCES track(id) ON DELETE CASCADE;


--
-- TOC entry 1892 (class 0 OID 0)
-- Dependencies: 5
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


-- Completed on 2013-06-29 15:06:36

--
-- PostgreSQL database dump complete
--
