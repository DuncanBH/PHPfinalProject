INSERT IGNORE INTO chatrooms (chatroom_id, chatroom_name, chatroom_description) VALUES
(1, "Very cool chatroom", "Cool chat"),
(2, "Chat room for weirdos", "Less cool chat"),
(3, "The Screaming Room", "AAAAAAAAAAAAAAAA"),
(4, "FR chat", "Francais seulement"),
(5, "New Chat", "Brand new!!");

INSERT INTO `messages`(`message_id`, `chatroom_id`, `user_id`, `message_text`, `message_image`, `message_time`) VALUES
(1, 1, 1, "Hello", null, NOW()),
(2, 1, 1, "It's me!", null, NOW()),
(3, 1, 1, "From over here!", null, NOW()),
(4, 1, 1, "Can you see me?", null, NOW()),
(5, 1, 1, "I may be lost!", null, NOW());