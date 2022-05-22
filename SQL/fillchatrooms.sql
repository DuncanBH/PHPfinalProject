INSERT IGNORE INTO chatrooms (chatroom_id, chatroom_name, chatroom_description) VALUES
(1, "Very cool chatroom", "Cool chat"),
(2, "Chat room for weirdos", "Less cool chat"),
(3, "The Screaming Room", "AAAAAAAAAAAAAAAA"),
(4, "FR chat", "Francais seulement"),
(5, "New Chat", "Brand new!!");

INSERT INTO users ( `user_name`, `user_password`,) VALUES 
("Test", "a1159e9df3670d549d04524532629f5477ceb7deec9b45e47e8c009506ecb2c8"),
("Hackerman9000", "a1159e9df3670d549d04524532629f5477ceb7deec9b45e47e8c009506ecb2c8"),
("CoolGuy47", "a1159e9df3670d549d04524532629f5477ceb7deec9b45e47e8c009506ecb2c8"),

INSERT INTO `messages`(`chatroom_id`, `user_id`, `message_text`, `message_image`, `message_time`) VALUES
(1, 5, "Hello", null, NOW()),
(1, 4, "It's me!", null, NOW()),
(1, 5, "From over here!", null, NOW()),
(1, 5, "Can you see me?", null, NOW()),
(1, 5, "I may be lost!", null, NOW()),
(2, 6, "Hello", null, NOW()),
(2, 5, "It's me!", null, NOW()),
(2, 7, "From over here!", null, NOW()),
(2, 5, "Can you see me?", null, NOW()),
(2, 4, "I may be lost!", null, NOW()),
(3, 5, "Hello", null, NOW()),
(3, 6, "It's me!", null, NOW()),
(3, 7, "From over here!", null, NOW()),
(3, 4, "Can you see me?", null, NOW()),
(3, 5, "I may be lost!", null, NOW());