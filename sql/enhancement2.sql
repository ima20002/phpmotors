-- SQL Statements 1
INSERT INTO clients (clientFirstname, clientLastname, clientEmail, clientPassword, comment) Values ('Tony', 'Stark', 'tony@starkent.com', 'IamIronM@n', 'I am the real Ironman');

-- SQL Statements 2
UPDATE clients SET clientLevel = 3 WHERE clientFirstname = 'Tony' AND clientLastname = 'Stark';

-- SQL Statements 3
UPDATE inventory
SET invDescription = Replace('Do you have 6 kids and like to go offroading? The Hummer gives you the small interiors with an engine to get you out of any muddy or rocky situation.', 'small interiors', 'spacious interior')
WHERE invMake = 'GM' AND invModel = 'Hummer';

-- SQL Statements 4
SELECT invModel
FROM inventory
INNER JOIN carclassification 
ON inventory.classificationId = carclassification.classificationId
WHERE inventory.classificationId = 1;

-- SQL Statements 5
DELETE FROM inventory WHERE invMake = 'Jeep' AND invModel ='Wrangler';

-- SQL Statements 6
UPDATE inventory
SET invImage = concat('/phpmotors', invImage),
    invThumbnail = concat('/phpmotors', invThumbnail);
    