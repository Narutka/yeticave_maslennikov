---Insert для Категорий

INSERT INTO `Category` (`id_category`, `category`, `alias`) VALUES
(1, 'Доски и лыжи', 'boards'),
(2, 'Крепления', 'attachment'),
(3, 'Ботинки', 'boots'),
(4, 'Одежда', 'clothing'),
(5, 'Инструменты', 'tools'),
(6, 'Разное', 'other');

---Insert для пользователей

INSERT INTO `User` (`id_user`, `registration_date`, `email`, `login`, `password`, `avatar`, `contacts`, `id_created_lot`, `id_bet`) VALUES
(NULL, '2020-03-20 12:15:00', 'skillya1@gmail.com', 'Narutka', 'qwerty123', 'test.png', 'нет', NULL, NULL),
(NULL, '2020-03-20 13:15:00', 'skill_ya@mail.ru', 'NeNarutka', 'qwerty1234', 'test2.png', 'нет', NULL, NULL);

--Insert для лотов

INSERT INTO `Lot` (`id_lot`, `creation_date`, `name`, `description`, `picture`, `starting_price`, `end_date`, `betting_step`, `id_author`, `id_winner`, `id_category`) VALUES 
(NULL, '2020-03-29 15:00:00', 'Тестовой лот #1', 'Это тестовый лот #1', 'test_lot1.png', '1000', '2020-03-30 00:00:00', '100', '2', '2', '1'),
(NULL, '2020-03-30 00:00:00', 'Тестовый лот #2', 'Это второй тестовый лот', 'test_lot2.png', '1500', '2020-03-31 00:00:00', '1000', '4', '2', '2');

--Insert для ставок

INSERT INTO `Bet` (`id_bet`, `bet_date`, `bet_price`, `id_user`, `id_lot`) VALUES
(NULL, '2020-03-29 00:00:00', '12', '2', '3'), 
(NULL, '2020-03-31 00:00:00', '1', '4', '4');

--Получить все категории

SELECT `category`,`alias` FROM `Category`

--получить самые новые, открытые лоты. Каждый лот должен включать
--название, стартовую цену, ссылку на изображение, цену последней ставки,
--количество ставок, название категории;

SELECT l.`name`,l.`starting_price`,l.`picture`,c.category, 
count(b.id_bet) as "Количество ставок", max(b.bet_date) as "Последняя ставка" 
FROM Lot l join Bet b on l.id_lot = b.id_lot 
join Category c on l.id_category = c.id_category 
WHERE `end_date`> NOW() 
Group by l.`name`,l.`starting_price`,l.`picture`,c.category

--показать лот по его id. Получите также 
--название категории, к которой
--принадлежит лот

SELECT l.name, c.category 
FROM Lot l JOIN Category c ON l.id_category = c.id_category 
Where l.id_lot = "3"

--обновить название лота по его идентификатору;

Update Lot Set name = "Тест" WHERE id_lot = "3"

--получить список самых свежих ставок для лота по его идентификатору;

SELECT * FROM `Bet` WHERE id_lot = 6