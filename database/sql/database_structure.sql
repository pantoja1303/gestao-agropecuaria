IF NOT EXISTS (SELECT * FROM information_schema.COLUMNS 
               WHERE TABLE_NAME = 'animals' AND COLUMN_NAME = 'origin_id') THEN
    ALTER TABLE animals CHANGE origin origin_id INT(11) NOT NULL DEFAULT 0;
END IF;
IF NOT EXISTS (
        SELECT * FROM information_schema.COLUMNS  WHERE TABLE_NAME = 'animals' AND COLUMN_NAME = 'animal_type_id'
) THEN
    ALTER TABLE animals CHANGE type_of_animal animal_type_id INT(11) NOT NULL DEFAULT 0;
END IF;

