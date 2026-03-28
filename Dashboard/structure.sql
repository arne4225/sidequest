CREATE TABLE users (
    id SERIAL PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password_hash TEXT NOT NULL,
    admin BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE challenge_types (
    id SERIAL PRIMARY KEY,
    name VARCHAR(50) NOT NULL
);

CREATE TABLE difficulties (
    id SERIAL PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    points INT NOT NULL
);

CREATE TABLE challenges (
    id SERIAL PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    description TEXT,
    type_id INT REFERENCES challenge_types(id),
    difficulty_id INT REFERENCES difficulties(id),
    date DATE
);

CREATE TABLE user_challenges (
    id SERIAL PRIMARY KEY,
    user_id INT REFERENCES users(id),
    challenge_id INT REFERENCES challenges(id),
    completed BOOLEAN DEFAULT FALSE,
    points_earned INT DEFAULT 0,
    completed_at TIMESTAMP
);