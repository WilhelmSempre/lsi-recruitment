create table report
(
    name       varchar(255) not null,
    created_at timestamp(0) not null,
    customer   varchar(255) not null,
    local      varchar(255) not null,
    id         integer      not null
        constraint report_pkey
            primary key
);

alter table report
    owner to postgres;

INSERT INTO public.report (name, created_at, customer, local, id) VALUES ('Sprzedaż', '2021-12-27 00:00:00', 'Mariusz', 'WooCafe Bydgoszcz', 7);
INSERT INTO public.report (name, created_at, customer, local, id) VALUES ('Sprzedaż', '2021-12-21 14:00:00', 'Rafał', 'WooCafe Bydgoszcz', 1);
INSERT INTO public.report (name, created_at, customer, local, id) VALUES ('Sprzedaż', '2021-12-22 16:00:00', 'Rafał', 'WooCafe Bydgoszcz', 2);
INSERT INTO public.report (name, created_at, customer, local, id) VALUES ('Inwentaryzacja', '2021-12-23 19:00:00', 'Mariusz', 'WooCafe Bydgoszcz', 5);
INSERT INTO public.report (name, created_at, customer, local, id) VALUES ('Sprzedaż', '2021-12-23 20:00:00', 'Rafał', 'WooCafe Bydgoszcz', 4);
INSERT INTO public.report (name, created_at, customer, local, id) VALUES ('Sprzedaż', '2021-12-23 13:00:00', 'Rafał', 'WooCafe Toruń', 3);
INSERT INTO public.report (name, created_at, customer, local, id) VALUES ('Inwentaryzacja', '2021-12-23 23:00:00', 'Mariusz', 'WooCafe Toruń', 6);