CREATE TABLE binance_api_account
(
    id         INT auto_increment NOT NULL,
    `key`      varchar(255) NOT NULL,
    secret_key varchar(255) NOT NULL,
    CONSTRAINT binance_api_account_PK PRIMARY KEY (id)
) ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_unicode_ci;
