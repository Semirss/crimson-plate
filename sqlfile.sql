CREATE DATABASE IF NOT EXISTS crimsonplate;
USE crimsonplate;

-- Create the users table
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- Create the categories table
CREATE TABLE IF NOT EXISTS categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL UNIQUE
);

-- Create the foods table
CREATE TABLE IF NOT EXISTS foods (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    category_id INT,
    FOREIGN KEY (category_id) REFERENCES categories(id)
);

-- Create the orders table
CREATE TABLE IF NOT EXISTS orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    order_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    total_price DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Create the order_items table
CREATE TABLE IF NOT EXISTS order_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT,
    food_id INT,
    quantity INT NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (order_id) REFERENCES orders(id),
    FOREIGN KEY (food_id) REFERENCES foods(id)
);

CREATE TABLE admin (
    admin_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);



INSERT INTO food (name, description, price, category_id) VALUES
('Almas Caviar', 'A luxurious type of caviar from the albino beluga sturgeon.', 2560, 1),
('Foie Gras', 'A delicacy made of the liver of a duck or goose.', 490, 1),
('Matsutake Mushrooms', 'Rare mushrooms known for their distinct spicy-aromatic odor.', 190, 1),
('Bluefin Tuna', 'Highly prized for its use in sushi and sashimi.', 250, 1),
('Kobe Beef', 'A type of Wagyu beef known for its flavor, tenderness, and fatty, well-marbled texture.', 900, 1),
('White Truffles', 'A type of truffle highly esteemed for their unique flavor and aroma.', 1700, 1),
('Bird\s Nest Soup', 'A delicacy in Chinese cuisine made from the nest of the swiftlet.', 660, 1),
('Saffron', 'A spice derived from the flower of Crocus sativus.', 2400, 1),
('Iberico Ham (Jamón Ibérico)', 'A type of cured ham produced in Spain and Portugal.', 560, 1),
('Densuke Watermelon', 'A rare type of watermelon known for its black rind and exceptional sweetness.', 54, 1);
INSERT INTO fooditems (name, description, price, category_id) VALUES
('Classic Burger', 'A classic beef burger with lettuce, tomato, and onion.', 8.99, 2),
('Cheeseburger', 'A juicy beef burger with melted cheese, lettuce, tomato, and onion.', 9.99, 2),
('Bacon Burger', 'A beef burger topped with crispy bacon and cheddar cheese.', 10.99, 2),
('Mushroom Swiss Burger', 'A beef burger topped with sautéed mushrooms and Swiss cheese.', 11.99, 2),
('Veggie Burger', 'A delicious vegetarian burger made with a blend of vegetables.', 8.49, 2),
('BBQ Burger', 'A beef burger topped with BBQ sauce, onion rings, and cheddar cheese.', 12.49, 2),
('Spicy Burger', 'A spicy beef burger with jalapenos, pepper jack cheese, and spicy mayo.', 10.49, 2),
('Double Burger', 'A double patty beef burger with lettuce, tomato, and onion.', 13.99, 2),
('Mini Sliders', 'Three mini beef burgers with cheese and pickles.', 9.49, 2),
('Turkey Burger', 'A healthy turkey burger with lettuce, tomato, and avocado.', 9.99, 2);
INSERT INTO foods (name, description, price, category_id) VALUES
('Margherita Pizza', 'Classic pizza with tomato sauce, mozzarella, and basil.', 17, 3),
('Pepperoni Pizza', 'Pizza topped with pepperoni slices and mozzarella cheese.', 18, 3),
('BBQ Chicken Pizza', 'Pizza with BBQ sauce, grilled chicken, and red onions.', 23, 3),
('Hawaiian Pizza', 'Pizza with ham, pineapple, and mozzarella cheese.', 12, 3),
('Veggie Pizza', 'Pizza loaded with various fresh vegetables.', 10, 3),
('Meat Lover\'s Pizza', 'Pizza topped with pepperoni, sausage, ham, and bacon.', 23, 3),
('Four Cheese Pizza', 'Pizza with mozzarella, cheddar, Parmesan, and blue cheese.', 15, 3),
('Buffalo Chicken Pizza', 'Pizza with spicy buffalo sauce, chicken, and mozzarella.', 19, 3),
('Supreme Pizza', 'Pizza with pepperoni, sausage, veggies, and mozzarella.', 17, 3),
('White Pizza', 'Pizza with ricotta, mozzarella, and garlic, no tomato sauce.', 9, 3);
INSERT INTO fooditems (name, description, price, category_id) VALUES
('Chocolate Cake', 'A rich and moist chocolate cake.', 5.99, 4),
('Cheesecake', 'A creamy and smooth cheesecake with a graham cracker crust.', 6.99, 4),
('Ice Cream', 'A scoop of creamy ice cream in various flavors.', 3.99, 4),
('Brownies', 'Chocolate brownies with a fudgy center.', 4.99, 4),
('Apple Pie', 'A classic apple pie with a flaky crust.', 5.49, 4),
('Tiramisu', 'An Italian dessert made with coffee-soaked ladyfingers and mascarpone cheese.', 6.49, 4),
('Panna Cotta', 'A creamy Italian dessert made with gelatin and cream.', 5.49, 4),
('Creme Brulee', 'A rich custard topped with a layer of hard caramel.', 6.99, 4),
('Fruit Tart', 'A tart filled with creamy custard and topped with fresh fruit.', 5.99, 4),
('Macarons', 'French almond meringue cookies with a creamy filling.', 4.99, 4);
INSERT INTO foods (name, description, price, category_id) VALUES
('Cola', 'Refreshing carbonated cola beverage.', 1.55,5),
('Orange Juice', 'Freshly squeezed orange juice.', 8, 5),
('Lemonade', 'Classic lemon-flavored refreshing drink.', 2, 5),
('Iced Tea', 'Chilled tea served with ice cubes.', 5, 5),
('Milkshake', 'Creamy and thick milkshake in various flavors.', 12, 5),
('Water', 'Bottled still or sparkling water.', 1, 5),
('Coffee', 'Freshly brewed coffee.',3, 5),
('Espresso', 'Strong and concentrated coffee.', 5,5),
('Hot Chocolate', 'Rich and creamy chocolate-flavored beverage.', 14, 5),
('Smoothie', 'Thick and fruity blended drink.', 7, 5);

